<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Exception;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = Inventory::with(['Movement', 'User', 'Products'])->orderBy('fecha', 'asc')->get();
            $response = $user;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function entradas()
    {
        try {
            $user = Inventory::with(['Movement', 'User', 'Products'])->where('movement_id', '1')->orderBy('fecha', 'asc')->get();
            $response = $user;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function salidas()
    {
        try {
            $user = Inventory::with(['Movement', 'User', 'Products'])->where('movement_id', '2')->orderBy('fecha', 'asc')->get();
            $response = $user;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function totalEntrada()
    {
        try {

            $display = Inventory::where('movement_id', 1)->count();

            $response = $display;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function totalSalida()
    {
        try {

            $display = Inventory::where('movement_id', 2)->count();

            $response = $display;
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
     * @param  \App\Models\Inventory  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = Inventory::where('id', $id)->with(['Movement', 'User', 'Products'])->orderBy('fecha', 'asc')->first();
            $response = $user;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
