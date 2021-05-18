<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Station;
use Illuminate\Http\Request;
use Laraveldaily\Quickadmin\Controllers\QuickadminController;

class DashboardController extends QuickadminController
{
    public function index()
    {
        $country = Country::count();
        $station = Station::count();
        $category = Category::count();
//        dd($station);

        return view('admin.dashboard',compact(['station','country','category']));
    }
}
