<?php

namespace App\Http\Controllers;

use App\Http\Validation\LoginValidation;
use App\Http\Validation\RegisterValidation;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function register(Request $request, RegisterValidation $validation): JsonResponse
    {
        $validator = Validator::make($request->all(), $validation->Rules(), $validation->Messages());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $user = User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'api_token' => Str::random(60)
        ]);
        return response()->json($user);
    }

    public function login(Request $request, LoginValidation $validation): JsonResponse
    {
        $validator = Validator::make($request->all(), $validation->Rules(), $validation->Messages());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = User::where('email', $request->input('email'))->firstOrFail();
            return response()->json($user);
        } else {
            return response()->json(['error' => 'Bad ids']);
        }
    }
}
