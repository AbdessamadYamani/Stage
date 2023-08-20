<?php

namespace App\Http\Controllers;

use App\Models\Docs;
use App\Http\Requests\StoreDocsRequest;
use App\Http\Requests\UpdateDocsRequest;

class DocsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docs  $docs
     * @return \Illuminate\Http\Response
     */
    public function show(Docs $docs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docs  $docs
     * @return \Illuminate\Http\Response
     */
    public function edit(Docs $docs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocsRequest  $request
     * @param  \App\Models\Docs  $docs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocsRequest $request, Docs $docs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docs  $docs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docs $docs)
    {
        //
    }
}
