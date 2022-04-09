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
	<h2>Add exercise</h2>
	<form method="GET" action="/newExercise">
		Exercise Name : <select id="device" name="name">
			@foreach($exe_list as $e)
				<option value="{{$e->name}}">{{$e->name}}</option>				
			@endforeach
		</select>

		<br><br>
		Select Device : <select id="device" name="device">
			@foreach($device as $d => $val)
				<option value="{{$d}}">{{$val}}</option>				
			@endforeach
		</select>
		<br><br>
		Count : <input type="text" name="count"><br><br>
		Reps : <input type="text" name="reps"><br><br>
		Weight : <input type="text" name="weight"><br><br>
		Calories : <input type="text" name="calories"><br><br>
		Note : <input type="text" name="note"><br><br>
		<input type="submit" name="submit">
	</form>
	<hr><br>
	<h2>add new exercise</h2>
	<form method="GET" action="/addExerciseList">
		Exercise Name : <input type="text" name="name"><br><br>
		Description : <input type="text" name="description"><br><br>
		<input type="submit" name="submit">
	</form>
	<hr><br>
	<table>
		<tr>
			<th>Name</th>
			<th>Description</th>
		</tr>
		@foreach($exe_list as $e)
		<tr>
			<td>{{$e->name}}</td>
			<td>{{$e->description}}</td>
		</tr>
		@endforeach
	</table>
	<hr><br>
	<table>
		<tr>
			<th>TimeStemp</th>
			<th>Exercise Name</th>
			<th>Device Id</th>
			<th>Device Name</th>
			<th>Count</th>
			<th>Reps</th>
			<th>Weight</th>
			<th>Calories</th>
			<th>Note</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
		@for($i=0;$i<count($data);$i++)
		<tr>
			<td>{{$data[$i]["timestamp"]}}</td>
			<td>{{$data[$i]["name"]}}</td>
			<td>{{$data[$i]["device_id"]}}</td>
			<td>{{$data[$i]["device_name"]}}</td>
			<td>{{$data[$i]["count"]}}</td>
			<td>{{$data[$i]["reps"]}}</td>
			<td>{{$data[$i]["weight"]}}</td>
			<td>{{$data[$i]["calorie"]}}</td>
			<td>{{$data[$i]["note"]}}</td>
			<td>
				<form action="/deleteExercise" method="GET">
					<button type="submit" name="delete" value="{{$data[$i]['id']}}">Delete</button>
				</form>
			</td>
			<td>
				<form action="/editExercise" method="GET">
					<button type="submit" name="edit" value="{{$data[$i]['id']}}">edit</button>
				</form>
			</td>
		</tr>
	@endfor
	</table>	


</body>
</html>