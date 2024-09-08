@extends('layouts.main')

@section('container') 	
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Register Now!</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror " id="name" placeholder="name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name') 
                            <div id="" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                        
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username') 
                            <div id="" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email') 
                            <div id="" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="Password" placeholder="Password" required>
                        <label for="Password">Password</label>
                        @error('password') 
                            <div id="" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                
                    {{-- <div class="checkbox mb-3">
                        <label>
                        <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> --}}
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                    {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p> --}}
                </form>
                <small class="d-block mt-3 text-center">sudah punya akun? <a href="/login" class="text-decoration-none">Ayoo log in</a></small>
            </main>
        </div>
    </div>

    

@endsection 	