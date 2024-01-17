@extends('admin.master')

@section('title', 'Manage Blogs')

@section('body')
    <div class="row py-6">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-gray-light">
                    <h3>Manage Blogs </h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table class="table" id="file-datatable">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Blog Name</td>
                                    <td>Title</td>
{{--                                    <td>Author Name</td>--}}
                                    <td>S.Description</td>
                                    <td>L.Description</td>
                                    <td>Image</td>
                                    <td>Status</td>
                                    <td>Action</td>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blog->blogCategory->name }}</td>
                                        <td> {{$blog->title}}</td>

{{--                                      @foreach($users as $user)--}}
{{--                                            <td> {{ $blog->user->name }}</td>--}}
{{--                                      @endforeach--}}

{{--                                        <td>{{ optional($blog->user)->name }}</td>--}}

                                        <td> {{ $blog->short_description }}</td>
                                        <td> {!! $blog->long_description  !!}</td>
                                        <td><img src="{{ asset($blog->image) }}" alt="" style="height: 70px"></td>
                                        <td>{{ $blog->status == 1 ? 'Published' : 'Unpublished' }}</td>

                                        <td class="d-flex">
                                            <a href="{{ route('blogs.edit',$blog->id) }}" class="btn btn-sm btn-secondary ms-2"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('blogs.destroy',$blog->id) }}" id="deleteItem" method="post">
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
