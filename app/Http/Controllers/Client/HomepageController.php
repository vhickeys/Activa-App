<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 12);
        $page    = $request->input('page', 1);

        $apiResponse = activaApi('lifestyle-facilities', [
            'per_page' => $perPage,
            'page'     => $page,
        ]);

        $facilities = $apiResponse['success']
            ? $apiResponse['data']['data']
            : collect([]);

        $pagination = $apiResponse['success']
            ? [
            'current_page'  => $apiResponse['data']['current_page'],
            'last_page'     => $apiResponse['data']['last_page'],
            'per_page'      => $apiResponse['data']['per_page'],
            'total'         => $apiResponse['data']['total'],
            'next_page_url' => $apiResponse['data']['next_page_url'],
            'prev_page_url' => $apiResponse['data']['prev_page_url'],
        ]
            : null;

        return view('client.index', compact('facilities', 'pagination'));
    }

    public function about()
    {
        return view('client.about');
    }

    public function facility_details($slug)
    {
        $apiResponse = activaApi("lifestyle-facilities/{$slug}");

        if (! $apiResponse['success']) {
            abort(404, 'Facility not found.');
        }

        $facilityData = $apiResponse['data'] ?? null;

        if (! $facilityData || ! isset($facilityData['facility'])) {
            abort(404, 'Facility not found.');
        }

        $facility = $facilityData['facility'];

        // Use actual price from API
        $facility['actual_price'] = $facilityData['actual_price'] ?? 0;

        // Optional: tier
        $tier = $facilityData['effective_tier'] ?? $facility['tier'] ?? 'N/A';

        return view('client.facility', [
            'facility' => $facility,
            'tier'     => $tier,
            'apiUrl'   => env('API_URL') ?? config('app.api_url'),
        ]);
    }

    public function facilities_search(Request $request)
    {
        $query   = trim($request->get('q', ''));
        $perPage = 20;

        $params = [
            'per_page' => $perPage,
        ];

        if ($query !== '') {
            $params['search'] = $query;
        }

        $response = activaApi('lifestyle-facilities', $params);

        if (! ($response['success'] ?? false)) {
            return response()->json([]);
        }

        return response()->json(
            collect($response['data']['data'] ?? [])
                ->map(function ($facility) {
                    return [
                        // Text
                        'name'  => $facility['facility_name'],
                        'slug'  => $facility['slug'],
                        'tier'  => $facility['tier'] ?? null,

                        // URLs (IMPORTANT)
                        'url'   => route('facility.details', ['slug' => $facility['slug']]),

                        // Image (absolute path)
                        'image' => config('app.api_url') . '/storage/lifestyle-provider/facilities/' . $facility['image'],

                        // Pricing
                        'price' => $facility['actual_price'] ?? ($facility['price_range']['min'] ?? 0),
                    ];
                })
        );
    }

}
