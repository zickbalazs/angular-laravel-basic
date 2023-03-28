<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Blog::all();

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
    public function store(StoreBlogRequest $request)
    {
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->ratings = $request->ratings;
        $blog->save();
        return $blog;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (isset(Blog::find($id)->id)){
            return Blog::find($id);
        }
        else return array("message"=>"No such blog");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request)
    {

        $blog = Blog::find($request->id);
        if (isset($blog->id)){
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->ratings = $request->ratings;
            $blog->save();
            return $blog;
        }
        else return response()->json(array("message" => "such a blog doesn't exist!"), 400);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        if (isset($blog->id)){
            $blog->delete();
            return array("message"=>"success");
        }
        else{
            return response()->json(array("message"=>"no such blog!"), 400);
        }
    }
}
