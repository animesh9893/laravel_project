<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dashboard</title>

	<style>
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<x-header />
	<div>
		<h2>Daily Report</h2>
		<table>
			<tr>
				<th>Exercise Name</th>
				<th>Device Id</th>
				<th>Device Name</th>
				<th>Count</th>
				<th>Reps</th>
				<th>Weight</th>
				<th>Calories</th>
				<th>Note</th>
			</tr>
			@for($i=0;$i<count($daily);$i++)
				<tr>
					<td>{{$daily[$i]["name"]}}</td>
					<td>{{$daily[$i]["device_id"]}}</td>
					<td>{{$daily[$i]["device_name"]}}</td>
					<td>{{$daily[$i]["count"]}}</td>
					<td>{{$daily[$i]["reps"]}}</td>
					<td>{{$daily[$i]["weight"]}}</td>
					<td>{{$daily[$i]["calorie"]}}</td>
					<td>{{$daily[$i]["note"]}}</td>
				</tr>
			@endfor
		</table>	

	</div>
	<div>
		<h2>Weekly Report</h2>
		<table>
			<tr>
				<th>Exercise Name</th>
				<th>Device Id</th>
				<th>Device Name</th>
				<th>Count</th>
				<th>Reps</th>
				<th>Weight</th>
				<th>Calories</th>
				<th>Note</th>
			</tr>
			@for($i=0;$i<count($week);$i++)
				<tr>
					<td>{{$week[$i]["name"]}}</td>
					<td>{{$week[$i]["device_id"]}}</td>
					<td>{{$week[$i]["device_name"]}}</td>
					<td>{{$week[$i]["count"]}}</td>
					<td>{{$week[$i]["reps"]}}</td>
					<td>{{$week[$i]["weight"]}}</td>
					<td>{{$week[$i]["calorie"]}}</td>
					<td>{{$week[$i]["note"]}}</td>
				</tr>
			@endfor
		</table>	

	</div>
</body>
</html>