<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        return Post::all()->makeHidden(['created_at', 'updated_at'])->toArray();
    }

    public function show(Request $request, $id)
    {
        try {
            return Post::findOrFail($id);
        } catch (Exception $th) {
            return response()->json(['message' => $th->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            Post::FindOrFail($id)->update($request->all());
            return response()->json(['message' => "Post has been updated"]);
        } catch (Exception $th) {
            return response()->json(['message' => $th->getMessage()], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'body' => 'required'
            ]);

            return Post::create($request->all());
        } catch (Exception $th) {
            return response()->json(['message' => $th->getMessage()], 404);
        }
    }

    public function delete($id)
    {
        Post::destroy($id);
        return response()->json(['message' => "Post has been deleted"]);
    }
}
