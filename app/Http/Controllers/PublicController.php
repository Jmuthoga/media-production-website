<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;


class PublicController extends Controller
{
    public function home()
    {
        return view('public.home');
    }


    public function blog($slug = null)
    {
        if ($slug) {
            $post = Blog::where('slug', $slug)->firstOrFail();
            return view('public.blog.show', compact('post'));
        }
        $posts = Blog::where('published', 1)->paginate(10);
        return view('public.blog.index', compact('posts'));
    }

    public function contact()
    {
        return view('public.contact');
    }
}
