<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Station;
use App\Http\Requests\CreateStationRequest;
use App\Http\Requests\UpdateStationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\StreamPlace;
use App\Country;
use App\Category;


class StationController extends Controller {

	/**
	 * Display a listing of station
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $station = Station::with("streamplace")->with("country")->with("category")->get();

		return view('admin.station.index', compact('station'));
	}

	/**
	 * Show the form for creating a new station
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $streamplace = StreamPlace::pluck("name", "id")->prepend('Please select', 0);
$country = Country::pluck("name", "id")->prepend('Please select', 0);
$category = Category::pluck("name", "id")->prepend('Please select', 0);

	    
	    return view('admin.station.create', compact("streamplace", "country", "category"));
	}

	/**
	 * Store a newly created station in storage.
	 *
     * @param CreateStationRequest|Request $request
	 */
	public function store(CreateStationRequest $request)
	{
	    $request = $this->saveFiles($request);
		Station::create($request->all());

		return redirect()->route(config('quickadmin.route').'.station.index');
	}

	/**
	 * Show the form for editing the specified station.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$station = Station::find($id);
	    $streamplace = StreamPlace::pluck("name", "id")->prepend('Please select', 0);
$country = Country::pluck("name", "id")->prepend('Please select', 0);
$category = Category::pluck("name", "id")->prepend('Please select', 0);

	    
		return view('admin.station.edit', compact('station', "streamplace", "country", "category"));
	}

	/**
	 * Update the specified station in storage.
     * @param UpdateStationRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStationRequest $request)
	{
		$station = Station::findOrFail($id);

        $request = $this->saveFiles($request);

		$station->update($request->all());

		return redirect()->route(config('quickadmin.route').'.station.index');
	}

	/**
	 * Remove the specified station from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Station::destroy($id);

		return redirect()->route(config('quickadmin.route').'.station.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Station::destroy($toDelete);
        } else {
            Station::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.station.index');
    }

}
