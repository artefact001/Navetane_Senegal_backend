<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    //     public function login(Request $request)
    //    {
    //        // Validation des données
    //        $validator = validator(
    //            $request->all(),
    //            [
    //                'email' => 'required|email|string',
    //                'password' => 'required|string|min:8',
    //            ]
    //        );
    //        // Si les données ne sont pas valides, renvoyer les erreurs
    //        if ($validator->fails()) {
    //            return response()->json(['error' => $validator->errors()], 422);
    //        }
    //        // Si les données sont valides, authentifier l'utilisateur
    //        $credentials = $request->only('email', 'password');
    //        $token = auth()->attempt($credentials);
    

    //                // Récupérer l'utilisateur authentifié
    //        $user = auth()->user();


    //        // Récupérer les rôles de l'utilisateur


    //        // Si les informations de connexion ne sont pas correctes, renvoyer une erreur 401 
    //        if (!$token) {
    //            return response()->json(['message' => 'Information de connexion incorrectes'], 401);
    //        }
    //        // Renvoyer le token d'authentification
    //        return response()->json([
    //            "access_token" => $token,
    //            "token_type" => "bearer",
    //            "user" => auth()->user(),
    //            "expires_in" => env("JwT_TTL") * 60  . 'seconds'
    //        ]);
    //    }
public function login(Request $request)
    {
        // Validation des données
        $validator = validator($request->all(), [
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        // Vérifier si l'utilisateur existe
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Utilisateur non trouvé',
            ], 404); // User not found
        }

        // Vérifier si le mot de passe est correct
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Mot de passe incorrect',
            ], 401); // Incorrect password
        }

        // Authentification réussie, générer le token
        $token = auth()->guard('api')->login(user : $user);

        // Obtenir les rôles de l'utilisateur

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => $user,
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60, // Expiration en secondes
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }

    // public function profile()
    // {
    //     return view('userprofile');
    // }
}
