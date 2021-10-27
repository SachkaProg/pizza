@extends('layouts.app')


@section('content')

<form action="{{route('goodscreatePost')}}" enctype="multipart/form-data" method="POST">
	@csrf
	<p>
		<span>Название</span><br>
		<input  type="text" name="name">
	</p>
	<p>
		<span>Категория</span><br>
		<select name="category">
			@foreach($category as $value)
				<option value="{{$value->name}}">{{$value->name}}</option>
			@endforeach
		</select>
	</p>
	<p>
		<span>Цена</span><br>
		<input  type="text" name="price">
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