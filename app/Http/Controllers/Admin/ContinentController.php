<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Continent;
use App\Http\Requests\CreateContinentRequest;
use App\Http\Requests\UpdateContinentRequest;
use Illuminate\Http\Request;



class ContinentController extends Controller {

	/**
	 * Display a listing of continent
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $continent = Continent::all();

		return view('admin.continent.index', compact('continent'));
	}

	/**
	 * Show the form for creating a new continent
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.continent.create');
	}

	/**
	 * Store a newly created continent in storage.
	 *
     * @param CreateContinentRequest|Request $request
	 */
	public function store(CreateContinentRequest $request)
	{
	    
		Continent::create($request->all());

		return redirect()->route(config('quickadmin.route').'.continent.index');
	}

	/**
	 * Show the form for editing the specified continent.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$continent = Continent::find($id);
	    
	    
		return view('admin.continent.edit', compact('continent'));
	}

	/**
	 * Update the specified continent in storage.
     * @param UpdateContinentRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateContinentRequest $request)
	{
		$continent = Continent::findOrFail($id);

        

		$continent->update($request->all());

		return redirect()->route(config('quickadmin.route').'.continent.index');
	}

	/**
	 * Remove the specified continent from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Continent::destroy($id);

		return redirect()->route(config('quickadmin.route').'.continent.index');
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
            Continent::destroy($toDelete);
        } else {
            Continent::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.continent.index');
    }

}
