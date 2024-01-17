<?php

namespace App\Http\Controllers\Admin\BlogModule;
use App\Http\Controllers\Controller;
use App\Models\Admin\BlogModule\BlogCategory;
use Illuminate\Http\Request;


class BlogCategoryController extends Controller
{
    public $blogCategory;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.blog-management.blog-category.index',[
//            'courseCategories' => CourseCategory::latest()->get()
            'blogCategories' => BlogCategory::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-management.blog-category.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return $request;
//        fileUpload();
//        exit();
        BlogCategory::createOrUpdateBlogCategory($request);
        return back()->with('success','Blog Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $blogCategory = BlogCategory::find($id);

        return view('admin.blog-management.blog-category.form', [
            'blogCategory' =>  $blogCategory,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        BlogCategory::createOrUpdateBlogCategory($request, $id);
        return redirect()->route('blog-categories.index')->with('success', 'Blog Category Updated Successfully');
    }

    public function destroy(string $id)
    {
        BlogCategory::deleteBlogCategory($id);
        return redirect()->route('blog-categories.index')->with('success', 'Blog Category Deleted Successfully');
    }
}
