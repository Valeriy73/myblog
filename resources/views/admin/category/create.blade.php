@extends('admin.partials.main')

@section('content')
    <div class="container px-4 px-lg-5">
        <div class="col-12 text-center mb-5">
            <h2>Добавление категории</h2>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="titlePost" class="form-label">Название категории</label>
                        <input type="text" name="title" class="form-control" id="titlePost">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </form>
                <!-- Divider-->
                <hr class="my-4"/>
            </div>
        </div>
    </div>
@endsection
