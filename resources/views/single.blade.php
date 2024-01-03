@extends('layouts.single')

@section('content')
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {{ $post->message }}
                </div>
            </div>
            @if(auth()->check() && auth()->id() == $post->user_id)
                <div class="post-preview ms-2 me-2 mt-5">
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-success ">
                        Редактировать
                    </a>
                </div>
            @endif
        </div>
    </article>



@endsection
