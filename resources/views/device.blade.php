<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Device</title>
	<style>
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<x-header />
	<h2>Add Device</h2>
	<form action="/createNewDevice" method="GET">
		Device Name : <input type="text" name="device_name">
		<br><br>
		Description : <input type="description" name="description">
		<br><br>
		<input type="submit" name="submit" value="Add">
	</form>
	<h2>Available devices</h2>
	<table>
		<tr>
			<th>Device id</th>
			<th>Name</th>
			<th>Description</th>
			<th>Last logged</th>
		</tr>
	@foreach($device_data as $data)
		<tr>    
			<th>{{$data->device_id}}</th>
			<th>{{$data->name}}</th>
			<th>{{$data->description}}</th>
			<th>{{$data->last_logged}}</th>
		</tr>
		<br>
	@endforeach
	</table> 
	
</body>
</html>