@extends('admin.master')

@section('title', isset($course) ? 'Edit Course' : 'Create Course')

@section('body')
    <div class="row py-6">
        <div class="col-md-11 mx-auto">
            <div class="card">
                <div class="card-header bg-gray-light">
                    <h3>{{ isset($course) ? 'Edit' : 'Create' }} Course </h3>
                </div>

                <div class="card-body">
                    <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" method="post" class=""  enctype="multipart/form-data">

                        @csrf
                        @if(isset($course))
                            @method('put')
                        @endif

                        <div class="row mt-4">
                            <div class="col-md-6 form-group">
                                <label for="" class="">Category Name</label>
                                <div class="">
                                    <select name="course_category_id" class="select2" id="">
                                        @foreach($courseCategories as $courseCategory)
                                            <option value="{{ $courseCategory->id }}" {{ isset($course) && $courseCategory->id == $course->course_category_id ? 'selected' : '' }}>
                                                {{ $courseCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="" class=""> Course Title</label>
                                <div class="">
                                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ isset($course) ?  $course->title : '' }}" />
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    &nbsp; <!-- Non-breaking space for some separation -->
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="" class=""> Select Teacher </label>
                                <div class="">
                                    <select name="teacher_id" class="form-control select2" id="">

                                        <option value="" disabled  >Select A Trainer </option>

                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ isset($course) && $teacher->id == $course->teacher_id ? 'selected' : '' }}>
                                                {{ $teacher->name }}
                                            </option>
                                        @endforeach



                                        {{--                                        <option value="2">Robiul</option>--}}
{{--                                        <option value="3">Shourov</option>--}}
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3 form-group">
                                <label for="" class="">Price</label>
                                <div class="">
                                    <input type="number" name="price" class="form-control" placeholder="Price" value="{{ isset($course) ?  $course->price : '' }}" />
                                </div>
                            </div>

                            <div class="col-md-5 form-group">
                                <label for="" class="">Banner</label>
                                <div class="">
                                    <input type="file" class="form-control" name="image" accept="images/*" />
                                    @if(isset($courses))
                                        <div class="mt-2">
                                            <img src="{{ asset($courses->image) }}" alt="" style="height: 80px">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    &nbsp; <!-- Non-breaking space for some separation -->
                                </div>
                            </div>

                            <div class="row mt-4">

                                <div class="col-md-3 form-group">
                                    <label for="" class="">Starting Date</label>
                                    <div class="">
                                        <input type="text" name="starting_date" id="courseDate" class="form-control" value="{{ isset($course) ?  $course->starting_date : '' }}" />
                                    </div>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for="" class="ms-1">Total Duration In Month</label>
                                    <div class="">
                                        <input type="number" name="total_duration" class="form-control" placeholder="Total Duration In Month"  value="{{ isset($course) ?  $course->total_duration : '' }}" />
                                    </div>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for="" class="">Total Classes</label>
                                    <div class="">
                                        <input type="number" name="total_class" class="form-control" placeholder="Total Classes" value="{{ isset($course) ?  $course->total_class : '' }}" />
                                    </div>
                                </div>


                                <div class="col-md-3 form-group">
                                    <label for="" class="">Total Hours</label>
                                    <div class="">
                                        <input type="number" name="total_hours" class="form-control" placeholder="Total Hours" value= "{{ isset($course) ?  $course->total_hours : '' }}"  />
                                    </div>
                                </div>

                            </div>


                            <div class="row mt-4">
                                <div class="col-md-12">
                                    &nbsp; <!-- Non-breaking space for some separation -->
                                </div>
                            </div>


                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label for="" > Short Description </label>
                                    <div>
                                        <textarea name="short_description" id="" class="form-control" cols="30" rows="10" >{{ isset($course) ?  $course->short_description : '' }}</textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    &nbsp; <!-- Non-breaking space for some separation -->
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <label for="" > Long Description </label>
                                    <div>
                                        <textarea name="long_description" id="summernote" class="form-control" cols="30" rows="10" >{{ isset($course) ?  $course->long_description : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row mt-4">
                            <div class="col-md-6">
                                &nbsp; <!-- Non-breaking space for some separation -->
                            </div>
                        </div>


                        <div class="row mt-5">
                            <label for="" class="col-md-4">Status</label>
                            <div class="col-md-8">
                                {{--                                <input type="radio" name="status" class="" >Published--}}
                                {{--                                <input type="radio" name="status" class="" ">UnPublished--}}

                                <div class="material-switch">
                                    <input id="someSwitchOptionDark" name="status" type="checkbox" {{ isset($course) && $course->status == 0 ? '' : 'checked' }} />
                                    <label for="someSwitchOptionDark" class="label-dark"></label>
                                </div>

                            </div>
                        </div>


                        <div class="row mt-5">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit"  class="btn btn-success" value="{{ isset($course) ? 'Update' : 'Create' }} Course" />
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
