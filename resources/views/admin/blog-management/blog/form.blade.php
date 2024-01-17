@extends('admin.master')

@section('title', isset($blog) ? 'Edit Blog' : 'Create Blog')

@section('body')
    <div class="row py-6">
        <div class="col-md-11 mx-auto">
            <div class="card">
                <div class="card-header bg-gray-light">
                    <h3>{{ isset($blog) ? 'Edit' : 'Create' }} Blog </h3>
                </div>


                <div class="card-body">
                    <form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}" method="post" class=""  enctype="multipart/form-data">

                        @csrf
                        @if(isset($blog))
                            @method('put')
                        @endif

                        <div class="row mt-4">
                            <div class="col-md-6 form-group">
                                <label for="" class="">Blog Category Name</label>
                                <div class="">
                                    <select name="blog_category_id" class="select2" id="">
                                        @foreach($blogCategories as $blogCategory)
                                            <option value="{{$blogCategory->id }}" {{ isset($blog) && $blogCategory->id == $blog-> blog_category_id ? 'selected' : '' }}>
                                                {{$blogCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="" class=""> Blog Title</label>
                                <div class="">
                                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ isset($blog) ?  $blog->title : '' }}" />
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    &nbsp; <!-- Non-breaking space for some separation -->
                                </div>
                            </div>

                            <div class="col-md-5 form-group">
                                <label for="" class="">Image</label>
                                <div class="">
                                    <input type="file" class="form-control" name="image" accept="images/*" />
                                    @if(isset($blogs))
                                        <div class="mt-2">
                                            <img src="{{ asset($blogs->image) }}" alt="" style="height: 80px">
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label for="" > Short Description </label>
                                    <div>
                                        <textarea name="short_description" id="" class="form-control" cols="30" rows="10" >{{ isset($blog) ?  $blog->short_description : '' }}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label for="" > Long Description </label>
                                    <div>
                                        <textarea name="long_description" id="summernote" class="form-control" cols="30" rows="10" >{{ isset($blog) ?  $blog->long_description : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <label for="" class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <div class="material-switch">
                                    <input id="someSwitchOptionDark" name="status" type="checkbox" {{ isset($blog) && $blog->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionDark" class="label-dark"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit"  class="btn btn-success" value="{{ isset($blog) ? 'Update' : 'Create' }} blog" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
