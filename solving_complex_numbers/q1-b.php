<!DOCTYPE html>

<html lang="en">

 <head>
  <title>Maths(T) Assignment</title>
  <link href="css/1a.css" type="text/css" rel="stylesheet">
  <meta charset="UTF-8">
 <head>
 
 <body>
  <h2>Question 1(b)</h2>
  
  <form method="post">
   <p>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	 $a_new = 1;
	 $b_new = 1;
	 $a = 1;
	 $b = 1;
	 $complex_num = "1 + " . "<span class='i'>i</span>";
	 $ori_complex_num = "1 + " . "<span class='i'>i</span>";
	 
	 // var_dump($complex_num);
	 // var_dump($ori_complex_num);
	 // var_dump($aabb);
	 // echo $ori_complex_num;
	 // exit;
	
	 $nth_power = $_POST["nth_power"];
		
		if($nth_power < 2){
		 $nth_power_lss2 = "<span id='error'>Execution failed. Reason: n is smaller than 2</span>";
		}else{
	?>
		 <a href="q1-b.php">Go back</a>
		 <br/><br/>
		 <span style="text-decoration: underline;">Answers</span>
		 <br/><br/>
	<?php

			$a_new = $a_new * $a;
			$b_new = $b_new * $b;
			$aabb = $a_new*$b + $b_new*$a;
			$r_display = "&#8730;(2)";
			$r = sqrt(2);

			
			// var_dump($current_n);
			// exit;
				
			$real_part = $a_new - $b_new;
			$imaginary_part = ($a_new * $b) + ($b_new * $a);
			
	for($n=2; $n<=$nth_power; $n++){
		
		echo "z<sup>" . $n . "</sup> = [" . $r_display . "(cos &pi;/4  + <span class='i'>i </span>sin &pi;/4)]<sup>" . $n . "</sup>";
		echo "<br/>";
		echo "<span class='z-white'>z<sup>" . $n . "</sup></span> = (" . $r_display . ")<sup>" . $n . "</sup>(cos " . $n . "(&pi;/4) + <span class='i'>i</span> sin " . $n . "(&pi;/4))";
		echo "<br>";
		
		
		if($n%4 == 0){
			echo "<span class='z-white'>z<sup>" . $n . "</sup></span> = (" . round($r**$n, 3) . ")(cos " . $n/4 . "&pi; + <span class='i'>i</span> sin " . $n/4 . "&pi;)";
			echo "<br/>";
		}else{
			echo "<span class='z-white'>z<sup>" . $n . "</sup></span> = (" . round($r**$n, 3) . ")(cos " . $n . "&pi;/4 + <span class='i'>i</span> sin " . $n . "&pi;/4)";
			echo "<br/>";
		}

		if($real_part == 0){
			$complex_num = $imaginary_part . "<span class='i'>i</span>";
			echo "<span class='z-white'>z<sup>" . $n . "</sup></span> = " . $complex_num;
		}elseif($imaginary_part == 0){
			$complex_num = $real_part;
			echo "<span class='z-white'>z<sup>" . $n . "</sup></span> = " . $complex_num;
		}else{
			if($imaginary_part < 0){
				$complex_num = $real_part . " " . $imaginary_part . "<span class='i'>i</span>";
				echo "<span class='z-white'>z<sup>" . $n . "</sup></span> = " . $complex_num;
			}else{
				$complex_num = $real_part . " + " . $imaginary_part . "<span class='i'>i</span>";
				echo "<span class='z-white'>z<sup>" . $n . "</sup></span> = " . $complex_num;
			}
			
		}

		// Assign $real_part and $imaginary_part to $a_new and $b_new respectively for next calculation
		$a_new = $real_part;
		$b_new = $imaginary_part;
		
		$real_part = $a_new - $b_new;
		$imaginary_part = ($a_new * $b) + ($b_new * $a);

		echo "<br/>";
		echo "<br/>";
		// echo "<hr/>";

	}
			
			

		 
	?>
			<br/>
			<a href="q1-b.php">Go back</a>
	<?php
			exit;
		}
			
	}
	?>
   <span style="color: red;font-style: italic;">
   * You might need to manually "round" off the value of (&#8730;(2))<sup>n</sup> when doing copy and paste job
   </span>
   <br/>
    Let z = 1 + <span class="i">i</span>. Find z<sup>n</sup>, in polar form, where n = 2, 3, 4, ..., 
    and represent the complex number on an Argand diagram.
    <br/><br/>
    z = a + b<span class="i">i</span>
    <br/>
    a = 1<br/>
    b = 1<br/><br/>
    Find z<sup>n</sup>, where n = <input type="number" name="nth_power" value="<?php if(isset($nth_power)){echo $nth_power;} ?>" required> and  n &gt; 1

	<?php
	 if(isset($nth_power_lss2)){
		 echo "<br/>";
		 echo $nth_power_lss2;
	 }
	?>
	<br/>
	<br/>
	<input type="submit" value="Show answers">
	<br/><br/>
	<span class="notes">
	 &#42;Answers will be shown one by one but the Argand diagram will not be plotted, sorry.
	</span>
  </p>

  </form>
  
 </body>
 
</html>