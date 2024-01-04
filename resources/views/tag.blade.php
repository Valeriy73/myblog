@extends('layouts.main')

@section('content')
    <div class="container px-4 px-lg-5">

        <div class="row gx-4 gx-lg-5 justify-content-center">
            @include('layouts.partials.leftbar')
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2 class="post-title">Теги</h2>
                <!-- Post preview-->
                @foreach($tags as $tag)
                <div class="post-preview">
                    <a href="{{ route('tag', $tag->id) }}">
                        <h4 class="post-title">{{ $tag->name }}</h4>
                    </a>
                </div>
                <!-- Divider-->
                <hr class="my-4"/>
                @endforeach
                <!-- Pager-->

                {{ $tags->links() }}



            </div>
        </div>
    </div>
@endsection
