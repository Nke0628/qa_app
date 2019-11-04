@extends('layouts.app')

@section('content')
<div class="container bg-white">
	<div class="disp-error text-center pt-5">
         <h1><i class="far fa-question-circle mr-3"></i>{{ $status_code }}</h1>
		 <p>{{ $message }}</p>
		 <p class="mb-5">ご迷惑をおかけして申し訳ありません。</p>
		 <a href="{{ route('top') }}"z>TOPヘ戻る</a>
	</div>
</div>
@endsection