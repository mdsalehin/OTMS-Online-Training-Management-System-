@extends('admin.master')

@section('title', 'Manage Course Category')

@section('body')
    <div class="row py-6">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-gray-light">
                    <h3>Manage Course Categories</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Category of</td>
                                <td>Name</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courseCategories as $courseCategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $courseCategory->course_category_id != 0 ? $courseCategory->courseCategory->name : 'Parent' }}</td>
                                    <td><a href="{{ route('course-categories.index', ['category-id' => $courseCategory->id]) }}">{{ $courseCategory->name }}</a></td>




                                    <td><img src="{{ asset($courseCategory->image) }}" alt="" style="height: 70px"></td>
                                    <td>{{ $courseCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('course-categories.create',['category-id' => $courseCategory->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                                        <a href="{{ route('course-categories.edit',$courseCategory->id) }}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('course-categories.destroy',$courseCategory->id) }}" id="deleteItem" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger ms-2 delete-item"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
