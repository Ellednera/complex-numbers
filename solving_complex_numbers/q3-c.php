<!DOCTYPE html>

<html lang="en">

 <head>
  <title>Maths(T) Assignment</title>
  <link href="css/1a.css" type="text/css" rel="stylesheet">
  <meta charset="UTF-8">
 <head>
 
 <body>
  <h2>Question 3(c)</h2>
   <span style="color: red;font-style: italic;">
   *For |z|, either use the square root form or whole number only!<br/>
   *The ratio of a to b must be 1 in order to use this part of the program, sorry for the inconvenience caused.<br/>
   *You'll need to draw the curly brackets by yourself<br/>
   *Some values of n might not give perfect final answers<br/>
   </span>

  <form method="post">
   n = <input class="q3-n" type="number" name="n" <?php if(!isset($_POST["n"])){echo "value='4'";}else{echo "value='" . $_POST["n"] . "'";} ?> required>,
   |z| = 
   <input class="q3-z" type="text" name="mod_z_whole" <?php if(isset($_POST["mod_z_whole"])){echo "value='" . $_POST["mod_z_whole"] . "'";} ?>> 
   or
   |z| = 
   &#8730;(<input class="q3-sqrt-z" type="text" name="mod_z_sqrt" <?php if(isset($_POST["mod_z_sqrt"])){echo "value='" . $_POST["mod_z_sqrt"] . "'";} ?>>)
   <br/>
   arg(z<sup>n</sup>) = 1/4&pi;
   <br/>
   <br/>
   <input class="q3-ans" type="submit" value="Show answers">
  </form>
   <br>

   <?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){
	   // $mag = 1;
	   
	   $arg_rad = 1/4;
	   // $nu_arg = 0;
	   // $de_arg = 1;
	   $n = $_POST["n"]; // n > 3
	   
	   if(isset($_POST["mod_z_whole"]) && $_POST["mod_z_whole"] != 0){
		   $r = $_POST["mod_z_whole"];
		   // var_dump($r);
	   }elseif(isset($_POST["mod_z_sqrt"]) && $_POST["mod_z_sqrt"] != 0){
		   $r_calculation = sqrt($_POST["mod_z_sqrt"]);
		   $r_display = "&#8730;<span class='sqrt'>" . $_POST["mod_z_sqrt"] . "</span>";
		   // var_dump($r_calculation);
		   // var_dump($r_display);
	   }else{
		   exit("Ooi!<br/>No |z| = no answers");
	   }
	   
	   
	   // Step 1 - State the value of n
	   echo "Let n = " . $n;
		echo "<br/>";
		
	   // Step 2 - Print z^n
	   if(isset($r)){
			echo "z<sup>" . $n . "</sup> = " . $r . "[cos 1/4&pi; + <span class='i'>i</span> sin 1/4&pi;]";
	   }elseif(isset($r_calculation) && isset($r_display)){
		   echo "z<sup>" . $n . "</sup> = " . $r_display . "[cos 1/4&pi; + <span class='i'>i</span> sin 1/4&pi;]";
	   }

		echo "<br/>";
	   
	   // Step 3 - Express z
	   // if(is_int($mag) && $mag == 1){
	   if(isset($r)){
		   echo "z = [" . $r . "</sup>(cos (1/4&pi; + 2k&pi;) + <span class='i'>i</span> sin(1/4&pi; + 2k&pi;))]<sup>1/" . $n . "</sup>, k = 0";
	   }elseif(isset($r_calculation) && isset($r_display)){
		   echo "z = [" . $r_display . "</sup>(cos (1/4&pi; + 2k&pi;) + <span class='i'>i</span> sin(1/4&pi; + 2k&pi;))]<sup>1/" . $n . "</sup>, k = 0";
	   }
		   
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
		   if(isset($r)){
			   // leave 8 spaces
			   if($rows == $row_black){
				   echo "<span class='z-black'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo $r . "<sup>1/" . $n . "</sup>[cos 1/" . $n . " (1/4&pi; + 2(" . $rows . ")&pi;)";
					echo "&nbsp;+&nbsp;";
					echo "<span class='i'>i</span>&nbsp;sin 1/" . $n . " (1/4&pi; + 2(" . $rows . ")&pi;)]";
					echo ", k = " . $rows;
				   echo "<br/>";
			   }else{
				   echo "<span class='z-white'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo $r . "<sup>1/" . $n . "</sup>[cos 1/" . $n . " (1/4&pi; + 2(" . $rows . ")&pi;)";
					echo "&nbsp;+&nbsp;";
					echo "<span class='i'>i</span>&nbsp;sin 1/" . $n . " (1/4&pi; + 2(" . $rows . ")&pi;)]";
					echo ", k = " . $rows;
				   echo "<br/>";
			   }
		   }elseif(isset($r_calculation) && isset($r_display)){
			   // leave 8 spaces
			   if($rows == $row_black){
				   echo "<span class='z-black'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "(" . $r_display . ")<sup>1/" . $n . "</sup>[cos 1/" . $n . " (1/4&pi; + 2(" . $rows . ")&pi;)";
					echo "&nbsp;+&nbsp;";
					echo "<span class='i'>i</span>&nbsp;sin 1/" . $n . " (1/4&pi; + 2(" . $rows . ")&pi;)]";
					echo ", k = " . $rows;
				   echo "<br/>";
			   }else{
				   echo "<span class='z-white'>z =</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "(" . $r_display . ")<sup>1/" . $n . "</sup>[cos 1/" . $n . " (1/4&pi; + 2(" . $rows . ")&pi;)";
					echo "&nbsp;+&nbsp;";
					echo "<span class='i'>i</span>&nbsp;sin 1/" . $n . " (1/4&pi; + 2(" . $rows . ")&pi;)]";
					echo ", k = " . $rows;
				   echo "<br/>";
			   }
		   }

		}
	   
	   // Step 5 - Calculate and round off final answers
		echo "<br/>";
		for($rows=0; $rows<$n; $rows++){
			
		   // round( $r**(1/$n) * (cos( (1/$n)*( ((1/4)+2*$rows)*pi()) )) ,3);
		   if(isset($r)){
			   $comp_roots_list_cos[] = $comp_conj_cos[] = $cos = round( $r**(1/$n) * (cos( (1/$n)*( ((1/4)+2*$rows)*pi()) )) ,3);
			   $comp_roots_list_sin[] = $comp_conj_sin[] = $sin = round( $r**(1/$n) * (sin( (1/$n)*( ((1/4)+2*$rows)*pi()) )) ,3);
		   }elseif(isset($r_calculation) && isset($r_display)){
			   $comp_roots_list_cos[] = $comp_conj_cos[] = $cos = round( $r_calculation**(1/$n) * (cos( (1/$n)*( ((1/4)+2*$rows)*pi()) )) ,3);
			   $comp_roots_list_sin[] = $comp_conj_sin[] = $sin = round( $r_calculation**(1/$n) * (sin( (1/$n)*( ((1/4)+2*$rows)*pi()) )) ,3);
		   }
		   
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
		   
// Step 6 - Simplify final answers - This step is omitted
// The answers are always > 0

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
		echo "There are no conjugate pairs.";
		
		require("coordinates.php");
		
   }
   ?>
  
 </body>
 
</html>