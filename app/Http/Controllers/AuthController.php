<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
//Agregar
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

public function register(Request $request)
    {

        /// notas
        // Siempre hay que correr estos comandos antes de tratar de ejecutar las rutas de validacion con POSTMAN:
        // 1- php artisan passport:install --force
        // 2- php artisan passport:keys --force
        // 3- intentar correr los api requests con POSTMAN.

        //Reglas de validación
        $validator=Validator::make($request->all(),[
            'identificacion' => 'required|int',
            'name' => 'required|string|max:255',
            'primerApellido' => 'required|string|max:100',
            'segundoApellido' => 'required|string|max:100',
            'estado' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'foto' => 'required',
            'profile_id' => 'required',

        ]);// added all the fields to register and validate the user registration

        //Retornar mensajes de validación
        if($validator->fails()){
            return response()->json($validator->messages(),422);
        }
        try
        {
            //Formato de password
            $request['password']=Hash::make($request['password']);
            $request['remember_token']=Str::random(10);

            //Agregar rol_id en Model User a la propiedad $fillable ,  se cambio la llave a profile_id
            $user = User::create($request->toArray());
            //Login usuario creado
            Auth::login($user);
            $scope = $user->perfil_id; // se removio la variable descripcion xq esta dando errores y solo necesitamos el ID del perfil que estamos ingresando.
            $token = $user->createToken($user->email.'-'.now(),[$scope]);
            //Respuesta con token
            $response=[
                'user'=>Auth::user(),
                'token'=>$token->accessToken];
                return response()->json($response,200);
        }catch(Exception $e)
        {
            return response()->json($e->getMessage(),422);
        }
    }

public function login(Request $request){

//Validar campos de login
$validator=Validator::make($request->all(),[
    'email'=>'required|string|email|max:255',
    'password'=>'required|string|min:6',
    ]);
//Retornar mensajes de validación
if($validator->fails()){
    return response()->json($validator->messages(),422);
}

try{
    //Credenciales para el login
    $credentials=$request->only('email','password');

    //Verificar credenciales por medio de las funcionalidad de autenticación

    // aqui se cambio el campo PROFILES por perfil  y PROFILES_ID EN LA VARIABLE SCOPE.
    if(Auth::attempt($credentials)){

        $user=User::where('email',$request->email)->with('Profile')->first();
                if ($user->estado != 1) {
                    $response = ["message" => 'El usuario no existe'];
                    return response()->json($response, 422);
                }else{
                    if ($user->estado == 0) {
                        $response = ["message" => 'El usuario esta deshabilitado'];
                        return response()->json($response, 422);
                    }
                }

        $scope=$user->Perfil; //se cambia a la variable perfil para llamar a todo el perfil
        $token=$user->createToken($user->email.'-'.now(),[$scope]);
        $response=[
            'user'=>Auth::user(),
            'token'=>$token->accessToken
        ];
        return response()->json($response,200);

    }else{
        $response=["message"=>'El usuario no existe'];
        return response()->json($response,422);
    }
    }catch(Exception $e){
        return  response()->json($e->getMessage(),422);
    }
}
public function logout()
{
            //Verificar que exista algún usuario logueado//Según el token proporcionado
            if(Auth::guard('api')->check()){
                Auth::logout();
                $response=['message'=>'Ha sido desconectado exitosamente!'];
                return response()->json($response,200);
            }else{
                $response=['message'=>'No existe usuario autenticado'];
                return response()->json($response,422);}
        }

    public function Update(Request $request, $id)
    { //falta revizar xq no puedo logearme despues de hacer un update.

        $validator = Validator::make($request->all(), [
            'identificacion' => 'required|int',
            'name' => 'required|string',
            'primerApellido' => 'required|string',
            'segundoApellido' => 'required|string',
            'estado' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'foto' => 'required',
            'profile_id' => 'required',
        ]);
        //retornar mensajes de validacion
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        //datos del usuario
        $usr = User::find($id);
        $usr->identificacion = $request->input('identificacion');
        $usr->name = $request->input('name');
        $usr->primerApellido = $request->input('primerApellido');
        $usr->segundoApellido = $request->input('segundoApellido');
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
            }
            $response = 'Usuario actualizado!';
            return response()->json($response, 200);
        }
        $response = [
            'msg' => 'Error durante la actualizacion'
        ];
        return response()->json($response, 404);
    }

    }
