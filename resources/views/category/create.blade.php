@extends('layouts.app')


@section('content')

<form action="{{route('categoryCreatePost')}}" method="POST">
	@csrf
	<p>
		<span>Название</span><br>
		<input type="text" name="name">
	</p>
	
	<button style="margin: 10px;" type="submit" class="btn btn-primary">Сохранить</button>
</form>
@endsection

<style type="text/css">
	form {
		margin: 10px;
	}
</style>