<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UserController extends Controller
{

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

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required|unique:users,username',
                'password' => 'required'
            ]);
            $hash = new BcryptHasher();
            return User::create([
                'username' => $request->input('username'),
                'password' => $hash->make($request->input('password'))
            ]);
        } catch (Exception $th) {
            return response()->json(['message' => $th->getMessage()], 404);
        }
    }

    public function delete($id)
    {
        User::destroy($id);
        return response()->json(['message' => "User has been deleted"]);
    }
}
