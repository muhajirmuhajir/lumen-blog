<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function index(Request $request)
    {
        return User::all();
    }

    public function show(Request $request, $id)
    {
        try {
            return User::findOrFail($id);
        } catch (Exception $th) {
            return response()->json(['message' => $th->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'username' => 'unique:users,username',
            ]);
            User::FindOrFail($id)->update($request->all());
            return response()->json(['message' => "User has been updated"]);
        } catch (Exception $th) {
            return response()->json(['message' => $th->getMessage()], 404);
        }
    }

    public function delete($id)
    {
        User::destroy($id);
        return response()->json(['message' => "User has been deleted"]);
    }

    public function register(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email|unique:users',
        'username' => 'required|min:6',
        'password' => 'required|min:6'
      ]);

      $attributes = [
        'email' => $request->email,
        'username' => $request->username,
        'password' => app('hash')->make($request->password)
      ];
      $user = User::create($attributes);
      return $user;
    }


    public function login(Request $request)
    {
      $this->validate($request, [
        'password' => 'required',
        'email' => 'required'
      ]);

      $credentials = request(['email', 'password']);

      if (!$token = Auth::attempt($credentials)) {
        return response()->json([
          'msg' => 'login gagal'
        ], 401);
      } else {
        return response()->json([
          'access_token' => $token,
          'token_type' => 'bearer',
          'expires_in' => auth()->factory()->getTTL() * 60
        ], 401);
      }
    }

    public function logout()
    {
      auth()->logout();
      return response()->json([
        'msg' => 'logout berhasil'
      ], 200);
    }


}
