<?php 

// PHP Version
function get_primes($n){

    // Start with 2 as your first prime
	$primes = array(2);

    // Solve for primes
	if($n<2){
	  return undefined;
	}

    // Returning a null set
	if($n==2){
		return array(2);
	}

	// Solve for primes
	for($x = 3; $x<=$n; $x++){
		
 	  // Flag for checking if a number is prime
      // By default, assume that the number is prime
      //   since it is easier to disprove a number is prime 
      //   than to prove that it is	
	  $isPrime = true;

      // Iterate through all the known prime numbers
	  for($y = 0; $y<count($primes); $y++){
 	    // If a number is proven to be divisible by another 
        //   prime number, reverse the flag
		if($x%$primes[$y]==0){
			$isPrime = false;
		}
	  }

      // Add the current value of x to the list of prime numbers
      //  if the flag was never set to false
	  if($isPrime){
	    	$primes[] = $x;
	  }

    }

	return $primes;

}

// Sample Test Cases

// #1
// Expected Output:
// Array ( [0] => 2 [1] => 3 [2] => 5 [3] => 7 )
print_r( get_primes (10) );

// #2 
// Expected Output:
// Array ( [0] => 2 [1] => 3 [2] => 5 [3] => 7 [4] => 11 [5] => 13 [6] => 17 [7] => 19 [8] => 23 [9] => 29 [10] => 31 [11] => 37 [12] => 41 [13] => 43 [14] => 47 )
print_r( get_primes(49) );

// #3
// Expected Output:
// Array ( [0] => 2 )
print_r( get_primes(2) );





// Even Numbers
// PHP Version

function get_even($n){

  // Handle exceptions
  if($n<2){
    return null;
  }

  // Container for all the even numbers
  $even_nos = array();
  
  // Iterate from 2 to n
  for($x=2; $x<=$n; $x++){
    // If x is divisible by 2, push to the even_nos array
    if($x%2==0){
      $even_nos[] = $x;
    }
  }
  
  // Return the even number array
  return $even_nos;

}

// #1
// Expected Output: Array ( [0] => 0 [1] => 2 [2] => 4 [3] => 6 [4] => 8 )
print_r(get_even(10));

// #2
// Expected Output: null (or blank space)
print_r(get_even(1));

// #3
// Expected Output: null (or blank space)
print_r(get_even(-1));



?>
<hr>

