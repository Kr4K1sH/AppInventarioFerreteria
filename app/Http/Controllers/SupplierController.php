<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\isNull;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $contact = supplier::with(['Contacts', 'Products'])->orderBy('nombre', 'asc')->get();
            $response = $contact;
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
            'direccion' => 'required|min:6',
            'pais' => 'required|min:3'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try {
            $sp = new supplier();
            $sp->nombre = $request->input('nombre');
            $sp->direccion = $request->input('direccion');
            $sp->pais = $request->input('pais');

            if ($sp->save()) {
                if (!is_null($request->input('contact_id'))) {
                    $sp->Contacts()->attach($request->input('contact_id'));
                }

                /*if (!is_null($request->input('product_id'))) {
                    $sp->Products()->attach($request->input('product_id'));
                }*/
                $response = 'Supplier created';
                return response()->json($response, 201);
            } else {
                $response = [
                    'msg' => 'Error to save Supplier'
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
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $contact = supplier::where('id', $id)->with(['Contacts', 'Products'])->orderBy('nombre', 'asc')->first();
            $response = $contact;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3',
            'direccion' => 'required|min:6',
            'pais' => 'required|min:3'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        try {
            $sp = supplier::find($id);
            $sp->nombre = $request->input('nombre');
            $sp->direccion = $request->input('direccion');
            $sp->pais = $request->input('pais');

            if ($sp->update()) {
                if (!is_null($request->input('contact_id'))) {
                    $sp->Contacts()->sync($request->input('contact_id'));
                }

                /*if (!is_null($request->input('product_id'))) {
                    $sp->Products()->sync($request->input('product_id'));
                }*/
                $response = 'Supplier updated';
                return response()->json($response, 200);
            } else {
                $response = [
                    'msg' => 'Error to update Supplier'
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
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(supplier $supplier)
    {
        //
    }
}
