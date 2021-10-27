@extends('layouts.app')


@section('content')

<form action="{{route('addupdatePost')}}" enctype="multipart/form-data" method="POST">
	<input name="id" value="{{$souce->id}}" type="hidden">
	@csrf
	<p>
		<span>Название</span><br>
		<input value="{{$souce->name}}" type="text" name="name">
	</p>
	<p>
		<span>Цена</span><br>
		<input value="{{$souce->price}}" type="text" name="price">
	</p>
	<p>
		<span>Количество</span><br>
		<input value="{{$souce->quantity}}" type="text" name="quantity">
	</p>
	<p>
		<span>Фото</span><br>
		<input type="file" name="img">
	</p>
	<img src="{{$souce->img}}" width="100px">
	
	<button style="margin: 10px;" type="submit" class="btn btn-primary">Обновить</button>
</form>
@endsection

<style type="text/css">
	form {
		margin: 10px;
	}
</style>