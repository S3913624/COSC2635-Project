//Allow for storage of different data in same place
var ourArray = ["Nick", 33];

//Nested arrays are arrays in arrays - milti dimensional array
var ourArray = [["the universe", 42], ["everything, 101010"]];

//Access data in array using index
var ourArray = [1,2,3];
var ourData = ourArray[1]; //will display '2'

//Use double bracket notation [n][n] to change multi dimensional array data

ourArray[0] = 14; //changes value of array by declaring the index number = new value

//Append data to array using push
var ourArray = ["Nick", "nack"];
ourArray.push("paddy", "wack");

//Unshift works the same as push, but prepends rather than appends
var ourArray = ["paddy", "wack"];
ourArray.unshift("Nick", "nack");

//Remove lasts entry from array with pop
var ourArray = [1,2,3];
var removedFromOurArray = ourArray.pop();

//Shift functions the same as pop, but removes the first element of the array rather than the last
var ourArray = [1,2,3];
var removedFromOurArray = ourArray.shift();


//spread operator takes an array and spreads it out into its individual parts.
//var arr1 = ["JAN", "FEB", "MAR", "APR", "MAY"];
//var arr2;
//(function() {
//    arr2 = arr1;
//    arr1[0] = "potato"
//})();
//console.log(arr2);
/*this block of code does not make a copy/backup of arr1 and store it in arr2, rather, it mirrors it.
So, if we change an item in arr1, it also changes it in arr2*/


var arr1 = ["JAN", "FEB", "MAR", "APR", "MAY"];
var arr2;
(function() {
    arr2 = [...arr1];       //we are using the [...] spread function to make arr2 = contents of arr1, rather than mirror arr1.
    arr1[0] = "potato"
})();
//console.log(arr2);          //Printing the contents of arr2 reveals the original version of arr1, before changing "JAN" to "potato"
