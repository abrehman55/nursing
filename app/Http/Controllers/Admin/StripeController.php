<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StripeKey;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keys = StripeKey::find(1);
        return view('stripe')->with('keys',$keys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StripeKey  $stripeKey
     * @return \Illuminate\Http\Response
     */
    public function show(StripeKey $stripeKey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StripeKey  $stripeKey
     * @return \Illuminate\Http\Response
     */
    public function edit(StripeKey $stripeKey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StripeKey  $stripeKey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StripeKey $stripe)
    {
        $stripe->update($request->all());
        toastr()->success('Keys Updated');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StripeKey  $stripeKey
     * @return \Illuminate\Http\Response
     */
    public function destroy(StripeKey $stripeKey)
    {
        //
    }
}
