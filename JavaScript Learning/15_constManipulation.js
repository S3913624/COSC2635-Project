//const variable types cannot be changed, but const array and object types can.

const myArray = [0, 1, 2];
//myArray = [3, 4, 5];          //attempting to change the whole array will raise a 'read-only' error

myArray[0] = "a";               //can change index values of the array.
myArray[1] = "b";
myArray[2] = "c";
//console.log(myArray);


//To prevent constant object manipulation, use object.freeze
function freezeObj() {
    "use strict";
    const MATH_CONSTANTS = {
        PI: 3.14
    };

    Object.freeze(MATH_CONSTANTS);          //commenting this out will allow PI to be changed

    try {
        MATH_CONSTANTS.PI = 99;
    } catch( ex ) {
        console.log(ex);
    }
    return MATH_CONSTANTS.PI;
}

const PI = freezeObj();

console.log(PI)