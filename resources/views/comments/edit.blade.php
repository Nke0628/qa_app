@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-md-8 bg-white px-md-5 py-4">
      <h3 class="mb-4">Q.{{ $comment->question->title }}</h3>
      <form method="post" action="/comments/{{ $comment->id }}">
        @method('patch')
        @csrf
          <textarea class="question-comment-textarea mb-2" name="comment" rows="10">{{ old('comment') ?? $comment->comment }}</textarea>
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <span class="comment-error">{{ $error }}</span>
            @endforeach
          @endif
          <div class="text-right mb-4">
            <input class="question-comment-btn" type="submit" value="コメントを編集する">
          </div>
      </form>
      <div class="text-right">
        <a href="{{ url('/questions/' .$comment->question_id) }}"><i class="fas fa-angle-double-left"></i>質問に戻る</a>
      </div>
    </div>
  </div>
  </div>
@endsection
