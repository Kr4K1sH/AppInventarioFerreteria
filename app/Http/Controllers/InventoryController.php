<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Database\Seeders\productseeder;

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

            $inv = Inventory::with(['Movement', 'User', 'Products'])->where('movement_id', '1')->orderBy('fecha', 'asc')->get();
            $response = $inv;
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

            $fecha = Carbon::parse(Carbon::now())->format('Y-m-d');
            $display = Inventory::whereBetween('movement_id', [1, 5])->where('fecha', $fecha)->count();

            $response = $display;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function totalSalida()
    {
        try {
            $fecha = Carbon::parse(Carbon::now())->format('Y-m-d');
            $display = Inventory::whereBetween('movement_id', [6, 10])->where('fecha', $fecha)->count();

            $response = $display;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
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

    public function showByUser($idUser)
    {
        try {

            $user = Inventory::where('user_id', $idUser)->with(['Movement', 'User', 'Products'])->orderBy('fecha', 'desc')->get();
            $response = $user;
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
    public function storeEntradas(Request $request)
    {
        DB::beginTransaction();

        try {
            $inventory = new Inventory();
            $inventory->movement_id = $request->input('movement_id');
            $inventory->description = $request->input('description');
            $inventory->fecha = Carbon::parse(Carbon::now())->format('Y-m-d');
            $inventory->user_id = $request->input('user_id');

            $inventory->save();
            $detalles = $request->input('detalles');

            foreach ($detalles as $item) {
                $inventory->Products()->attach(

                    $item['idItem'], ['cantidad' => $item['cantidad']]

                );
                $product = Product::find($item['idItem']);//$item['cantidad'] > $product->cantidad_minima &&
                 if(  ($product->cantidad_total +$item['cantidad'])<= $product->cantidad_maxima  ){
                          $product->cantidad_total += $item['cantidad'];
                           $product->save();
                 }

                if ( ($product->cantidad_total + $item['cantidad']) > $product->cantidad_maxima) {
                  $var = 0;
                  $var += (($product->cantidad_total + $item['cantidad']) - $product->cantidad_maxima);
                 $product->cantidad_total = (($product->cantidad_total + $item['cantidad'])-$var);
                     $product->save();
                }
                if ($product->cantidad_maxima ==  $product->cantidad_total) {
                    $product->estado = 0;
                    $product->save();
                }

        }
            DB::commit();
            $response = 'Entrada registrada!';
            return response()->json($response, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSalidas(Request $request)
    {
        DB::beginTransaction();

        try {
            $inventory = new Inventory();
            $inventory->movement_id = $request->input('movement_id');
            $inventory->description = $request->input('description');
            $inventory->fecha = Carbon::parse(Carbon::now())->format('Y-m-d');
            $inventory->user_id = $request->input('user_id');

            $inventory->save();

            $detalles = $request->input('detalles');

            foreach ($detalles as $item) {
                $inventory->Products()->attach(

                    $item['idItem'],
                    ['cantidad' => $item['cantidad']]
                );

                $product = Product::find($item['idItem']); //$item['cantidad'] > $product->cantidad_minima &&
                if ( ($product->cantidad_total - $item['cantidad'] ) >= $product->cantidad_minima) {
                   if($product->estado == 0){
                       $product->estado = 1;
                   }
                    $product->cantidad_total -= $item['cantidad'] ;
                    $product->save();
                }
                if( ($product->cantidad_total - $item['cantidad']) <= $product->cantidad_minima ){
                    if(($product->cantidad_total - $item['cantidad'])!= 0 ){
                        $product->cantidad_total -= $item['cantidad'];
                    }
                    $product->estado = 0;
                    $product->save();
                }

            }

            DB::commit();
            $response = 'Salida registrada!';
            return response()->json($response, 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage(), 422);
        }
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
