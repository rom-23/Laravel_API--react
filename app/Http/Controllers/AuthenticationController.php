<?php

namespace App\Http\Controllers;

use App\Http\Validation\RegisterValidation;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function register(Request $request, RegisterValidation $validation): JsonResponse
    {
        $validator = Validator::make($request->all(), $validation->Rules(), $validation->Messages());
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $user = User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'api_token' => Str::random(60)
        ]);
        return response()->json($user);
    }
}
