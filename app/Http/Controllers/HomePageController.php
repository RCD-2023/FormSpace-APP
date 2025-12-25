<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // session()->put('test', '123');
        // // session()->save();

        // dd(
        //     session()->getId(),
        //     session()->all()
        // );
        // dd(
        //     config('session.driver'),
        //     config('session.connection'),
        //     config('session.table'),
        //     config('database.default'),
        // );


        return view('pages.homepage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
