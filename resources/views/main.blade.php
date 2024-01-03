@extends('layouts.main')

@section('content')
    <div class="container px-4 px-lg-5">

        <div class="row gx-4 gx-lg-5 justify-content-center">
            @include('layouts.partials.leftbar')
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
                        <a href="#">{{ $post->user->name }}</a>
                        on {{ $post->created_at->format('F d, Y') }} category {{ $post->category->title }}
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4"/>
                @endforeach
                <!-- Pager-->

                {{ $posts->links() }}



            </div>
        </div>
    </div>
@endsection
