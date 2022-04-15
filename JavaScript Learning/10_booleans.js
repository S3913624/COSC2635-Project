//Booleans return either true or false.

function welcomeToBooleans() {
    return true;
}



//Conditional Logic with 'if' statements and equality operators
function testEqual(val) {
    if (val == 10) {        //must use double equal, as single equal assigns a value rather than tests for equality
        return "Equal";
    }
    return "Not Equal";
}

//console.log(testEqual(10))



/* Strict equality operator '===' 
checks both the value and data type, where double equal checks only data.
e.g., a number value can be integer, float and string type.*/
function testStrict(val) {
    if (val === 7) {
        return "Equal";
    }
    return "Not Equal";
}

//console.log(testStrict(7));
//console.log(testStrict('7'));



//Inequality operator '!='
//Strict Inequality operator '!=='

//Greater than operator '>'
//Greater than or equal to operator '>='
//Less than operator '<'
//Less than or equal to operator '<='



//Conditional Logic with 'and' statements and equality operators
function testLogicalAnd(val) {
    if (val <= 50 && val >= 25) {
        return "Yes";
    }
    return "No";
}

//console.log(testLogicalAnd(15));
//console.log(testLogicalAnd(35));



//Conditional Logic with 'or' statements and equality operators
function testLogicalOr(val) {
    if (val <= 25 || val >= 50) {
        return "Yes";
    }
    return "No";
}

//console.log(testLogicalOr(15));
//console.log(testLogicalOr(35));
//console.log(testLogicalOr(65));



//Else statements
function testElse(val) {
    var result = "";
    if (val >= 5) {
        result = "Greater than or equal to 5.";
    } else {
        result = "Less than 5.";
    }
    return result;
}

//console.log(testElse(6));
//console.log(testElse(4));



//Else-if statements
function testElseIf(val) {
    if (val > 10) {
        return "Greater than 10";
    } else if (val < 5) {           //can have as many else if conditions as required. These are called 'chained' if statements.
        return "smaller than 5";
    } else {
        return "between 5 and 10";
    }
}

//console.log(testElseIf(6));
//console.log(testElseIf(11));
//console.log(testElseIf(4));



//Switch statements. used instead of chained if statements. Often simpler to write than chained if-else if-else statements
function caseInSwitch(val) {
    var answer = "";
    switch(val) {
        case 1:
            answer = "alpha";
            break;              //break escapes the function if condition is met.
        case 2:
            answer = "bravo";
            break;
        case 3:
            answer = "charlie";
            break;
        case 4:
            answer = "delta";
            break;
        default:                //equivalent to else, returned if all previous conditions are not met.
            answer = "invalid";
            break;
    }
    return answer;
}

//console.log(caseInSwitch(2));



//multiple identical options in switch statements
function sequentialSizes(val) {
    var answer = "";
    switch(val) {
        case 1:
        case 2:
        case 3:
            answer = "low"
            break;
        case 4:
        case 5:
        case 6:
            answer = "high"
            break;
    }
    return answer;
}

//console.log(sequentialSizes(4));



/*Turnary operators are a more direct way to express an if else conditional statement.
syntax: condition ? statement-if-true : statement-if-false;*/
function checkEqual(a, b) {
    return (a === b) ? true : false;
}

//console.log(checkEqual(1, 1));
//console.log(checkEqual(2, 1));



//Multiple ternary operators. Can nest within each other.
function checkSign(num) {
    return num > 0 ? "positive" : num < 0 ? "negative" : "zero"
}

//console.log(checkSign(10));
//console.log(checkSign(-10));
//console.log(checkSign(0));