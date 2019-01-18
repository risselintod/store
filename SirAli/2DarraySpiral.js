// 2D ARRAY SPIRAL

let n = 3; // grid size
let arr = []; // array variable

for(i=0; i<n; i++){
  arr[i] = [];
  for(j=0; j<n; j++){
    arr[i][j] = -1;
  }
}

let northBorder = 0;
let eastBorder = n-1;
let southBorder = n-1;
let westBorder = 0;

let direction = 0;
let counter = 1;
let x=0, y = 0;

while(counter<=n*n){
  arr[y][x] = counter;
  // Change the direction once the limit is reached
  if (direction==0 && x >= eastBorder) {  // 0 = direction right
    direction = 1;
    northBorder = northBorder + 1;
  }
  else if (direction==1 && y >= southBorder){  // 1 = direction down
    direction = 2;
    eastBorder = eastBorder - 1;
  }
  else if (direction==2 && x <= westBorder){  // 2 = direction left
    direction = 3;
    southBorder = southBorder - 1;
  }
  else if (direction==3 && y <= northBorder){  // 3 = direction up
    direction = 0;
    westBorder = westBorder + 1;
  }

  // While the limit is not reached, manipulate either x or y depending on the direction
  
  if (direction==0) {  // 0 = direction right
    x++;

  } else if(direction==1){  // 1 = direction down
    y++;

  } else if (direction==2) {  // 2 = direction left
    x--;

  } else if (direction==3) {  // 3 = direction up
    y--;
  }

  counter++;

} // end of while loop

  console.log(arr);








// BUBBLE SORT
function bubble(sort){

	return sorted;
}



