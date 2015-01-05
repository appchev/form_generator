<?php 

// define "component" directory name
$component_dir = 'component';

// define connection between DIV id and file inside "field" directory
$field = Array();
$field['te1'] = 'text.html';
$field['in1'] = 'input_reference.html';
$field['ra1'] = 'radio_reference.html';

// function returns complete path for the requested DIV id
function component($id) {
	global $component_dir;
	global $field;
	// test if sent id exists
	if (!array_key_exists($id, $field)) {
		$path = "$component_dir/unknown.html";
	}
	else {
		// set path to the form component
		$path = $component_dir . '/' . $field[$id];
		// if field doesn't exist then unknown.html
		if (!file_exists($path)) {
			$path = "$component_dir/unknown.html";
		}
	}
	// return path
	return $path;
}

?>