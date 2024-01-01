@extends('admin.partials.main')

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="col-12 text-center">
            <h2>Посты</h2>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <a href="{{ route('admin.post.create') }}" class="btn btn-info">Добавить</a>
            </div>
            @foreach($posts as $post)
                <div class="col-md-10 col-lg-8 col-xl-7 d-flex justify-content-between">
                    <!-- Post preview-->
                        <div class="post-preview">
                            <a href="{{ route('single', $post->id) }}">
                                <h2 class="post-title">{{ $post->title }}</h2>
                            </a>
                        </div>
                    <div class="d-flex">
                        <div class="post-preview ms-2 me-2">
                            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-success ">
                                Редактировать
                            </a>
                        </div>
                        <div class="post-preview ms-2 me-2">
                            <form action="{{ route('admin.post.delete', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Удалить" class="btn btn-danger post-title">
                            </form>
                        </div>
                    </div>

                </div>
                <!-- Divider-->
                <hr class="my-4"/>
            @endforeach
        </div>
    </div>
@endsection
