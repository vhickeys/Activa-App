<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        return view("client.index");
    }
}
