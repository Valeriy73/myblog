@extends('layouts.main')

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">

            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{ route('single', $post->id) }}">
                        <h2 class="post-title">{{ $post->title }}</h2>
                    </a>
                    <img src="{{ url('storage/' . $post->preview_image) }}" class="img-thumbnail w-25" alt="...">
                    <p class="post-meta">
                        Posted by
                        <a href="#">Start Bootstrap</a>
                        on {{ $post->created_at }} category {{ $categories->get($post->category_id)->title }}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4"/>
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older
                        Posts →</a></div>
            </div>
        </div>
    </div>
@endsection
