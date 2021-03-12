<!DOCTYPE html>

<html lang="en">

 <head>
  <title>Maths(T) Assignment</title>
  <link href="css/1a.css" type="text/css" rel="stylesheet">
  <meta charset="UTF-8">
 <head>
 
 <body>
  <h2>Question 1(a)</h2>
  
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
		 <a href="q1-a.php">Go back</a>
		 <br/><br/>
		 <span style="text-decoration: underline;">Answers</span>
		 <br/><br/>
	<?php
		 for($n=2; $n<=$nth_power; ++$n){
			$a_new = $a_new * $a;
			$b_new = $b_new * $b;
			$aabb = $a_new*$b + $b_new*$a;
			$current_n = $n-1;

			
			// var_dump($current_n);
			// exit;
				
			$real_part = $a_new - $b_new;
			$imaginary_part = ($a_new * $b) + ($b_new * $a);
				
			// (1+i)^n(1+i)
			echo "z<sup>" . $n . "</sup> = (" . $ori_complex_num . ")<sup>" . $current_n . "</sup>(" . $ori_complex_num . ")";
			echo "<br/>";
			
			// sub the value of (1+i)^n
			echo "z<sup>" . $n . "</sup> = (" . $complex_num . ")</sup>(" . $ori_complex_num . ")";
			echo "<br/>";
			


			if($aabb == 0){
				if(($b_new > 0)){
					// expand
					echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " + " . $aabb . "<span class='i'>i</span> + " 
						. $b_new*$b . "<span class='i'>i</span><sup>2</sup>";
					echo "<br/>";
					
					// solve for i^2
					echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " + " . $aabb . "<span class='i'>i</span> + " 
						. $b_new*$b . "(-1)";
					echo "<br/>";
				}elseif(($b_new < 0)){
					// expand
					echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " + " . $aabb . "<span class='i'>i</span> - " 
						. abs($b_new*$b) . "<span class='i'>i</span><sup>2</sup>";
					echo "<br/>";
					
					// solve for i^2
					echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " + " . $aabb . "<span class='i'>i</span> - " 
						. abs($b_new*$b) . "(-1)";
					echo "<br/>";
				}
			
			}elseif($a_new == 0){
				// expand
				echo "z<sup>" . $n . "</sup> = " . $aabb . "<span class='i'>i</span> + " 
					. $b_new*$b . "<span class='i'>i</span><sup>2</sup>";
				echo "<br/>";
				
				// solve for i^2
				echo "z<sup>" . $n . "</sup> = " . $aabb . "<span class='i'>i</span> + " 
					. $b_new*$b . "(-1)";
				echo "<br/>";
			}elseif(($b_new >= 0) && ($aabb >= 0)){
				// expand
				echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " + " . $aabb . "<span class='i'>i</span> + " 
					. $b_new*$b . "<span class='i'>i</span><sup>2</sup>";
				echo "<br/>";
				
				// solve for i^2
				echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " + " . $aabb . "<span class='i'>i</span> + " 
					. $b_new*$b . "(-1)";
				echo "<br/>";
			}elseif(($b_new >= 0) && ($aabb <= 0)){
				// expand
				echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " - " . abs($aabb) . "<span class='i'>i</span> + " 
					. $b_new*$b . "<span class='i'>i</span><sup>2</sup>";
				echo "<br/>";
				
				// solve for i^2
				echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " - " . abs($aabb) . "<span class='i'>i</span> + " 
					. $b_new*$b . "(-1)";
				echo "<br/>";
			}elseif(($b_new <= 0) && ($aabb <= 0)){
				// expand
				echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " - " . abs($aabb) . "<span class='i'>i</span> - " 
					. abs($b_new*$b) . "<span class='i'>i</span><sup>2</sup>";
				echo "<br/>";
				
				// solve for i^2
				echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " - " . abs($aabb) . "<span class='i'>i</span> - " 
					. abs($b_new*$b) . "(-1)";
				echo "<br/>";
	//		}elseif(($b_new <= 0) && ($aabb >= 0)){
				// expand
	//			echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " + " . $aabb . "<span class='i'>i</span> - " 
	//				. abs($b_new*$b) . "<span class='i'>i</span><sup>2</sup>";
	//			echo "<br/>";
				
	//			echo $aabb;
	//			exit;
				
				// solve for i^2
	//			echo "z<sup>" . $n . "</sup> = " . $a_new*$a . " + " . $aabb . "<span class='i'>i</span> - " 
	//				. abs($b_new*$b) . "(-1)";
	//			echo "<br/>";
			}else{
				echo "Something is missing<br/>";
				// exit;
			}
			// var_dump($a_new);
			// var_dump($b_new);
			// var_dump($real_part);
			// var_dump($imaginary_part);
			// exit;
			
			
			// the final step
			if($real_part == 0){
				$complex_num = $imaginary_part . "<span class='i'>i</span>";
				echo "z<sup>" . $n . "</sup> = " . $complex_num;
			}elseif($imaginary_part == 0){
				$complex_num = $real_part;
				echo "z<sup>" . $n . "</sup> = " . $complex_num;
			}else{
				if($imaginary_part < 0){
					$complex_num = $real_part . " " . $imaginary_part . "<span class='i'>i</span>";
					echo "z<sup>" . $n . "</sup> = " . $complex_num;
				}else{
					$complex_num = $real_part . " + " . $imaginary_part . "<span class='i'>i</span>";
					echo "z<sup>" . $n . "</sup> = " . $complex_num;
				}
				
			}

			// Assign $real_part and $imaginary_part to $a_new and $b_new respectively for next calculation
			$a_new = $real_part;
			$b_new = $imaginary_part;

			echo "<br/>";
			echo "<br/>";
			// echo "<hr/>";
		 }
	?>
			<br/>
			<a href="q1-a.php">Go back</a>
	<?php
			exit;
		}
			
	}
	?>
    Let z = 1 + <span class="i">i</span>. Find z<sup>n</sup>, where n = 2, 3, 4, ..., 
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