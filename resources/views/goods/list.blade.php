@extends('layouts.app')


@section('content')
	<a href="{{route('goodscreate')}}">
	<button style="margin: 5px;" class="btn btn-primary">Создать товар</button>
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
	      <th>Редактировать</th>
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
	     <td><a href="{{route('goodupdate',$good->id)}}" style="color: blue">Редактировать</a></td>
	     <td><a class="delete" href="{{route('goodDelete',$good->id)}}" style="color: red">Удалить</a></td>
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