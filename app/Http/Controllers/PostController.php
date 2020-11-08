<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        return Post::all();
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
        $data = $request->all();


        try {
            $post = Post::FindOrFail($id);
            $post->update($data);

            return $post;
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
        return Post::destroy($id);
    }

}



