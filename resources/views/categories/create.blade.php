@extends('layouts.app')

@section('content')
    <div class="contents">
        <form method="post" action="/master/category">
            @csrf
            @if($errors->has('category-name'))
                <p class="text-error">
                    @foreach($errors->get('category-name') as $error)
                        {{ $error }}
                    @endforeach
                </p>
            @endif
            <input type="text" name="category-name" @if($errors->has('category-name'))class="bd-error"@endif>
            <button type="submit">登録</button>
        </form>
    </div>
@endsection
