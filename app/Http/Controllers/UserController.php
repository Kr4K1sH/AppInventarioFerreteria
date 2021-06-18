<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {
            $user =User::where('estado', true)->with('Perfil')->orderBy('name', 'asc')->get();
            $response = $user;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function allDisable()
    {
        try {
            $user = User::where('estado', false)->with('Perfil')->orderBy('name', 'asc')->get();
            $response = $user;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function showEnable($id)
    {
        try {
            $user = User::where('id', $id)->where('estado', true)->with('Perfil')->first();
            $response = $user;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function showDisable($id)
    {
        try {
            $user = User::where('id', $id)->where('estado', false)->with('Perfil')->first();
            $response = $user;
            return response()->json($response, 200);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
}
