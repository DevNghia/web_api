<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Collection;
use App\Models\Post;
use Illuminate\Http\Request;

const pageSize = 2;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = Post::paginate(pageSize);
        return new Collection($post);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
            'cate_id' => 'required|numeric',
            'post_id' => 'required|numeric'
        ]);
        $post = Post::create($request->all());
        if (!$post) {
            return response()->forbidden('Access denied. Kindly contact administrator.');
        }
        return response()->created($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($postID)
    {
        $post = Post::find($postID);
        if (empty($post)) {
            return response()->notFound();
        }
        $posts = Post::with('comments')->find($postID);
        return response()->ok($posts);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postID)
    {
        $post = Post::find($postID);
        if (empty($post)) {
            return response()->forbidden('Access denied. Kindly contact administrator.');
        }
        $request->validate([
            'content' => 'required|max:255',
            'cate_id' => 'required|numeric',
            'post_id' => 'required|numeric'
        ]);
        $post->update($request->all());
        return response()->ok($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($postID)
    {
        $post = Post::findOrFail($postID);
        if (empty($post)) {
            return response()->notFound();
        }
        $post->delete();
        return response()->noContent();
    }
}
