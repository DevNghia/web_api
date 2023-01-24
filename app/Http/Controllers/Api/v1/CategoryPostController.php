<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\Collection;
use App\Models\CategoryPost;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = CategoryPost::paginate(2);
        return new Collection($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $category = CategoryPost::create($request->all());
        if (!$category) {
            return response()->forbidden('Access denied. Kindly contact administrator.');
        }
        return response()->created($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function show($categoryPost)

    {
        $category = CategoryPost::find($categoryPost);;
        if (empty($category)) {
            return response()->notFound();
        }

        return response()->ok($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcategoryPost)
    {
        $category = CategoryPost::find($idcategoryPost);
        if (empty($category)) {
            return response()->forbidden('Access denied. Kindly contact administrator.');
        }
        $request->validate([
            'title' => 'required',
        ]);
        $category->update($request->all());
        return response()->ok($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryPost  $categoryPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idcategoryPost)
    {
        $category = CategoryPost::findOrFail($idcategoryPost);
        $category->delete();
        return response()->noContent();
    }
}
