@extends('layouts.app')


@section('content')

<form action="{{route('goodupdatePost')}}" enctype="multipart/form-data" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$good->id}}">
	<p>
		<span>Название</span><br>
		<input value="{{$good->name}}"  type="text" name="name">
	</p>
	<p>
		<span>Категория</span><br>
		<select name="category">
			@foreach($category as $value)
				@if($value->name == $good->category)
					<option value="{{$value->name}}" selected="">{{$value->name}}</option>
				@else 
					<option value="{{$value->name}}" >{{$value->name}}</option>
				@endif
			@endforeach
		</select>
	</p>
	<p>
		<span>Цена</span><br>
		<input value="{{$good->price}}" type="text" name="price">
	</p>
	<p>
		<span>Фото</span><br>
		<input type="file" name="img">
		<img src="{{$good->img}}">
	</p>
	
	<button style="margin: 10px;" type="submit" class="btn btn-primary">Обновить</button>
</form>
@endsection

<style type="text/css">
	form {
		margin: 10px;
	}
</style>