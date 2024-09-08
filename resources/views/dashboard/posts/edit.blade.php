@extends('dashboard.layouts.main') 

@section('container')
{{-- heading  --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post </h1>
</div>
{{-- akhir heading  --}}


{{-- form create post  --}}
<div class="col-lg-8">
    <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf 

        {{-- title  --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
            @error('title') 
                <div id="" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror 
        </div>
        {{-- akhir title  --}}


        {{-- slug  --}}
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug',$post->slug) }}">
            @error('slug') 
                <div id="" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror 
        </div>
        {{-- akhir slug  --}}


        {{-- category  --}}
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach( $categories as $category )
                    @if(old('category_id', $post->category_id) == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else 
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>        
        </div>
        {{-- akhir category --}}


        {{-- input img  --}}
        <div class="mb-3">
            <label for="image" class="form-label">Post img</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}">

            @if($post->image)
                <img src="{{ asset('storage/' .$post->image) }}" alt="" class="img-preview img-fluid my-4 col-sm-5 d-block">
            @else 
                <img  alt="" class="img-preview img-fluid my-4 col-sm-5">
            @endif
            
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        {{-- akhir input img  --}}


        {{-- body  --}}
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body',$post->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        {{-- akhir  --}}


    <button type="submit" class="btn btn-primary">Edit Post</button>
    </form>
</div>



<script>
    const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");

    title.addEventListener("change", function() {
        
        fetch('/dashboard/posts/cekSlug?title=' + title.value) //jika ada request yg mengarah ke '/dashboard/posts/createSlug' maka jalanka
            .then(response => response.json()) 
            .then(data => slug.value = data.slug) 
    });


    // untuk membuat img preview sebelum img dikirim ke db dan direktori local 
    function previewImage() {
        const image = document.querySelector('#image') ; //menangkap input img
        const imgPreview = document.querySelector('.img-preview') ;  //menangkap tag img dengan src kosong 

        imgPreview.style.display = 'block' ; 

        const oFReader = new FileReader() ;      // menangkap file dan menjalankan nya secara asyncron
        oFReader.readAsDataURL(image.files[0]) ; // mengambil file yang pertama kali diambil di input['image'] dan menampilkanya menjadi img

        //setelah file berhasil dibaca/diambil maka akan diload 
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result ; //tetapkan hasilnya (URL data dari gambar) ke atribut 'src' elemen img, sehingga gambar akan ditampilkan
        }
    }
    //akhir untuk membuat img preview sebelum img dikirim ke db dan direktori local 
</script>


{{-- akhir form create post  --}}
@endsection