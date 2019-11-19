@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 bg-white cancel">
      	<div class="offset-md-4 col-md-4 px-md-5">
        <h3 class="text-center pt-5 mb-5 border-bottom">退会画面</h3>
        <!-- 退会用フォーム -->
        <form class="js-unsubscribe-form" method="post" action="/unsubscribe">
          @csrf
          <div class="mb-5 mx-auto"> 
            <p>パスワードを入力してください</p>
            <input class="subscribe-form-text" type="password" name="password">
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <p class="comment-error">{{ $error }}</p>
              @endforeach
            @endif
      	  </div>
          <p class="text-center">
          	<input type="submit" class="btn btn-blue js-unsubscribe" value="退会する">
          </p>
        </form>
      </div>
    </div>
</div>
  </div>
@endsection

