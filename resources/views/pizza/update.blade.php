@extends('layouts.app')


@section('content')

<form action="{{route('soucescreatePost')}}" enctype="multipart/form-data" method="POST">
	@csrf
	<p>
		<span>Название</span><br>
		<input  type="text" name="name" value="{{$pizza->name}}" >
	</p>
	<p>
		<span>Цена</span><br>
		<input  type="text" name="price" value="{{$pizza->price}}">
	</p>
	<p>
		<span>Фото</span><br>
		<input type="file" name="img">
	</p>
	
	
	<button style="margin: 10px;" type="submit" class="btn btn-primary">Сохранить</button>
</form>
@endsection

<style type="text/css">
	form {
		margin: 10px;
	}
</style>