@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 bg-white px-md-5 py-md-4">
        <!--質問タイトル-->
        <h2 class="quesion-title">Q.{{$question->title}}</h2>
        <!--内容-->
        <p class="mb-4">{!! nl2br(e($question->content)) !!}</p>
        <!--カテゴリ-->
        <span class="question-category">{{$question->category->category_name}}</span>
        <!--ユーザ情報、投稿日時-->
        <p class="text-right mb-3">
          <img class="question-pic mr-2" src="{{ asset('storage/icon/'. $question->user->user_image)}}">
          <span class="mr-2">{{$question->user->name}}</span>
          最終更新日:{{date('Y-m-d',strtotime($question->updated_at))}}
        </p>
        <!--コメント数-->
        <h3>回答数{{ $question->comments->where('delete_flag','0')->count() }}件</h3>       
        <!--コメント-->
        @foreach($question->comments->where('delete_flag','0') as $comment)
        <div class="container">
          <div class="border-top row mt-3 pt-4">
            <div class="col-md-3">
              <img class="question-pic mr-3" src="{{ asset('storage/icon/'. $comment->user->user_image)}}">
              <p>{{ $comment->user->name}}さん</p>
              <!--自分のコメントの場合は編集ボタンを表示-->
              @if(Auth::id() === $comment->user->id)
              <div class="comment-edit">
                <i class="fas fa-pencil-alt js-comment-edit"></i>
                <div class="comment-edit-detail">
                    <a href="{{ url('/comments/edit/'.$comment->id ) }}">編集</a>
                    <p>
                      <form method="post" action="/comments/{{$comment->id}}" class="js-comment-delete-form">
                        @method('delete')
                        @csrf
                      <input type="submit" value="削除" class="comment-delete js-comment-delete">
                      </form>
                    </p>
                </div>
              </div>
              @endif
            </div>
            <div class="col-md-9">
              {!! nl2br(e($comment->comment)) !!}
              <p class="text-right pt-5">最終更新日:{{date('Y-m-d',strtotime($comment->updated_at))}}</p>
            </div>
          </div>
        </div>
        @endforeach 
        <!--コメント投稿-->
        <form method="post" action="{{ url('/comments/store') }}" class="mt-4">
          @csrf
          <textarea class="question-comment-textarea" name="comment" rows="10">{{ old('comment') }}</textarea>
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <span class="comment-error">{{ $error }}</span>
            @endforeach
          @endif
          <input type="hidden" name="question_id" value="{{ $question->id }}">
          <div class="text-right">
            <input class="question-comment-btn" type="submit" value="コメントを送る">
          </div>
        </form>
      </div>
      <div class="col-md-4">
      </div>
    </div>
  </div>
@endsection
