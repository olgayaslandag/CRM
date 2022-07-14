<?php 

function display_errors($validation, $field)
{

	if($validation->hasError($field)){
		return $validation->getErrors($field);
	} else {
		return false;
	}

}