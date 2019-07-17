<?php

namespace App\Http\Controllers;

use App\ResearchProject;
use Illuminate\Http\Request;

class ResearchProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('researches.view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\ResearchProject  $researchProject
     * @return \Illuminate\Http\Response
     */
    public function show(ResearchProject $researchProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResearchProject  $researchProject
     * @return \Illuminate\Http\Response
     */
    public function edit(ResearchProject $researchProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResearchProject  $researchProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchProject $researchProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResearchProject  $researchProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchProject $researchProject)
    {
        //
    }
}
