<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\APIHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validation_schema = [
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string',
            ];

            $validator = APIHelper::validateRequest($validation_schema, $request);
            if ($validator['errors']) {
                return APIHelper::makeApiResponse(false, $validator['error_messages'], null, 400);
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            return APIHelper::makeApiResponse(true, 'User registered successfully', null, 201);
        } catch (\Exception $e) {
            return APIHelper::makeApiResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $validation_schema = [
                'email' => 'required|email',
                'password' => 'required|string',
            ];

            $validator = APIHelper::validateRequest($validation_schema, $request);
            if ($validator['errors']) {
                return APIHelper::makeApiResponse(false, $validator['error_messages'], null, 400);
            }

            if (!Auth::attempt($request->only('email', 'password'))) { // Attempt to authenticate the user
                return APIHelper::makeApiResponse(false, 'Invalid credentials', null, 401);
            }

            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return APIHelper::makeApiResponse(true, 'User logged in successfully', ['token' => $token], 200);
        } catch (\Exception $e) {
            return APIHelper::makeApiResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return APIHelper::makeApiResponse(true, 'User logged out successfully', null, 200);
        } catch (\Exception $e) {
            return APIHelper::makeApiResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
