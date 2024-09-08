@extends('layouts.main')

@section('container') 	


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1> {{ $posts->title }} </h1>
                <p> Website by <a href="/blog?author={{ $posts->user->username }}" class="text-decoration-none"> {{ $posts->user->name }}</a> |          
                    <a href="/blog?category={{ $posts->category->slug }}" class="text-decoration-none"> {{ $posts->category->name }} </a>
                </p>
                
                {{-- menampilkan img,tapi dicek terlebih dahulu ada img tidak di db jika tidak ada mengunakan img default  --}}
                @if($posts->image)
                    <img src="{{ asset('storage/'.$posts->image )}}"  alt="img/{{ $posts->category->name }}.jpg" class="img-fluid my-3">
                @else
                    <img src="/img/{{ $posts->category->name }}.jpg"  alt="img/{{ $posts->category->name }}.jpg" class="img-fluid my-3">
                @endif
                {{-- akhir img  --}}
                
                <article class="my-3 fs-5">
                    <p>{!! $posts->body  !!}</p>
                </article>


                <a href="/blog"> kembali ke blog</a>

            </div>
        </div>
    </div>

@endsection 		
