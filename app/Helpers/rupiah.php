<?php 

	function numberNo($number) {
		return number_format($number,2,',','.');
	}

	function numberRp($number) {
		
		if ($number === 0) {
			return 0;
		}

		return 'Rp. ' . numberNo($number);
	}

 ?>