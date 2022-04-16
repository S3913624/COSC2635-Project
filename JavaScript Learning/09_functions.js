//Use functions to create re-useable code

function ourReusableFunction() {   //"function" to declare a function, then name of function followed by brackets, followed by curly bracket
    console.log("Hello world");    //contents of function between curly brackets
}                                  //close off function with curly bracket

ourReusableFunction();             //call to run function


//Function with arguments
function ourFunctionWithArgs(a, b) {   //defined function outlining required parameters
    console.log(a + b);                //contents of functions making use of arguments/parameters
}

ourFunctionWithArgs(10,5);             //call to run function inputing 10 and 5 as parameters/arguments


//Return value from function.
function returnFunction(num) {
    return(num - 10);
}

//console.log(returnFunction(20));


//Variable assignment using a returned value.
var changed = 0;

function change(num) {
    return num + 5;
}

changed = change(10);

//console.log(changed)

//rest operator allows to create functions that take a variabled number of arguments
var sum = (function() {
    return function sum(...args) {                  //...args is the rest operator
        return args.reduce((a, b) => a + b, 0);
    };
})();
console.log(sum(1, 2, 3, 4));