@extends('dashboard.layouts.main') 

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-5"> {{ $post->title }} </h1>
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my Post</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            
            {{-- delete posts  --}}
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf 
                <button class="btn bg-danger " onclick="return confirm('Are you delete this post?')"> <span data-feather="x-circle"></span> Delete </button>
            </form>
            {{-- akhir delete post  --}}
            
            {{-- menampilkan img,tapi dicek terlebih dahulu ada img tidak di db jika tidak ada mengunakan img default  --}}
            @if($post->image)
                <img src="{{ asset('storage/'.$post->image )}}"  alt="img/{{ $post->category->name }}.jpg" class="img-fluid my-3">
            @else
                <img src="/img/{{ $post->category->name }}.jpg"  alt="img/{{ $post->category->name }}.jpg" class="img-fluid my-3">
            @endif
            {{-- akhir img  --}}

            <article class="my-3">
                <p>{!! $post->body  !!}</p>
            </article>


            <a href="/dashboard/posts"> kembali ke blog</a>

        </div>
    </div>
</div>
@endsection