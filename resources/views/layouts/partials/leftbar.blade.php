<div class="col-xl-3">
    <h3><a href="{{ route('categories') }}">Категории</a></h3>
    <ul class="ms-auto py-4 py-lg-0 list-group" style="height: 200px; overflow-y: scroll;">
        @foreach($categories as $category)
            <li class="list-group-item"><a href="{{ route('category', $category->id) }}">{{ $category->title }}</a>
            </li>
        @endforeach
    </ul>
    <h3>Теги</h3>
    <ul class="ms-auto py-4 py-lg-0 list-group" style="height: 200px; overflow-y: scroll;">
        @foreach($tags as $tag)
            <li class="list-group-item"><a href="#">{{ $tag->name }}</a>
            </li>
        @endforeach
    </ul>
</div>



