@extends('layouts.app')

@section('content')
<div class="main">
	<div class="container">
		<div class="row">
			<div class="offset-md-1 col-md-5 text-white main-text">
				<h6>歯の悩みに特化したQAサイト</h6>
				<h1 class="mb-5 main-title">HA NO NAYAMI</h1>
				<h2>悩む前にみんなに相談しよう</h2>
				<p>ここには説明がはいります</p>
				<p>ここには説明がはいります</p>
				<p>ここには説明がはいります</p>
			</div>
			<div class="offset-md-1 col-md-4 text-white main-text text-center">
				<a class="main-login-link" href="">メールアドレスで登録する</a>
				<p class="mt-4 mb-4">SNSアカウントで登録する</p>
				<a class="main-sns-link" href=""><img class="main-sns-link-logo" src="{{ asset('storage/background/fb.png')}}">FaceBook</a>
				<a class="main-sns-link" href=""><img class="main-sns-link-logo" src="{{ asset('storage/background/insta.png')}}">Instagram</a>
				<a class="main-sns-link" href=""><img class="main-sns-link-logo" src="{{ asset('storage/background/twitter.png')}}">twitter</a>
			</div>
		</div>
	</div>
</div>
@endsection