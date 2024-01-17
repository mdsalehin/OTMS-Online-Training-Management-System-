@extends('admin.master')

@section('title',isset($courseCategory) ? 'Edit' : 'Create'.' Course Category')


@section('body')
    <div class="row py-6">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-gray-light">
                    <h3>{{ isset($courseCategory) ? 'Edit' : 'Create' }} Course Category</h3>
                </div>

                <div class="card-body">
                    <form action="{{ isset($courseCategory) ? route('course-categories.update',$courseCategory->id) : route('course-categories.store') }}" method="post" enctype="multipart/form-data">

                    @csrf
                        @if( isset($courseCategory) )
                            @method('put')
                        @endif

                        <input type="hidden" name="course_category_id" class="form-control" value="{{ $_GET['category-id'] ?? 0 }} " />

                        <div class="row mt-4">
                            <label for="" class="col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" value="{{ isset($courseCategory) ? $courseCategory->name : '' }}" placeholder="Category Name">
                            </div>
                        </div>

                        <div class="row mt-4">
                            <label for="" class="col-md-4">Category Image</label>
                            <div class="col-md-8">
                                <input type="file" name="image" class="form-control" accept="image/*">

                                @if(isset($courseCategory))
                                    <div class="mt-2">
                                        <img src="{{ asset($courseCategory->image) }}" alt="" style="height: 80px">
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="row mt-5">
                            <label for="" class="col-md-4">Category Status</label>
                            <div class="col-md-8">
{{--                                <input type="radio" name="status" class="" >Published--}}
{{--                                <input type="radio" name="status" class="" ">UnPublished--}}

                                <div class="material-switch">
                                    <input id="someSwitchOptionDark" name="status" type="checkbox" {{ isset($courseCategory) && $courseCategory->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionDark" class="label-dark"></label>
                                </div>

                            </div>
                        </div>


                        <div class="row mt-5">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit"  class="btn btn-success" value="{{ isset($courseCategory) ? 'Update' : 'Create' }} Course Category" />
                            </div>
                        </div>



                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
