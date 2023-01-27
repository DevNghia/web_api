<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\v1\Collection;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

const pageSize = 2;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::paginate(pageSize);
        return new Collection($comment);
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
            'post_id' => 'required|numeric',
            'reader_id' => 'required|numeric'
        ]);
        $comment = Comment::create($request->all());
        if (!$comment) {
            return response()->forbidden('Access denied. Kindly contact administrator.');
        }
        return response()->created($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($commentId)

    {
        $comment = Comment::find($commentId);
        if (empty($comment)) {
            return response()->notFound();
        }

        return response()->ok($comment);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $commentID)
    {
        $comment = Comment::find($commentID);
        if (empty($comment)) {
            return response()->forbidden('Access denied. Kindly contact administrator.');
        }
        $request->validate([
            'content' => 'required|max:255',
            'post_id' => 'required|numeric',
            'reader_id' => 'required|numeric'
        ]);
        $comment->update($request->all());
        return response()->ok($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($commentID)
    {
        $comment = Comment::findOrFail($commentID);
        if (empty($comment)) {
            return response()->notFound();
        }
        $comment->delete();
        return response()->noContent();
    }
}
