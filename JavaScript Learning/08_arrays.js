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