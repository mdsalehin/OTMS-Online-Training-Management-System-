<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OTMSController extends Controller
{
    public function home()
    {
        return view('front.home.home');
    }

    public function category()
    {
        return view('front.courses.category');
    }

    public function details()
    {
        return view('front.courses.details');
    }
    public function blogCategory()
    {
        return view('front.blog-management.blog-categories');
    }

    public function blog()
    {
        return view('front.blog-management.single-blog');
    }

    public function contact()
    {
        return view('front.contact.contact');
    }
    public function about()
    {
        return view('front.about.about');
    }

}



