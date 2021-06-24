<?php 


function similarity_distance($matrix,$person1,$person2){

	$similar = array();
	$sum=0;

	foreach ($matrix[$person1] as $key => $value) {
		# code...
		if (array_key_exists($key, $matrix[$person2])) {
			# code...
			$similar[$key] =1;

		}

	}
		if ($similar==0) {
			# code...
			return 0;
		}

	foreach ($matrix[$person1] as $key => $value) {
		# code...
		if (array_key_exists($key, $matrix[$person2])) {
			# code...
			$sum = $sum+pow($value-$matrix[$person2][$key], 2);


		}

	}

	return 1/(1+sqrt($sum));

	}



function getRecommendation($matrix,$person){

$total = array();
$simsums= array();
$ranks=array();

	foreach ($matrix as $otherPerson => $value) {
		# code...
		if ($otherPerson!=$person) {
			# code...
			$sim= similarity_distance($matrix,$person,$otherPerson);

			foreach ($matrix[$otherPerson] as $key => $value) {
				# code...
				if (!array_key_exists($key, $matrix[$person])) {
					# code...
					if (!array_key_exists($key, $total)) {
						# code...
						$total[$key] = 0;

					}

					$total[$key]+=$matrix[$otherPerson][$key]*$sim;

					if (!array_key_exists($key, $simsums)) {
						# code...
						$simsums[$key]=0;
					}

					$simsums[$key]+=$sim;

				}
			}

		}

	}

	foreach ($total as $key => $value) {
		# code...
		$ranks[$key]=$value/$simsums[$key];

	}

	array_multisort($ranks,SORT_DESC);
	return $ranks;
}

 ?>