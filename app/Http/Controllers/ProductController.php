<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\ProductLocation;
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
                ->where('estado', 0)
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
    /*public function store(Request $request)
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

        DB::beginTransaction();

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

            $producto->save();
            if (!is_null($request->input('supplier_id'))) {
                $producto->Suppliers()->attach($request->input('supplier_id'));
            }

            $detalles = $request->input('detalles');
            foreach ($detalles as $item) {
                $producto->Locations()->attach($item['idItem'], [
                    'cantidad' => $item['cantidad']

                ]);

            }
            DB::commit();
            $response = 'Producto creado!';
            return response()->json($response, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage(), 422);
        }

    }*/

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

            if ($request->input('cantidad_total') < $request->input('cantidad_minima')) {
                $producto->estado = 0;
            } else {
                $producto->estado = 1;
            }

            if($producto->save()){
                if (!is_null($request->input('supplier_id'))) {
                    $producto->Suppliers()->attach($request->input('supplier_id'));
                }

                /*if (!is_null($request->input('loction_id'))) {
                    $producto->Locations()->attach($request->input('loction_id'));
                }*/

                $response = 'Producto creado!';
                return response()->json($response, 201);

            }else{
                $response = [
                    'msg' => 'Error al crear Producto'
                ];
                return response()->json($response, 404);
            }

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
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
    public function showProduct($id)
    {
        try {
            $display = Product::where('id', $id)->with(['Category', 'Suppliers', 'User', /* /'Suppliers','Display', 'Inventories'*/])->where('cantidad_total', '>', 'cantidad_minima')->orderBy('nombre', 'asc')->first();

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
            $producto = new Product();
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

            if( $request->input('cantidad_total') < $request->input('cantidad_minima')){
                $producto->estado = 0;
            }else{
                $producto->estado = 1;
            }

            if ($producto->update()) {
                if (!is_null($request->input('supplier_id'))) {
                    $producto->Suppliers()->sync($request->input('supplier_id'));
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
    public function updateLocation(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'int',
            'idBodega' => 'boolean',
            'cantidadBodega' => 'int',
            'idsucursal' => 'boolean',
            'cantidadsucursal' => 'int',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try {

            $producto = Product::find($id);
           // $locationB = Location::find($request->input('idBodega'));
            if ($request->input('idBodega') == true ) {
                $locationB = Location::find(2);
                $producto->Locations()->detach($locationB);
                $producto->Locations()->attach(
                    $locationB,
                    ['cantidad' => $request->input('cantidadBodega')]
                );
            }

           // $locationS = Location::find($request->input('idsucursal'));
            if ($request->input('idsucursal')==true) {
                $locationS = Location::find(1);
                $producto->Locations()->detach($locationS);
                $producto->Locations()->attach(
                    $locationS,
                    ['cantidad' => $request->input('cantidadsucursal')]
                );
            }
            $response = 'Product updated';
            return response()->json($response, 200);
        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 422);
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
