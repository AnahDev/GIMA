<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    
    // POST: /api/autenticacion/iniciar-sesion
    public function login(Request $request)
    {

        // Loguear el contenido de la solicitud
        Log::info('Datos recibidos en login:', $request->all());

        // 1. Validar entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Intentar loguear
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'estado' => 'error',
                'mensaje' => 'Credenciales inválidas'
            ], 401);
        }
        
        /** @var \App\Models\User|null $user */
        // 3. Obtener usuario y crear token
        $user = Auth::user();
        
        // El nombre del token es arbitrario, ayuda a identificar el dispositivo si guardas logs
        $token = $user->createToken('token-acceso-api')->plainTextToken;

        return response()->json([
            'estado' => 'exito',
            'mensaje' => 'Login correcto',
            'data' => [
                'usuario' => $user->name,
                'roles' => $user->getRoleNames(), // Devuelve array: ["admin"] o ["tecnico", "supervisor"]
                'token' => $token
            ]
        ], 200);
    }

    public function register(Request $request) {
        // 1. Validar entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'estado' => 'exito',
            'mensaje' => 'Usuario registrado correctamente',
            'data' => [
                'usuario' => $user->name,
                'email' => $user->email,
            ]
        ], 201);        
    }

    // GET: /api/autenticacion/perfil (Requiere Token)
    public function perfil(Request $request)
    {
        return response()->json([
            'estado' => 'exito',
            'data' => $request->user(), // Devuelve objeto completo del usuario
            'roles_asignados' => $request->user()->getRoleNames()
        ]);
    }
}
