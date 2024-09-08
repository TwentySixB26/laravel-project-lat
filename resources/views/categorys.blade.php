@extends('layouts.main')

@section('container') 	
    
    <h2>Halaman Category</h2>

    <div class="container">
        <div class="row">
            @foreach ($categorys as $c)
                <div class="col-md-4">
                    <a href="/blog?category={{ $c->slug}}">
                        <div class="card  text-white ">
                            <img src="/img/{{ $c->name }}.jpg" class="card-img" alt="{{ $c->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center p-4 flex-fill fs-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $c->name }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

        
@endsection 	