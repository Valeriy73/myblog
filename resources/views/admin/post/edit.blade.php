@extends('admin.partials.main')

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="col-12 text-center mb-5">
            <h2>Редактирование поста</h2>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <form action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="titlePost" class="form-label">Название поста</label>
                        <input type="text" name="title" class="form-control" id="titlePost" value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="contentPost" class="form-label">Содержание поста</label>
                        <textarea name="message" class="form-control" id="contentPost"
                                  rows="3">{{ $post->message }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mainImage" class="form-label d-block">Главное изображение</label>
                        <img class="w-25 mb-3 mt-3" src="{{ url('storage/'.$post->main_image) }}" alt="">
                        <input name="main_image" class="form-control" type="file" id="mainImage">
                    </div>
                    <div class="mb-3">
                        <label for="previewImage" class="form-label d-block">Превью изображение</label>
                        <img class="w-25 mb-3 mt-3" src="{{ url('storage/'.$post->preview_image) }}" alt="">
                        <input name="preview_image" class="form-control" type="file" id="previewImage">
                    </div>
                    <div class="mb-3">
                        <label for="categoryPost" class="form-label">Категория</label>
                        <select name="category_id" class="form-select" aria-label="Default select example"
                                id="categoryPost">
                            <option selected>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tagPost" class="form-label">Теги</label>
                        <select class="form-select" name="tag_ids[]" multiple id="tagPost">
                            @foreach($tags as $tag)

                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $editTags) ? 'selected' : '' }}>{{ $tag->name }}</option>

                            @endforeach

                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Загрузить">
                </form>
                <!-- Divider-->
                <hr class="my-4"/>
            </div>
        </div>
    </div>
@endsection
