//used for converting a string to an integer. Required for ensuring calculations are calculable.

var strOrNumber = "27"

//console.log(typeof strOrNumber)

function convertToInt(str) {
    return parseInt(str);
}

strOrNumber = convertToInt(strOrNumber)

//console.log(typeof strOrNumber)


//use radix to convert to different number base. i.e., binary.
var binaryStrOrNumber = "1001101"

//console.log(typeof binaryStrOrNumber);

function convertStrToBinaryInt(str) {
    return parseInt(str, 2);
}

binaryStrOrNumber = convertStrToBinaryInt(binaryStrOrNumber);

//console.log(typeof binaryStrOrNumber);