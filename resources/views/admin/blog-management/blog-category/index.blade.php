@extends('admin.master')

@section('title', 'Manage Blog Category')

@section('body')
    
    <div class="card-body">
        <div class="table-responsive export-table">
            <table class="table" id="file-datatable">
                <thead>
                <tr>
                    <td>#</td>
{{--                    <td>Category of</td>--}}
                    <td>Name</td>
                    <td>Image</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($blogCategories as $blogCategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

    {{--                        <td>{{ $blogCategory->blog_category_id != 0 ? $blogCategory->blogCategory->name : 'Parent' }}</td>--}}

                            <td>{{ $blogCategory->name }}</td>
                            <td><img src="{{ asset($blogCategory->image) }}" alt="" style="height: 70px"></td>
                            <td>{{ $blogCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td class="d-flex">
    {{--                            <a href="{{ route('blog-categories.create',['category-id' => $blogCategory->id]) }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>--}}
                                <a href="{{ route('blog-categories.edit',$blogCategory->id) }}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('blog-categories.destroy',$blogCategory->id) }}" id="deleteItem" method="post">
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
@endsection
