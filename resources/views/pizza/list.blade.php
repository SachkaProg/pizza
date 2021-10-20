@extends('layouts.app')


@section('content')
	<a href="/admin-create-pizza">
	<button type="btn btn-primary">Создать пиццу</button>
	</a>
	<h2>Добавить категорию</h2>
	<form></form>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Название</th>
	      <th>Цена</th>
	      <th>Фото</th>
	      <th>Компоненты</th>
	      <th>Удалить</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($pizzas as $pizza)
	    <tr>
	      <td>{{$pizza->name}}</td>
	      <td>{{$pizza->price}} руб.</td>
	      <td><img width="150" src="{{$pizza->img}}"></td>
	      <td>
	      <?php 
	      $compositions = json_decode($pizza->composition);
	      foreach ($compositions as $composition) {
	      	echo $composition->ingradient;
	      	echo "<br>";
	      }
	      ?>
	     	</td>
	     <td><a href="{{route('pizzaDelete',$pizza->id)}}" style="color: red">Удалить</a></td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
@endsection