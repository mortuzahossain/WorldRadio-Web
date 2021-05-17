<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\StreamPlace;
use App\Http\Requests\CreateStreamPlaceRequest;
use App\Http\Requests\UpdateStreamPlaceRequest;
use Illuminate\Http\Request;



class StreamPlaceController extends Controller {

	/**
	 * Display a listing of streamplace
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $streamplace = StreamPlace::all();

		return view('admin.streamplace.index', compact('streamplace'));
	}

	/**
	 * Show the form for creating a new streamplace
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.streamplace.create');
	}

	/**
	 * Store a newly created streamplace in storage.
	 *
     * @param CreateStreamPlaceRequest|Request $request
	 */
	public function store(CreateStreamPlaceRequest $request)
	{
	    
		StreamPlace::create($request->all());

		return redirect()->route(config('quickadmin.route').'.streamplace.index');
	}

	/**
	 * Show the form for editing the specified streamplace.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$streamplace = StreamPlace::find($id);
	    
	    
		return view('admin.streamplace.edit', compact('streamplace'));
	}

	/**
	 * Update the specified streamplace in storage.
     * @param UpdateStreamPlaceRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateStreamPlaceRequest $request)
	{
		$streamplace = StreamPlace::findOrFail($id);

        

		$streamplace->update($request->all());

		return redirect()->route(config('quickadmin.route').'.streamplace.index');
	}

	/**
	 * Remove the specified streamplace from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		StreamPlace::destroy($id);

		return redirect()->route(config('quickadmin.route').'.streamplace.index');
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
            StreamPlace::destroy($toDelete);
        } else {
            StreamPlace::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.streamplace.index');
    }

}
