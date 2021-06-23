<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $display = Product::with(['Category', 'Display', 'User', 'Locations', 'Suppliers', 'Inventories'])
                ->where('cantidad_total', '>', 'cantidad_minima')
                ->orderBy('nombre', 'asc')->get();
            $response = $display;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function all()
    {
        try {
            $display = Product::where('estado', true)
                ->with(['Category', 'Display', 'User', 'Locations', 'Suppliers', 'Inventories'])
                ->where('cantidad_total', '>', 'cantidad_minima')
                ->orderBy('nombre', 'asc')->get();
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
     * @param  \App\Models\Product  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $display = Product::where('id', $id)
                ->with(['Category', 'Display', 'User', 'Locations', 'Suppliers', 'Inventories'])
                ->where('cantidad_total', '>', 'cantidad_minima')
                ->orderBy('nombre', 'asc')->first();
            $response = $display;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function showDisable($id)
    {
        try {
            $display = Product::where('id', $id)->where('estado', false)
                ->with(['Category', 'Display', 'User', 'Locations', 'Suppliers', 'Inventories'])
                ->where('cantidad_total', '>', 'cantidad_minima')
                ->orderBy('nombre', 'asc')->first();
            $response = $display;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
