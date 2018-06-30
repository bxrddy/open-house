<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\listing;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required'
        ]);

        $listing = new Listing;
        $listing->name    =  $request->input('name');
        $listing->email   =  $request->input('email');
        $listing->website =  $request->input('website');
        $listing->phone   =  $request->input('phone');
        $listing->address =  $request->input('address');
        $listing->bio     =  $request->input('bio');
        $listing->user_id =  auth()->user()->id;

        $listing->save();

         return redirect('/dashboard')->with('success', 'Listing created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Listing::find($id);
        return view('edit')->with('listing', $listing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listing = Listing::find($id);

        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required'
        ]);

        $listing->name    =  $request->input('name');
        $listing->email   =  $request->input('email');
        $listing->website =  $request->input('website');
        $listing->phone   =  $request->input('phone');
        $listing->address =  $request->input('address');
        $listing->bio     =  $request->input('bio');
        $listing->user_id =  auth()->user()->id;

        $listing->save();

         return redirect('/dashboard')->with('success', 'Listing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect('/dashboard')->with('success', 'Listing deleted successfully');
    }
}
