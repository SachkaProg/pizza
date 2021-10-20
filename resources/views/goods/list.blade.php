@extends('layouts.app')


@section('content')
	<a href="/admin-create-good">
	<button type="btn btn-primary">Создать товар</button>
	</a>
	<h2>Добавить категорию</h2>
	<form></form>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Название</th>
	      <th>Цена</th>
	      <th>Фото</th>
	      <th>Категория</th>
	      <th>Удалить</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($goods as $good)
	    <tr>
	      <td>{{$good->name}}</td>
	      <td>{{$good->price}} руб.</td>
	      <td><img width="150" src="{{$good->img}}"></td>
	      <td>{{$good->category}}</td>
	     <td><a href="{{route('goodDelete',$good->id)}}" style="color: red">Удалить</a></td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
@endsection