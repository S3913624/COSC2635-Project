//While loops allow for the same code to be run over and over until a condition is met
var myArray = [];

var i = 0;
while(i < 5) {
    myArray.push(i);
    i ++;
}

//console.log(myArray);


//Iterate through an array using a while loop
var i = 0;
while(i < myArray.length) {
    console.log(myArray[i]);
    i ++;
}


//Iterate with for-loops
var ourArray = [];

for (var i = 1; i < 6; i++) {       //for ("initialisation", "condition, "iteration command")
    ourArray.push(i);
}

//console.log(ourArray);


//Iterate through an array using a for-loop
var testArray = ["a", "b", "c", "d"];

for (var i = 0; i < testArray.length; i++) {
    console.log(testArray[i])
}


//Iterate with Do While loops. Differes to while loop in that it will always run at least once before checking for while condition.
var testArrayTwo = [];
var i = 10;

while (i < 5) {             //because condition is checked first, the command does not append i to the array.
    testArrayTwo.push(i);
    i ++;
}


do {                        //command runs on initial instance because while loop condition is not checked first.
    testArrayTwo.push(i);
    i ++;
} while (i < 5)

console.log(testArrayTwo)