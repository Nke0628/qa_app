@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <form method="post" action="{{ url('/questions/store' )}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-5">
      <label class="h4">欠勤者検索</label><br>
      <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
        <label class="btn btn-secondary active">
          <input type="radio" name="options" id="option1" autocomplete="off" checked> 社員
        </label>
        <label class="btn btn-secondary">
          <input type="radio" name="options" id="option2" autocomplete="off"> パートナー
        </label>
      </div>
      <input type="title" class="form-control mb-2" name="title" placeholder="" value="{{ old('title') }}">
      <button type="submit" class="btn btn-primary js-search-button mb-3">検索</button>

      <div class="search-result">
        <label for="" class="search-result__name">社員ID/氏名</label>
        <p class="js-kekkin-name"></p>
        <label for="" class="search-result__busyo">部署</label>
        <p class="js-kekkin-busyo"></p>
      </div>
      <div class="dialog">
        <div class="dialog__body">
          <div class="dialog__content js-dialog-namelist">
            <div class="dialog__item"></div>
          </div>
          <div class="dialog__footer">
            <button type="submit" class="btn btn-warning mx-auto d-block">内容を確認する</button>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group mb-5">
      <label class="h4">質問内容</label>
      <textarea class="form-control" name="content" rows="8">{{ old('content') }}</textarea>
    </div>
    <button type="submit" class="btn btn-warning mx-auto d-block">内容を確認する</button>
  </form>
</div>
@endsection