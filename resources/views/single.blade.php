@extends('layouts.single')

@section('content')
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {!! $post->message !!}
                </div>
            </div>
            @if(auth()->check() && auth()->id() == $post->user_id)
                <div class="post-preview ms-2 me-2 mt-5">
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-success ">
                        Редактировать
                    </a>
                </div>
            @endif
            <hr>
            <div class="row gx-4 gx-lg-5 justify-content-center mt-5">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h4 class="comments-title">Этот пост имеет {{ $comments->count() }} комментария</h4>
                    <ol class="comment-list">
                        @foreach($comments as $comment)
                            <li id="comment-2" class="comment even thread-even depth-1"
                                style="border-bottom: #a3a9af solid 1px;">
                                <div id="div-comment-2" class="comment-body">
                                    <div class="comment-meta">
                                        <div class="comment-author d-inline">

                                            <b class="fn">

                                                    {{ $comment->user->name }}

                                            </b>
                                            <span class="says">написал:</span>
                                        </div>
                                        <div class="comment-metadata d-inline">
                                            <time>{{ $comment->created_at->format('F d, Y') }}</time>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>
                                            {{ $comment->message }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                    @if(auth()->check())
                        <hr>
                        <h5 id="reply-title" class="comment-reply-title">
                            Оставьте отзыв
                        </h5>
                        <form action="{{ route('comment') }}" method="post" id="commentform" class="comment-form"
                              novalidate="">
                            @csrf
                            <p class="comment-form-comment">
                                <label for="comment">Комментарий <span class="required">*</span></label>
                                <textarea id="comment" name="message" cols="45" rows="8" maxlength="65525"
                                          required="" style="width: 100%"></textarea>
                            </p>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="Отправить">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            </p>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </article>



@endsection
