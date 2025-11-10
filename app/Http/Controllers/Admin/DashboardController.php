<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        $blogs = Blog::count();

        return view('admin.dashboard', compact('blogs'));
    }
}
