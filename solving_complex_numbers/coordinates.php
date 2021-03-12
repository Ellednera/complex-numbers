<?php
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		echo "<span class='coordinates'>Coordinates</span>";
		echo "<br/>";
	for($index=0; $index<count($comp_roots_list_cos); $index++){
		echo "(" . $comp_roots_list_cos[$index] . ",&nbsp;" . $comp_roots_list_sin[$index] . ")";
		echo "<br/>";
	}
?>