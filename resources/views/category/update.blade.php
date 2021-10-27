@extends('layouts.app')


@section('content')

<form action="{{route('categoryUpdatePost')}}" method="POST">
	<input type="hidden" name="id" value="{{$category->id}}">
	@csrf
	<p>
		<span>Название</span><br>
		<input value="{{$category->name}}" type="text" name="name">
	</p>
	
	<button style="margin: 10px;" type="submit" class="btn btn-primary">Обновить</button>
</form>
@endsection

<style type="text/css">
	form {
		margin: 10px;
	}
</style>