<?php

namespace App\Http\Controllers;

use App\Models\movementtypes;
use Exception;
use Illuminate\Http\Request;

class MovementtypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {//with('Movement')->
            $movement = movementtypes::with('Movement')->orderBy('nombre', 'asc')->get();
            $response = $movement;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
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
     * @param  \App\Models\movementtypes  $movementtypes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $movement = movementtypes::where('id', $id)->orderBy('nombre', 'asc')->first();
            $response = $movement;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movementtypes  $movementtypes
     * @return \Illuminate\Http\Response
     */
    public function edit(Movementtypes $movementtypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movementtypes  $movementtypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movementtypes $movementtypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movementtypes  $movementtypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(movementtypes $movementtypes)
    {
        //
    }
}
