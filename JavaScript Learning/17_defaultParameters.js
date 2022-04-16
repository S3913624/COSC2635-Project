//default parameters apply when arguments are not provided.
const increment = (function() {
    return function increment(number, value = 5) {      //two arguments expected; number and value.
        return number + value;
    };
})();
console.log(increment(5, 2));                           //two arguments provided; prints 5 + 2 = 7
console.log(increment(5));                              //one argument provided; prints 5 + 5(default value) = 10