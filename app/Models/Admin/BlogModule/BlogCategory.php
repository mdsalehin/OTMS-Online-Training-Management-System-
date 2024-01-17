<?php

namespace App\Models\Admin\BlogModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $fillable = ['blog_category','name','image','status'];

    protected static $blogCategory;

    public static function createOrUpdateBlogCategory($request,$id=null)
    {
        if(isset($id))
        {
            self::$blogCategory =BlogCategory::find($id);
        }
        else
        {
            self::$blogCategory = new BlogCategory();
        }

//        self::$blogCategory->course_category_id    = isset($request-> course_category_id)? $request->course_category_id : 0;
//        self::$blogCategory->blog_category_id   = $request->blog_category_id;

//        self::$courseCategory->course_category_id    =  $request-> course_category_id ?? 0;

        self::$blogCategory->name   =  $request->name;
        self::$blogCategory->image   = fileUpload( $request->file('image'),'blog-categories', isset($id) ? BlogCategory::find($id)->image : null );
        self::$blogCategory->status  =  $request->status == 'on' ? 1 : 0;

        self::$blogCategory->save();
    }


    public static function deleteBlogCategory($id)
    {
        self::$blogCategory = BlogCategory::find($id);

        if(file_exists(self::$blogCategory->image))
        {
            unlink(self::$blogCategory->image);
        }
        self::$blogCategory->delete();

    }
}
