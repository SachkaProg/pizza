@extends('layouts.app')


@section('content')

<form action="{{route('pizzaUpdateComponentsPost')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$id}}">
	<p>
		<span>Энерг. ценность</span><br>
		<input value="{{$components['comp1']}}" type="text" name="comp1">
	</p>
	<p>
		<span>Белки</span><br>
		<input value="{{$components['comp2']}}" type="text" name="comp2">
	</p>
	<p>
		<span>Жиры</span><br>
		<input value="{{$components['comp3']}}" type="text" name="comp3">
	</p>
	<p>
		<span>Углеводы</span><br>
		<input value="{{$components['comp4']}}" type="text" name="comp4">
	</p>
	<p>
		<span>Вес</span><br>
		<input value="{{$components['comp5']}}" type="text" name="comp5">
	</p>
	<p>
		<span>Диаметр</span><br>
		<input value="{{$components['comp6']}}" type="text" name="comp6">
	</p>
	<button style="margin: 10px;" type="submit" class="btn btn-primary">Сохранить</button>
</form>
@endsection

<style type="text/css">
	form {
		margin: 10px;
	}
</style>