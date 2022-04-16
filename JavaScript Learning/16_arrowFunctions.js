//useful for shortening anonymous functions
var magicLong = function() {
    return new Date();
};

var magicShort = () =>  new Date();
//both functions do the same thing.


//Arrow functions with parameters
var myConcatLong = function(arr1, arr2) {
    return arr1.concat(arr2);
};
//console.log(myConcatLong([1, 2], [3, 4, 5]));

var myConcatShort = (arr1, arr2) => arr1.concat(arr2);
//console.log(myConcatShort([6, 7], [8, 9, 10]))
//both functions do the same thing.