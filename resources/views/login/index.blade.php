@extends('layouts.main')

@section('container') 	
    <div class="row justify-content-center">
        <div class="col-md-4">

            {{-- alert data sukses masuk /registration  --}}
            @if(session()->has('succes'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('succes') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- akhir alert data sukses masuk/registration  --}}


            {{-- alert login error  --}}
            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- akhir alert login error  --}}


            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Please Log in</h1>
                <form action="/login" method="post">
                    @csrf 
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        <label for="email">Email address</label>

                        @error('email') 
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                
                    {{-- <div class="checkbox mb-3">
                        <label>
                        <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> --}}
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
                    {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
                </form>
                <small class="d-block mt-3 text-center">belum punya akun? <a href="/register" class="text-decoration-none">daftar disini</a></small>
            </main>
        </div>
    </div>

    

@endsection 	