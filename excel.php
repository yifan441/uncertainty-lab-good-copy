<?php

$db = new SQLite3('participants.db');
$output = '';

$statement = 'SELECT * FROM participants';
$results = $db->query($statement);


$list = array(
array('"First Name"', '"Last Name"', '"Email"', '"Sign-Up Date"', '"Version"', '"FollowUp"'),
);
while($row = $results->fetchArray()){
	array_push($list, array('\''.$row["firstname"].'\'', '\''.$row["lastname"].'\'', '\''.$row["email"].'\'', '\''.$row["cdate"].'\'', '\''.$row["version"].'\'', '\''.$row["followup"].'\'')); 
}

$fp = fopen('file.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);

/*$output .= '
	<table class="table" bordered="1">
		<tr>
			<th>name</th>
			<th>hi</th>
			<th>hi</tH>
			<th>name</th>
			<th>hi</th>
			<th>hi</tH>
		</tr>
';

while($row = $results->fetchArray())
{
	$output.= '
		<tr> 
			<td>'.$row["firstname"].'<td>
			<td>'.$row["lastname"].'<td>
			<td>'.$row["email"].'<td>
			<td>'.$row["cdate"].'<td>
			<td>'.$row["version"].'<td>
			<td>'.$row["followup"].'<td>
		</tr>	
	';
}
output .= '</table>';
header("Content-Type: application/xlsx"); 
header("Content-Disposition: attachment; filename=database.xlsx");
echo $output; */
?>