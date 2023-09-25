<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TuCorreoMailable;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $list = User::where('estado','1')->get();

            $response = [
                'code' => 200,
                'status' => 'success',
                'data' => $list,
                'message' => 'Listado generado con exito'
            ];

            return response()->json($response, $response['code']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {

        $user->name                 = $request->username;
        $user->email                = $request->email;
        $user->pwd                  = $request->password;
        $user->codigo_quien_refiere = $request->code_refered;
        $user->estado               = 1;

        if ($user->save()) {
            $response = [
                "message" => "Las credenciales fueron enviadas al correo suministrado",
                "status" => 200
            ];

            $correo = new TuCorreoMailable($request);
            Mail::to("developperhorta@gmail.com")->send($correo);
            return response()->json($response, 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al registrar usuario'
            ], 201);
        }
    }

    public function login(Request $request, User $user)
    {
        try {
            return $request;
            $credentials = $request->only('email', 'password');

            if (User::where('email', $credentials['email'])->exists()) {

                $user = User::where('email', $credentials['email'])
                    ->where('estado', '1')
                    ->first();
//cambios de pruebas
                if ($user->pwd === $credentials['password']) {
                    if ($user && $user->pwd === $credentials['password']) {
                        $token = $this->generarCodigoAleatorio();

                        User::where('email', $user->email)->update([
                            'token' => $token,
                        ]);

                        $userUpdate = User::where('email', $credentials['email'])->first();

                        return response()->json([
                            'status' => 200,
                            'message' => 'Login correcto',
                            'data' => $userUpdate
                        ], 200);
                    }
                } else {
                    return response()->json([
                        'status' => 401,
                        'message' => 'Credenciales incorrectas'
                    ], 401);
                }
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Usuario o contraseña incorrectos'
                ], 401);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function generarCodigoAleatorio()
    {
        $longitud = 50;

        return Str::random($longitud);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::find($id);

            if ($user) {
                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'data' => $user,
                    'message' => 'Usuario encontrado'
                ];

                return response()->json($response, $response['code']);
            } else {
                $response = [
                    'code' => 404,
                    'status' => 'error',
                    'message' => 'Usuario no encontrado'
                ];

                return response()->json($response, $response['code']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::where('id', $id)->exits();

            if ($user) {
                $usuario = User::where('id', $user->id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'nombreCompleto' => $request->nombreCompleto,
                        'apellidos' => $request->apellidos,
                        'direccion' => $request->direccion,
                        'pais' => $request->pais,
                        'ciudad' => $request->ciudad,
                        'telefono' => $request->telefono,
                    ]);

                    if ($usuario) {
                        $response = [
                            'code' => 200,
                          'status' =>'success',
                            'data' => $usuario,
                          'message' => 'Usuario actualizado'
                        ];

                        return response()->json($response, $response['code']);
                    }else {
                        $response = [
                            'code' => 404,
                          'status' => 'error',
                          'message' => 'Usuario no encontrado'
                        ];

                        return response()->json($response, $response['code']);
                    };
                }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $user = User::find($request->id);

            if ($user) {

                $user->where('id', $request->id)->update([
                    'estado' => '0'
                ]);

                $response = [
                    'code' => 200,
                  'status' =>'success',
                  'message' => 'Usuario eliminado'
                ];

                return response()->json($response, $response['code']);
            } else {
                $response = [
                    'code' => 404,
                  'status' => 'error',
                  'message' => 'Usuario no encontrado'
                ];

                return response()->json($response, $response['code']);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
