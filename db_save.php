<?php
	include_once "db_config.php";
	// accept JSON parameter (and Un-quote string if needed)
	$p = stripslashes($_REQUEST['json']);
	// decode JSON object
	$arr = json_decode($p);
	// for demo purpose only return accepted JSON data
	
	mysql_query("delete from `form_structure`");
	for($i=0; $i < sizeof($arr); $i++)
	{
		$position = $arr[$i]->position[0];
		$label = $arr[$i]->form[0]->value;
		$type = $arr[$i]->id;
		
		$data = array();
		if($type == 'ra1')
		{
			$values = array();
			for($j = 1; $j < sizeof($arr[$i]->form); $j++)
			{
				if($arr[$i]->form[$j]->type == 'radio' && $arr[$i]->form[$j]->value == true)
					$selected = ($j-1)/2;
					
				if($arr[$i]->form[$j]->type == 'text')
					$values[($j-1)/2] = $arr[$i]->form[$j]->value;
				
			}
			$data['values'] = $values;
			$data['selected'] = $selected;
		}
		
		$data_string = json_encode($data);
		
		$query = "INSERT INTO `form_structure`(`comp_type`, `comp_label`, `comp_data`, `comp_order`) 
								VALUES ('{$type}','{$label}','{$data_string}', {$position})";
								
		if(!mysql_query($query))
		{
			print_r("Error");
		}
	}
	//print_r(sizeof($arr));
?>