<?php

use AppBlog\Blog\Models\Blog;

Route::get('/blogs', function () {
    return Blog::all();
});

Route::post('/blog', function () {
    $data = post();
    $blog = new Blog();
    $blog->fill($data);
    $blog->save();
});
