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








}
