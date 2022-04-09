<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exercise</title>
	<style>
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<x-header />
	<h2>Edit exercise</h2>
	<form action="/editExerciseUpdate" method="GET">
		Exercise Name : <select id="device" name="name">
			@foreach($exe_list as $e)
				@if($e->name!=$data->name)
				<option value="{{$e->name}}">{{$e->name}}</option>				
				@else
				<option value="{{$e->name}}" selected>{{$e->name}}</option>				
				@endif
			@endforeach
		</select>
		<br><br>
		Select Device : <select id="device" name="device">
			@foreach($device as $d => $val)
				@if($d!=$data->device_id)
				<option value="{{$d}}">{{$val}}</option>				
				@else
				<option value="{{$d}}" selected>{{$val}}</option>				
				@endif
			@endforeach
		</select>
		<br><br>
		Count : <input type="text" name="count" value="{{$data->count}}"><br><br>
		Reps : <input type="text" name="reps" value="{{$data->reps}}"><br><br>
		Weight : <input type="text" name="weight" value="{{$data->weight}}"><br><br>
		Calories : <input type="text" name="calories" value="{{$data->calorie}}"><br><br>
		Note : <input type="text" name="note" value="{{$data->note}}"><br><br>
		<input type="text" name="id" value="{{$data->id}}" hidden>
		<input type="submit" name="submit" value="update">
	</form>
</body>
</html>