@extends('dashboard.layouts.main') 

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Post Categories</h1>
    </div>


    <div class="table-responsive">

        {{-- alert ketika data sukses masuk  --}}
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        {{--akhir alert ketika data sukses masuk  --}}


        <a href="/dashboard/categories/create" class="btn btn-primary mb-2">Create New Category</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            {{-- delete category  --}}
                            <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf 
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you delete this post?')"> <span data-feather="x-circle"></span> </button>
                            </form>
                            {{-- delete post  --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection