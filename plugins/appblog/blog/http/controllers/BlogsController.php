<?php

namespace AppBlog\Blog\Http\Controllers;

use AppBlog\Blog\Http\Resources\BlogResource;
use AppBlog\Blog\Models\Blog;
use Illuminate\Routing\Controller;

class BlogsController extends Controller
{
    public function index()
    {
        return Blog::all();
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return BlogResource::make($blog);
    }

    public function addblog()
    {
        $data = post();
        $blog = new Blog();
        $blog->fill($data);
        $blog->save();
    }
}
