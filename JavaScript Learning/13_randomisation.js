//Generate floats between zero and one
function randomFloat() {
    return Math.random();
}

//console.log(randomFloat());


//Generate random whole numbers using rounding and multiplying the Math.random function multiplying by range required.
var randomBetween0and19 = Math.floor(Math.random() * 20);   //Math.Floor rounds down to nearest integer

//console.log(randomBetween0and19);


//Generate random numbers within a range
function randomBetweenRange(max, min) {
    return Math.floor(Math.random() * ((max + 1) - min) + min);   //need + 1 in equation to include max as a potential result
}

//console.log(randomBetweenRange(3, 1));