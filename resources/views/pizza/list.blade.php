@extends('layouts.app')


@section('content')
	<a href="/admin-create-pizza">
	<button style="margin: 5px;" class="btn btn-primary">Создать пиццу</button>
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
	      <th>Редактировать</th>
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
	     <td><a href="{{route('pizzaUpdateComponents',$pizza->id)}}" style="color: blue">Редактировать</a></td>
	     <td><a href="{{route('pizzaUpdateComponents',$pizza->id)}}" style="color: blue">Компоненты</a></td>
	     <td><a class="delete" href="{{route('pizzaDelete',$pizza->id)}}" style="color: red">Удалить</a></td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	<script type="text/javascript">
		$(document).ready(function() {
			$('body .delete').on('click', function (event) {
				event.preventDefault();
				let isDelete = confirm("Вы уверены, что хотите удалить?");

				if (isDelete) {
					location.href = $(this).attr('href');
				}
			})
		})
	</script>
@endsection