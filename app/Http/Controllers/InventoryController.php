<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEntradas(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
            'description' => 'required | min:5',
            'movement_id' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }*/

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

                $inventory->Products()->attach($item['idItem'], [
                    'cantidad' => $item['cantidad']

                ]);
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
        $validator = Validator::make($request->all(), [
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        DB::beginTransaction();

        try {
            $inventory = new Inventory();


            $detalles = $request->input('detalles');
            foreach ($detalles as $item) {
                $inventory->movement_id = $request->input('movement_id');
                $inventory->description = $request->input('description');
                $inventory->fecha = Carbon::parse(Carbon::now())->format('Y-m-d');
                $inventory->user_id = $request->input('user_id');

                $inventory->save();
                $inventory->Products()->attach($item['idItem'], [
                    'cantidad' => $item['cantidad']

                ]);
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
