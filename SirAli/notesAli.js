// Hello Batch 19!


// Machine Problem 1
// Create a function get_prime that accepts parameter n
//   which retrieves all prime numbers from 2 to n

// Javascript Version
function get_primes(n){

  // Start with 2 as your first prime
  let primes = [2];
  
  // Solve for primes
  if( n==2 ){
    return [2];
    // return primes;
  }
  
  // Returning a null set
  if( n<2 ){
    return undefined;
  }
  
  // Iterate from x to n
  for(x=3; x<=n; x++){
    
    // Flag for checking if a number is prime
    // By default, assume that the number is prime
    //   since it is easier to disprove a number is prime 
    //   than to prove that it is
    let isPrime = true;
    
    // Iterate through all the known prime numbers
    for(y=0; y<primes.length; y++){
      
      // If a number is proven to be divisible by another 
      //   prime number, reverse the flag
      if(x%primes[y]==0){
        isPrime = false;
      }
      
    }

    // Add the current value of x to the list of prime numbers
    //  if the flag was never set to false
    if(isPrime){
      primes.push(x);
    }
      
  }
  
  // Return the new array of primes
  return primes;

}

// Sample Test Cases

// #1
// Expected Output: [ 2, 3, 5, 7 ]
console.log( get_primes(10) );

// #2 
// Expected Output: [ 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47 ]
console.log( get_primes(49) );

// #3
// Expected Output: [ 2 ]
console.log( get_primes(2) );














// Create a function get_even() that accepts a parameter n
//   and returns an array of even numbers from 1 to n

// Javascript Version
function get_even(n){

  // Handle exceptions
  if(n<2){
    return undefined;
  }

  // Container for all the even numbers
  let even_nos = [];
  
  // Iterate from 2 to n
  for(x=2; x<=n; x++){
    // If x is divisible by 2, push to the even_nos array
    if(x%2==0){
      even_nos.push(x);
    }
  }
  
  // Return the even number array
  return even_nos;

}

// Sample Test Cases

// #1
// Expected Output: [ 0, 2, 4, 6, 8 ]
console.log(get_even(10));

// #2
// Expected Output: undefined
console.log(get_even(1));

// #3
// Expected Output: undefined
console.log(get_even(-1));

















// 2D ARRAY

// Initializing a 2D array based on m and n parameters

// Row count
let m = 3;

// Column count
let n = 3;

// Array declaration
let arr = [];

// PART 1
// Creating a 2D array that is uninitalized

// Build the row first
for(y=0; y<m; y++){

  // Build the arrays for the columns next
  arr[y] = [];
  
}

// Try to print out the contents
for(y=0; y<m; y++){
  
  for(x=0; x<n; x++){
    console.log("("+x+","+y+") => "+arr[x][y]);
  }
  
}

// PART 2
// Initializing all cells to a value of 0

for(y=0; y<m; y++){
  
  for(x=0; x<n; x++){
    arr[x][y] = 0;
  }
  
}

// Try to print out the contents
for(y=0; y<m; y++){
  
  for(x=0; x<n; x++){
    console.log("("+x+","+y+") => "+arr[x][y]);
  }
  
}

// PART 3
// Initializing all cells with a different increasing value

let counter = 1;
for(y=0; y<m; y++){
  
  for(x=0; x<n; x++){
    arr[x][y] = counter;
    counter++;
  }
  
}

// Try to print out the contents
for(y=0; y<m; y++){
  
  for(x=0; x<n; x++){
    console.log("("+x+","+y+") => "+arr[x][y]);
  }
  
}

// PART 4
// Presenting the 2D array as a matrix

counter = 1;
for(y=0; y<m; y++){
  
  for(x=0; x<n; x++){
    arr[x][y] = counter;
    counter++;
  }
  
}

// Try to print out the contents
for(y=0; y<m; y++){
  
  let str = "";
  for(x=0; x<n; x++){
    str = str + "("+x+","+y+") => "+arr[x][y] + "|";
  }
  console.log(str);
  
}











