<?php 

function display_errors($validation, $field)
{

	if($validation->hasError($field)){
		return $validation->getErrors($field);
	} else {
		return false;
	}

}


function removeHtml($par, string $type="ARRAY")
{
	foreach($par as $k=>$v)
	{
		if(!$v){
			if($type == "ARRAY"){
				unset($par[$k]);
			}else{
				unset($par->$k);
			}
			continue;
		}
		if($type == "ARRAY"){
			$par[$k] = $v;
		} elseif($type == "OBJECT"){
			$par->$k = $v;
		}
	}

	return $par;
}