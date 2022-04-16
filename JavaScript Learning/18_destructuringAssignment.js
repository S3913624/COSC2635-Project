//destructuring allows a neat method of taking properties of objects and allocating them to a variable

var voxel = {x: 3.6, y: 7.4, z:6.54};

//less direct method
var x = voxel.x;
var y = voxel.y;
var z = voxel.z;

//destructuring method
var {x : a, y : b, z : c} = voxel;      //creating variables a, b and c, and assigning the property x, y and z from object voxel accordingly.



//Destructuring with nested objects
const LOCAL_FORECAST = {
    today: { min: 72, max : 84.6 },
    tomorrow: { min: 73.3, max: 84.6 }
};

function getMaxOfTmrw(forecast) {
    const { tomorrow : { max : maxOfTomorrow }} = forecast;
    return maxOfTomorrow;
}
//console.log(getMaxOfTmrw(LOCAL_FORECAST));



//Use destructuring to assign variables from arrays
//const [e, f] = [1, 2, 3, 4, 5, 6];      //no choice as to which item of the array goes into the variables. It is stored in order.
//console.log(e, f);                      //prints "1, 2"

const [e, f, , g] = [1, 2, 3, 4, 5, 6];     //using a comma with no variable name will skip the item in the array.
//console.log(e, f, g);                       //prints "1, 2, 4"