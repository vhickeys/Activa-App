<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

if (!function_exists('agency_profile')) {
    function agency_profile()
    {
        $details = [
            'email' => 'info@activa.com',
            'phone' => '+234 (123) 456 88',
            'address' => 'F.C.T Abuja, Nigeria',
        ];

        return $details;
    }
}

if (!function_exists('getMembership')) {
    function getMembership()
    {
        $filePath = storage_path('app/membership.json');

        if (!file_exists($filePath)) {
            return [];
        }

        $jsonContent = file_get_contents($filePath);
        return json_decode($jsonContent, true);
    }
}

if (!function_exists('getMembershipBySlug')) {
    function getMembershipBySlug($slug)
    {
        $memberships = getMembership();

        foreach ($memberships as $membership) {
            if ($membership['slug'] == $slug) {
                return $membership;
            }
        }

        return null;
    }
}

if (!function_exists('getPartners')) {
    function getPartners()
    {
        $filePath = storage_path('app/partners.json');

        if (!file_exists($filePath)) {
            return [];
        }

        $jsonContent = file_get_contents($filePath);
        return json_decode($jsonContent, true);
    }
}

if (!function_exists('getPartnerCategories')) {
    function getPartnerCategories()
    {
        $filePath = storage_path('app/partners-categories.json');

        if (!file_exists($filePath)) {
            return [];
        }

        $jsonContent = file_get_contents($filePath);
        return json_decode($jsonContent, true);
    }
}

if (!function_exists('getPartnerSubCategories')) {
    function getPartnerSubCategories()
    {
        $filePath = storage_path('app/partners-subcategories.json');

        if (!file_exists($filePath)) {
            return [];
        }

        $jsonContent = file_get_contents($filePath);
        return json_decode($jsonContent, true);
    }
}

if (!function_exists('getPartnerBySlug')) {
    function getPartnerBySlug($slug)
    {
        $partners = getPartners();

        foreach ($partners as $partner) {
            if ($partner['slug'] == $slug) {
                return $partner;
            }
        }

        return null;
    }
}

if (!function_exists('getPartnerCatInfoBySlug')) {
    function getPartnerCatInfoBySlug($slug)
    {
        $partnerCategories = getPartnerCategories();

        foreach ($partnerCategories as $partnerCategory) {
            if ($partnerCategory['slug'] == $slug) {
                return $partnerCategory;
            }
        }

        return null;
    }
}

if (!function_exists('getPartnerCatBySlug')) {
    function getPartnerCatBySlug($slug)
    {
        $partner_categories = getPartnerCategories();
        $matched = [];

        foreach ($partner_categories as $partner_category) {
            if ($partner_category['category-slug'] == $slug) {
                $matched[] = $partner_category; // Add each match to the result array
            }
        }

        return !empty($matched) ? $matched : []; // Return all matches or null
    }
}

if (!function_exists('getPartnerSubCatBySlug')) {
    function getPartnerSubCatBySlug($slug)
    {
        $partner_subcategories = getPartnerSubCategories();
        $matched = [];

        foreach ($partner_subcategories as $partner_subcategory) {
            if ($partner_subcategory['subcategory-slug'] == $slug) {
                $matched[] = $partner_subcategory; // Add each match to the result array
            }
        }

        return !empty($matched) ? $matched : []; // Return all matches or null
    }
}

// if (! function_exists('activaApi')) {
//     function activaApi($endpoint, $params = [])
//     {
//         $baseUrl = env('ACTIVA_API'); // http://127.0.0.1:8000/api/activa

//         $response = Http::acceptJson()->get("$baseUrl/$endpoint", $params);

//         // Always return decoded JSON
//         return $response->json();
//     }
// }

if (! function_exists('activaApi')) {
    function activaApi($endpoint, $params = [])
    {
        $baseUrl = env('ACTIVA_API'); // http://127.0.0.1:8000/api/activa

        try {
            $response = Http::acceptJson()
                ->timeout(5)          // seconds (VERY IMPORTANT)
                ->connectTimeout(3)   // connection timeout
                ->get("$baseUrl/$endpoint", $params);

            if ($response->failed()) {
                return [
                    'success' => false,
                    'message' => 'Activa API returned an error',
                    'data' => null,
                ];
            }

            return $response->json();
        } catch (ConnectionException $e) {
            // API is unreachable
            return [
                'success' => false,
                'message' => 'Activa API is currently unavailable',
                'data' => null,
            ];
        }
    }
}
