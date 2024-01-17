<?php

namespace App\Http\Controllers\Admin\BlogModule;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogModule\Blog;
use App\Models\Admin\BlogModule\BlogCategory;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $blog, $blogs = [];
    public function index()
    {

        $this->blogs = Blog::latest()->get();
        return view('admin.blog-management.blog.index',[
            'blogs' => $this->blogs,
//            'users' => User::get()
        ]);
    }

    public function create()
    {
//        return  CourseCategory::whereStatus(1)->get();
        return view('admin.blog-management.blog.form', [
//            'courseCategories' => CourseCategory::whereStatus(1)->get(),
            'blogCategories' => BlogCategory::whereStatus(1)->get(),
//            'teachers' => User::where('role',1)->get()
        ]);

    }

    public function store(Request $request)
    {
        Blog::createOrUpdateBlog($request);
        return back()->with('success','Blog  Created Successfully');
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {

        return view('admin.blog-management.blog.form', [
            'blog' => Blog::find($id),
            'blogCategories' => BlogCategory::whereStatus(1)->get(),
//            'teachers' => User::where('role',1)->get()
        ]);
    }
    public function update(Request $request, string $id)
    {
        Blog::createOrUpdateBlog($request, $id);
        return redirect()->route('blogs.index')->with('success', 'Blog  Updated Successfully');
    }

    public function destroy(string $id)
    {
        Blog::deleteBlog($id);
        return back()->with('success', 'Blog  Deleted Successfully');
    }
}
