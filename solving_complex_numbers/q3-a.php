<!DOCTYPE html>

<html lang="en">

 <head>
  <title>Maths(T) Assignment</title>
  <link href="css/1a.css" type="text/css" rel="stylesheet">
  <meta charset="UTF-8">
 <head>
 
 <body>
  <h2>Question 3(a)</h2>
   <span style="color: red;font-style: italic;">
   *Please note that the value of a is always 1 <br/>
   *You'll need to draw the curly brackets by yourself<br/>
   *Some values of n will not give perfect final answers<br/>
   </span>

  <form method="post">
   n = <input class="q3-n" type="number" name="n" <?php if(!isset($_POST["n"])){echo "value='4'";}else{echo "value='" . $_POST["n"] . "'";} ?>" required>
   <input class="q3-ans" type="submit" value="Show answers">
  </form>
   <br>

   <?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){
	   // $mag = 1;
	   $arg_rad = 0;
	   // $nu_arg = 0;
	   // $de_arg = 1;
	   $n = $_POST["n"]; // n > 3
	   // $k = 0;
	   
	   
// Step 1 - State the value of n
	   echo "Let n = " . $n;
		echo "<br/>";
		
// Step 2 - Print z^n
	   echo "z<sup>" . $n . "</sup> = cos " . $arg_rad . " + <span class='i'>i</span> sin " . $arg_rad;
		echo "<br/>";
	   
// Step 3 - Express z
	   // if(is_int($mag) && $mag == 1){
		   echo "z = [cos (" . $arg_rad . " + 2k&pi;) + <span class='i'>i</span> sin(" . $arg_rad . " + 2k&pi;)]<sup>1/" . $n . "</sup>, k = 0";
	   // }
	   for($ini_k=1;$ini_k<$n;$ini_k++){
		   echo ", " . $ini_k;
	   }
	   echo "<br/>";
	   
// Step 4 - use de Moiver's Theorem and sub. k
	   echo "<br/>";
		 // calculate which row z has to be "printed"
		 if($n%2 == 0){
			$row_black = $n / 2 - 1;
		 }else{
			 $row_black = ($n - 1) / 2;
		 }
		 // var_dump($row_black);
		 // exit;
		 
	   for($rows=0; $rows<$n; $rows++){
		   // echo $rows;
		   
		   // leave 8 spaces
		   if($rows == $row_black){
			   echo "<span class='z-black'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "cos 1/" . $n . " (" . $arg_rad . " + 2(" . $rows . ")&pi;)";
				echo "&nbsp;+&nbsp;";
				echo "<span class='i'>i</span> sin 1/" . $n . " (" . $arg_rad . " + 2(" . $rows . ")&pi;) ";
				echo ", k = " . $rows;
			   echo "<br/>";
		   }else{
			   echo "<span class='z-white'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "cos 1/" . $n . " (" . $arg_rad . " + 2(" . $rows . ")&pi;)";
				echo "&nbsp;+&nbsp;";
				echo "<span class='i'>i</span> sin 1/" . $n . " (" . $arg_rad . " + 2(" . $rows . ")&pi;) ";
				echo ", k = " . $rows;
			   echo "<br/>";
		   }
		}
	   
// Step 5 - Calculate and round off final answers
		echo "<br/>";
		for($rows=0; $rows<$n; $rows++){
		   
		   $comp_roots_list_cos[] = $comp_conj_cos[] = $cos = round( cos( 1/$n * 2*$rows*pi() ), 3);
		   $comp_roots_list_sin[] = $comp_conj_sin[] = $sin = round( sin( 1/$n * 2*$rows*pi() ), 3);
		   
		   if($sin < 0){
			   $sin_pol = "&nbsp;-&nbsp;" . abs($sin);
		   }else{
			   $sin_pol = "&nbsp;+&nbsp;" . $sin;
		   }
		   
		   // leave 8 spaces
		   if($rows == $row_black){
			   echo "<span class='z-black'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo $cos;
				echo $sin_pol . "&nbsp;<span class='i'>i</span>";
				echo ", k = " . $rows;
			   echo "<br/>";
		   }else{
			   echo "<span class='z-white'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo $cos;
				echo $sin_pol . "&nbsp;<span class='i'>i</span>";
				echo ", k = " . $rows;
			   echo "<br/>";
		   }
		}
		   // echo "<pre>";
		   // var_dump($comp_roots_list_cos);
		   // echo "</pre>";
		   // exit;
		   
// Step 6 - Simplify final answers
		echo "<br/>";
			   // if($sin < 0){
				   // $sin_pol = "&nbsp;-&nbsp;" . abs($sin);
			   // }else{
				   // $sin_pol = "&nbsp;+&nbsp;" . $sin;
			   // }

			
			// echo "<pre>";
			// var_dump($comp_roots_list_cos);
			// var_dump($comp_roots_list_sin);
			// echo "</pre>";
			// exit;
		for($index=0; $index<count($comp_roots_list_sin); $index++){
			// echo "index = " . $index . "<br/>";
			// echo $comp_roots_list_cos[$index] . "&nbsp;";
			// echo $comp_roots_list_sin[$index];
			// echo "<br/>";

			
			// if($comp_roots_list_cos[$index] == 0){
				// echo "sin only<br/>";
			// }elseif($comp_roots_list_sin[$index] == 0){
				// echo "cos only<br/>";
			// }else{
				// echo "cos and sin<br/>";
			// }
				
			
			if($comp_roots_list_cos[$index] != 0 && $comp_roots_list_sin[$index] != 0){
					if($comp_roots_list_sin[$index] < 0){
					   $comp_roots_list_sin[$index] = "&nbsp;-&nbsp;" . abs($comp_roots_list_sin[$index]);
				   }else{
					   $comp_roots_list_sin[$index] = "&nbsp;+&nbsp;" . $comp_roots_list_sin[$index];
				   }
				 if($index == $row_black){
				   echo "<span class='z-black'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo $comp_roots_list_cos[$index];
					echo $comp_roots_list_sin[$index] . "&nbsp;<span class='i'>i</span>";
					echo ", k = " . $index;
				   echo "<br/>";
				}else{
				   echo "<span class='z-white'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo $comp_roots_list_cos[$index];
					echo $comp_roots_list_sin[$index] . "&nbsp;<span class='i'>i</span>";
					echo ", k = " . $index;
				   echo "<br/>";
				 }
			}elseif($comp_roots_list_cos[$index] != 0 && $comp_roots_list_sin[$index] == 0){
					if($comp_roots_list_sin[$index] < 0){
					   $comp_roots_list_sin[$index] = "&nbsp;-&nbsp;" . abs($comp_roots_list_sin[$index]);
				   }else{
					   $comp_roots_list_sin[$index] = "&nbsp;+&nbsp;" . $comp_roots_list_sin[$index];
				   }
				 if($index == $row_black){
				   echo "<span class='z-black'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo $comp_roots_list_cos[$index];
					echo ", k = " . $index;
				   echo "<br/>";
				 }else{
				   echo "<span class='z-white'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo $comp_roots_list_cos[$index];
					echo ", k = " . $index;
				   echo "<br/>";
				 }
			}elseif($comp_roots_list_cos[$index] == 0 && $comp_roots_list_sin[$index] != 0){
					if($comp_roots_list_sin[$index] < 0){
					   $comp_roots_list_sin[$index] = "&nbsp;-&nbsp;" . abs($comp_roots_list_sin[$index]);
				   }else{
					   $comp_roots_list_sin[$index] = "&nbsp;+&nbsp;" . $comp_roots_list_sin[$index];
				   }
				 if($index == $row_black){
				   echo "<span class='z-black'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo $comp_roots_list_sin[$index] . "&nbsp;<span class='i'>i</span>";
					echo ", k = " . $index;
				   echo "<br/>";
				}else{
				   echo "<span class='z-white'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo $comp_roots_list_sin[$index] . "&nbsp;<span class='i'>i</span>";
					echo ", k = " . $index;
				   echo "<br/>";
				 }
			}
			
		}
		// echo $comp_roots_list_sin[0];
		// echo "<pre>";
		// var_dump($comp_roots_list_sin);
		// echo "</pre>";
		// exit;
		
// Step 7 - State the roots
		echo "<br>";
		echo "The complex numbers which satisfy the equation z<sup>" . $n . "</sup>=1+<span class='i'>i</span> are&nbsp;";
		
		for($index=0; $index<count($comp_conj_cos); $index++){
			/*if($comp_conj_sin[$index] == null){
				continue;
			}else{*/
				if($index == count($comp_conj_sin)-1){
					echo "&nbsp;and&nbsp;";
				}
				echo $comp_conj_cos[$index];
				if($comp_conj_sin[$index] < 0){ // root is negative
					echo "-";
					echo abs($comp_conj_sin[$index]);
					echo "&nbsp;<span class='i'>i</span>";
				}elseif($comp_conj_sin[$index] > 0){ // root is positive
					echo "+";
					echo $comp_conj_sin[$index];
					echo "&nbsp;<span class='i'>i</span>";
				}
				
				if($index != count($comp_conj_sin)-1){
					echo ",&nbsp;";
				}else{
					echo ".";
				}
				
			//}
		}
		
// State the Argand diagram numbering
		echo "<br>";
		echo "The points are plotted on an Argand diagram in Diagram (n).";
		
// Step 8 - State the conjugate pairs
		// echo "<br/>";
		echo "<br/>";
		echo "The conjugate pairs are&nbsp;";
		
		// echo "<pre>";
		// var_dump($comp_conj_sin);
		// echo "</pre>";
		// exit;
		
		for($a_ori=0; $a_ori<count($comp_conj_cos); $a_ori++){
			
			/*
			if($comp_conj_sin[$index] == null){
				continue;
			}else{
				if($index == count($comp_conj_sin)-1){
					echo "&nbsp;and&nbsp;";
				}
				echo $comp_conj_cos[$index];
				if($comp_conj_sin[$index] < 0){ // final answer is positive(negative to positive)
					echo "&nbsp;+&nbsp;" . $comp_conj_sin[$index]*(-1) . "&nbsp;<span class='i'>i</span>";
				}elseif($comp_conj_sin[$index] > 0){ // final answer is negative(positive to negative)
					echo "-" . $comp_conj_sin[$index] . "&nbsp;<span class='i'>i</span>";
				}
				
				if($index != count($comp_conj_sin)-1){
					echo ",&nbsp;";
				}else{
					echo ".";
				}
				
			}
			*/
			
			// Get the values of the conjugate pairs
			for($a_check=0; $a_check<count($comp_conj_cos); $a_check++){
				if($a_ori == $a_check){
					continue;
				}else{
					if($comp_conj_cos[$a_ori] == $comp_conj_cos[$a_check]){
						if($comp_conj_cos[$a_check] == 0){
							$conj_pairs[$a_check]["re"] = null;
							$conj_pairs[$a_check]["im"] = $comp_conj_sin[$a_check];
						}else{
						$conj_pairs[$a_check]["re"] = $comp_conj_cos[$a_check];
						$conj_pairs[$a_check]["im"] = $comp_conj_sin[$a_check];
						}
					}
				}
			}
			
		}
		// As a result, the key of the values are not consecutive and does not start from 0
		asort($conj_pairs); 
		// echo "<pre>";
		// var_dump($conj_pairs);
		// echo "</pre>";
		
		foreach($conj_pairs as $conjugate_pos => $parts){
			$count = 0;
			foreach($parts as $part => $values){
				// echo $conjugate_pos;
				// echo " ^ ";
				// echo $part;
				// echo " ^ ";
				// echo $values;
				// echo "<br/>";
				if($count%2==0){
					echo ",&nbsp;";
				}
				if($values > 0){
					echo "+" . $values;
				}else{
					echo $values;
				}
				$count++;
			}
			echo "&nbsp;<span class='i'>i</span>";

		}
		echo ".";
		echo "<br/>";
		// echo "<br/>";
		
// Step 9 - State the number of conjugate pairs
		if(count($conj_pairs)/2 != 0){
			echo "There are&nbsp;" . count($conj_pairs)/2 . "&nbsp;conjugate pairs.";
		}else{
			echo "There are no conjugate pairs.";
		}
		// echo "There are&nbsp;" . count($conj_pairs)/2 . "&nbsp;conjugate pairs.";
		
		require("coordinates.php");
		
		
   }
   ?>
  
 </body>
 
</html>