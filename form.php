<?php 
	include_once "db_config.php";
	
	$query = "SELECT * FROM `form_structure` ORDER BY comp_order";
	
	echo "<table>
				<tr>
					<td style='width:10%'></td>
					<td style='width:30%'></td>
					<td style='width:30%'></td>
				</tr>";
	
	$index = 1;
	$rows = mysql_query($query);
	while($row = mysql_fetch_assoc($rows))
	{
		echo "<tr>";
		echo "<td>{$index}.</td>";
		echo "<td>{$row['comp_label']}</td>";
		if($row['comp_type'] == 'in1')
			echo "<td><input type='text' value='' name='comp_{$index}'></td>";
		else if($row['comp_type'] == 'te1')
			echo "<td><textarea name='comp_{$index}'></textarea></td>";
		else if($row['comp_type'] == 'ra1')
		{
			echo "<td><select name='comp_{$index}'>";
			
			$data = json_decode($row['comp_data']);
			
			$values = $data->values;
			$selected = $data->selected;
			
			for($j = 0; $j < sizeof($values); $j++)
			{
				if($j == $selected)
					echo "<option value='{$j}' selected>{$values[$j]}</option>";
				else
					echo "<option value='{$j}'>{$values[$j]}</option>";
			}
			echo "</select></td>";
		}
		echo "</tr>";
		$index++;
	}
	
	echo "</table>";
?>