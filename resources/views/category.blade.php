@extends('layouts.main')

@section('content')
    <div class="container px-4 px-lg-5">

        <div class="row gx-4 gx-lg-5 justify-content-center">
            @include('layouts.partials.leftbar')
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h2 class="post-title">Категории</h2>
                <!-- Post preview-->
                @foreach($categories as $category)
                <div class="post-preview">
                    <a href="{{ route('category', $category->id) }}">
                        <h4 class="post-title">{{ $category->title }}</h4>
                    </a>
                </div>
                <!-- Divider-->
                <hr class="my-4"/>
                @endforeach
                <!-- Pager-->

                {{ $categories->links() }}



            </div>
        </div>
    </div>
@endsection
