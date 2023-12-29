@extends('admin.partials.main')

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="col-12 text-center mb-5">
            <h2>Добавление поста</h2>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titlePost" class="form-label">Название поста</label>
                        <input type="text" name="title" class="form-control" id="titlePost">
                    </div>
                    <div class="mb-3">
                        <label for="contentPost" class="form-label">Содержание поста</label>
                        <textarea name="message" class="form-control" id="contentPost" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mainImage" class="form-label">Главное изображение</label>
                        <input name="main_image" class="form-control" type="file" id="mainImage">
                    </div>
                    <div class="mb-3">
                        <label for="previewImage" class="form-label">Превью изображение</label>
                        <input name="preview_image" class="form-control" type="file" id="previewImage">
                    </div>
                    <div class="mb-3">
                        <label for="categoryPost" class="form-label">Категория</label>
                        <select name="category_id" class="form-select" aria-label="Default select example" id="categoryPost">
                            <option selected>Выберите категорию</option>
                            <option value="1">Первая</option>
                            <option value="2">Вторая</option>
                            <option value="3">Третья</option>
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
