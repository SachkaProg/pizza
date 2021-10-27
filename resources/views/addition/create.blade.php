@extends('layouts.app')


@section('content')

<form action="{{route('addcreatePost')}}" enctype="multipart/form-data" method="POST">
	@csrf
	<p>
		<span>Название</span><br>
		<input  type="text" name="name">
	</p>
	<p>
		<span>Цена</span><br>
		<input  type="text" name="price">
	</p>
	<p>
		<span>Фото</span><br>
		<input type="file" name="img">
	</p>
	<p>
		<span>Количество</span><br>
		<input type="text" name="quantity">
	</p>
	
	<button style="margin: 10px;" type="submit" class="btn btn-primary">Сохранить</button>
</form>
@endsection

<style type="text/css">
	form {
		margin: 10px;
	}
</style>