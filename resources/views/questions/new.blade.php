@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="offset-md-2 col-md-8 bg-white pt-3 pb-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ url('/questions/store' )}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-5">
                    <label class="h4">質問タイトル</label>
                    <input type="title" class="form-control" name="title" placeholder="" value="{{ old('title') }}">
                </div>
                <div class="form-group mb-5">
                    <label class="h4">質問内容</label>
                    <textarea class="form-control" name="content" rows="8">{{ old('content') }}</textarea>
                    <input type="file" name="photo" class="form-control" id="myfile">
                    <img id="img1">
                </div>
                <label class="h4">カテゴリを選択</label>
                <select class="custom-select custom-select-lg mb-5" name="category">
                        <option selected>選択してください</option>
                        @foreach($categories as $category)                  
                        <option value="{{ $category->id}}">{{ $category->category_name }}</option>
                        @endforeach
                </select>
                <button type="submit" class="btn btn-warning mx-auto d-block">内容を確認する</button>
            </form>
        </div>
     </div>
@endsection
