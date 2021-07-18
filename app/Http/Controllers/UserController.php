<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Ramsey\Uuid\Type\Decimal;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\exception_for;

class UserController extends Controller
{
    public function index()
    {
        try {
            $user =User::where('estado', true)->with('Profile')->orderBy('name', 'asc')->get();
            $response = $user;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function allDisable()
    {
        try {
            $user = User::where('estado', false)->with('Profile')->orderBy('name', 'asc')->get();
            $response = $user;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
    public function requests()
    {

        try {
            $user = User::where('estado', 2)->get();
            $response = $user;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
    public function update(Request $request, $id)
    { //falta revizar xq no puedo logearme despues de hacer un update.

        $validator = Validator::make($request->all(), [
            'id' => 'int',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'string|min:6',
            'foto' => '',


        ]);
        //retornar mensajes de validacion
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        //datos del usuario
        $usr = User::find($id);
        $usr->id = $request->input('id');
        $usr->email = $request->input('email');
        $usr->password = bcrypt($request->input('password'));
        $usr->foto = $request->input('foto');
        //validar que el usuario exista
        // $user = auth('api')->user();
        // $user->id = $usr->id;

        if ($usr->Update()) {
            //  $profile = Profile::find($request->input('profile_id'));
            //sincroniza el perfil id
            //   if (!is_null($profile)) {
            //   $usr->Profile()->associate($profile);
            //$profile = Profile::find($request->input('profile_id'));
            $response = 'Usuario actualizado!';
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Error durante la actualizacion'
            ];
            return response()->json($response, 404);
        }

        //}


    }

    public function updateAdmin(Request $request, $id)
    { //falta revizar xq no puedo logearme despues de hacer un update.

        $validator = Validator::make($request->all(), [
            'id' => 'int',
            //'identificacion' => 'int',
           // 'name' => 'string|max:255',
           // 'primerApellido' => 'string|max:100',
           // 'segundoApellido' => 'string|max:100',
            'estado' => '',
            'email' => 'string|email|max:255',
            'password' => 'string|min:6',
            'foto' => '',
            'profile_id' => '',

        ]);
        //retornar mensajes de validacion
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        //datos del usuario
        $usr = User::find($id);
        $usr->id = $request->input('id');
       // $usr->identificacion = $request->input('identificacion');
       // $usr->name = $request->input('name');
       // $usr->primerApellido = $request->input('primerApellido');
       // $usr->segundoApellido = $request->input('segundoApellido');
        $usr->estado = $request->input('estado');
        $usr->email = $request->input('email');
        $usr->password = bcrypt($request->input('password'));
        $usr->foto = $request->input('foto');
        //validar que el usuario exista
        // $user = auth('api')->user();
        // $user->id = $usr->id;

        if ($usr->Update()) {
             $profile = Profile::find($request->input('profile_id'));
            //sincroniza el perfil id
              if (!is_null($profile)) {
              $usr->Profile()->associate($profile);
            //$profile = Profile::find($request->input('profile_id'));
            $response = 'Usuario actualizado!';
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Error durante la actualizacion'
            ];
            return response()->json($response, 404);
        }

        }


    }



    public function showSolicitud($id)
    {
        try {
            $user = User::where('id', $id)->where('estado', 2)->with('Profile')->first();
            $response = $user;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function showEnable($id)
    {
        try {
            $user = User::where('id', $id)->where('estado', true)->with('Profile')->first();
            $response = $user;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function showDisable($id)
    {
        try {
            $user = User::where('id', $id)->where('estado', false)->with('Profile')->first();
            $response = $user;
            return response()->json($response, 200);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }








}
