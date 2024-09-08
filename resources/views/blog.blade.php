@extends('layouts.main')

@section('container') 	



    <h1 class="mb-3 text-center"> {{ $title }}  </h1>
    <div class="row justify-content-center">
        <div class="col-md-6 mb-5">
            <form action="/blog" method="get">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{  request('category') }}">  
                @endif
                @if(request('author'))
                    <input type="hidden" name="author" value="{{  request('author') }}">  
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{  request('search') }}">  
                    <button class="btn btn-outline-danger" type="submit" id="">Search</button>
                </div>
            </form>
        </div> 
    </div>

    @if($blogs->count())
        <div class="card mb-3">
            
            {{-- menampilkan img,tapi dicek terlebih dahulu ada img tidak di db jika tidak ada mengunakan img default  --}}
            @if($blogs[0]->image)
                <img src="{{ asset('storage/'.$blogs[0]->image )}}"  alt="img/{{ $blogs[0]->category->name }}.jpg" class="img-fluid my-3">
            @else
                <img src="/img/{{ $blogs[0]->category->name }}.jpg" height="400" class="card-img-top" alt="img/{{ $blogs[0]->category->name }}.jpg">
            @endif
            {{-- akhir img  --}}


            <div class="card-body">
                <h3 class="card-title">
                    <a href="/blog/{{ $blogs[0]->slug }}" class="text-decoration-none text-dark">
                        {{ $blogs[0]->title }}
                    </a>
                </h3>
                <p> 
                    <small class="text-muted">
                        Website by
                        <a href="/blog?author={{ $blogs[0]->user->username }}" class="text-decoration-none"> 
                            {{ $blogs[0]->user->name }}
                        </a> |      
                        <a href="/blog?category={{ $blogs[0]->category->slug }}" class="text-decoration-none"> 
                            {{ $blogs[0]->category->name }} 
                        </a> 
                        <br> {{ $blogs[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $blogs[0]->excerpt }}</p>
                <a href="/blog/{{ $blogs[0]->slug }}" class="text-decoration-none btn btn-primary">Read More...</a>
            </div>
        </div>

       

        <div class="container">
            <div class="row">
                @foreach ($blogs->skip(1) as $blog)
                    <div class="col-md-4 mb-3">
                        <div class="card" >
                            <div class="position-absolute px-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7)">
                                <a href="/blog?category={{ $blog->category->slug }}" class="text-decoration-none text-light">{{  $blog->category->name }}</a>
                            </div>
                            
                            {{-- menampilkan img,tapi dicek terlebih dahulu ada img tidak di db jika tidak ada mengunakan img default  --}}
                            @if($blog->image)
                                <img src="{{ asset('storage/'.$blog->image )}}"  alt="img/{{ $blog->category->name }}.jpg" class="img-fluid my-3">
                            @else
                                <img src="/img/{{ $blog->category->name }}.jpg" class="card-img-top" alt="img/{{ $blog->category->name }}.jpg">
                            @endif
                            {{-- akhir img  --}}
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p> 
                                    <small class="text-muted">
                                        Website by
                                        <a href="/blog?author={{ $blog->user->username }}" class="text-decoration-none"> 
                                            {{ $blog->user->name }}
                                        </a> 
                                        <br> {{ $blog->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $blog->excerpt }}</p>
                                <a href="/blog/{{ $blog->slug }}" class="btn btn-primary">Read More...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    
    @else 
        <p class="fs-4 text-center">Not post Found.</p>
    @endif


    {{ $blogs->links() }}
    





@endsection 
    

