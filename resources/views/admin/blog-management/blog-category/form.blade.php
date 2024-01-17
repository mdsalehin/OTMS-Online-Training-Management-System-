@extends('admin.master')

@section('title', 'Manage Blog Category')

@section('body')

    <div class="row py-6">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-gray-light">
                    <h3>{{ isset($blogCategory) ? 'Edit' : 'Create' }} Blog Category</h3>
                </div>

                <div class="card-body">
                    <form action="{{ isset($blogCategory) ? route('blog-categories.update',$blogCategory->id) : route('blog-categories.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @if( isset($blogCategory) )
                            @method('put')
                        @endif

{{--                        <input type="hidden" name="blog_category_id" class="form-control" value="{{ $_GET['category-id'] ?? 0 }} " />--}}

                        <div class="row mt-4">
                            <label for="" class="col-md-4"> Blog Category Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" value="{{ isset($blogCategory) ? $blogCategory->name : '' }}" placeholder=" Blog Category Name">
                            </div>
                        </div>

                        <div class="row mt-4">
                            <label for="" class="col-md-4">Blog Category Image</label>
                            <div class="col-md-8">
                                <input type="file" name="image" class="form-control" accept="image/*" />

                                @if(isset($blogCategory))
                                    <div class="mt-2">
                                        <img src="{{ asset($blogCategory->image) }}" alt="" style="height: 80px">
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="" class="col-md-4">Blog Category Status</label>
                            <div class="col-md-8">
                                {{--                                <input type="radio" name="status" class="" >Published--}}
                                {{--                                <input type="radio" name="status" class="" ">UnPublished--}}

                                <div class="material-switch">
                                    <input id="someSwitchOptionDark" name="status" type="checkbox" {{ isset($blogCategory) && $blogCategory->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionDark" class="label-dark"></label>
                                </div>

                            </div>
                        </div>


                        <div class="row mt-5">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit"  class="btn btn-success" value="{{ isset($blogCategory) ? 'Update' : 'Create' }} Blog Category" />
                            </div>
                        </div>



                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
