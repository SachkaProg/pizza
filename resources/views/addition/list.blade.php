@extends('layouts.app')


@section('content')
	<a href="{{route('addcreate')}}">
	<button style="margin: 5px;" class="btn btn-primary">Создать добавку</button>
	</a>
	<h2>Добавки</h2>
	<form></form>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th>Название</th>
	      <th>Редактировать</th>
	      <th>Удалить</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($souce as $cat)
	    <tr>
	      <td>{{$cat->name}}</td>
	      <td><img width="100px" src='{{$cat->img}}'></td>
	     <td><a href="{{route('addUpdate',$cat->id)}}" style="color: blue">Редактировать</a></td>
	     <td><a  class="delete" href="{{route('addDelete',$cat->id)}}" style="color: red">Удалить</a></td>
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