<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\ServiceItem;
use App\Models\Gallery;
use App\Models\Blog;

class DashboardController extends Controller
{
    public function index()
    {
        $pages = Page::count();
        $services = ServiceItem::count();
        $gallery = Gallery::count();
        $blogs = Blog::count();

        return view('admin.dashboard', compact('pages', 'services', 'gallery', 'blogs'));
    }
}
