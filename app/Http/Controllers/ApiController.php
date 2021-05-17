<?php

namespace App\Http\Controllers;

use App\Category;
use App\Continent;
use App\Country;
use App\Station;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    function getCountriesByContinent()
    {
        return Continent::with('countries')->get();
    }

    function getCategories()
    {
        return Category::all();
    }

    function getAllRadioStations()
    {
        return Station::paginate(10);
    }

    function getStationDetails($id = 0)
    {
        try {
            return Station::findOrFail($id)->with(['country', 'category'])->get();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'status' => 'ERROR',
                'error' => '404 not found'
            ], 404);
        }
    }

    function getStationByCategory($id = 0)
    {
        return Station::where('category_id', $id)->get();
    }

    function getStationByCountry($id = 0)
    {
        return Station::where('country_id', $id)->get();
    }
}
