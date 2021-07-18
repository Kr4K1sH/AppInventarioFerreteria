<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

    public function all()
    {
        try {
            $display = Product::with(['Category', 'Display', 'User', 'Locations', 'Suppliers', 'Inventories'])
                ->orderBy('nombre', 'asc')->get();
            $response = $display;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function reposicion() //para validar que un producto necesita reposición se asignara el valor false en estado(tomar en consideración al crear o actualizar el producto)
    {
        try {

            $display = Product::where('cantidad_minima', '>', 'cantidad_total')
                ->where('estado', false)
                ->with(['Category', 'Display', 'User', 'Locations', 'Suppliers', 'Inventories'])
                ->orderBy('nombre', 'asc')->get();

            $response = $display;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function total()
    {
        try {

            $display = Product::where('estado', true)->get()->count();

            $response = $display;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3',
            'descripcion' => 'required',
            'cantidad_maxima' => 'required',
            'cantidad_minima' => 'required',
            'cantidad_total' => 'required',
            'peso' => 'required',
            'color' => 'required',
            'imagen' => 'required',


        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try {
            $producto = new Product();
            $producto->nombre = $request->input('nombre');
            $producto->descripcion = $request->input('descripcion');
            $producto->cantidad_maxima = $request->input('cantidad_maxima');
            $producto->cantidad_minima = $request->input('cantidad_minima');
            $producto->cantidad_total = $request->input('cantidad_total');
            $producto->costo_unidad = $request->input('costo_unidad');
            $producto->peso = $request->input('peso');
            $producto->color = $request->input('color');
            $producto->imagen = $request->input('imagen');
            $producto->estado = $request->input('estado');
            $producto->category_id = $request->input('category_id');
            $producto->display_id = $request->input('display_id');
            $producto->user_id = $request->input('user_id');
            $producto->Locations()->cantidad = $request->input('cantidad');

            if ($producto->save()) {
                if (!is_null($request->input('supplier_id'))) {
                    $producto->Suppliers()->attach($request->input('supplier_id'));
                }
                if (!is_null($request->input('location_id'))) {
                    $producto->Locations()->attach($request->input('location_id'));
                }
                if (!is_null($request->input('cantidad'))) {
                    $producto->Locations()->attach($request->input('cantidad'));
                }


                $response = 'Product created';
                return response()->json($response, 201);
            } else {
                $response = [
                    'msg' => 'Error to save Product'
                ];
                return response()->json($response, 404);
            }
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 422);
        }
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3',
            'descripcion' => 'required',
            'cantidad_maxima' => 'required',
            'cantidad_minima' => 'required',
            'cantidad_total' => 'required',
            'peso' => 'required',
            'color' => 'required',
            'imagen' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try {
            $producto = Product::find($id);
            $producto->nombre = $request->input('nombre');
            $producto->descripcion = $request->input('descripcion');
            $producto->cantidad_maxima = $request->input('cantidad_maxima');
            $producto->cantidad_minima = $request->input('cantidad_minima');
            $producto->cantidad_total = $request->input('cantidad_total');
            $producto->costo_unidad = $request->input('costo_unidad');
            $producto->peso = $request->input('peso');
            $producto->color = $request->input('color');
            $producto->imagen = $request->input('imagen');
            $producto->estado = $request->input('estado');
            $producto->category_id = $request->input('category_id');
            $producto->display_id = $request->input('display_id');
            $producto->user_id = $request->input('user_id');
            $producto->Locations()->cantidad = $request->input('cantidad');


            if ($producto->update()) {
                if (!is_null($request->input('supplier_id'))) {
                    $producto->Suppliers()->sync($request->input('supplier_id'));
                }

                if (!is_null($request->input('location_id'))) {
                    $producto->Locations()->sync($request->input('location_id'));
                }
                if (!is_null($request->input('cantidad'))) {
                    $producto->Locations()->sync($request->input('cantidad'));
                }


                $response = 'Product updated';
                return response()->json($response, 200);
            } else {
                $response = [
                    'msg' => 'Error to update Product'
                ];
                return response()->json($response, 404);
            }
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 422);
        }
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
