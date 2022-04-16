/* Any variable with quotation marks is a "string literal" 
Can be single or double quote marks.
Preferable to use double quote marks to allow for punctuation
i.e., "don't" vs 'don't' */

var firstName = "Nick";
var lastName = "Parker";

//To escape literal quotes, use escape character \ (backslash)
//var myStr = "I am a "double quoted" string inside "double quotes""; //will not work. Chaos.
var myStrCorrect = "I am a \"double quoted\" string inside \"double quotes\"";

//Escape character allows for a range of other uses
"\'" //single quote
"\"" //double quote
"\\" //backslash
"\n" //newline
"\r" //cariage return
"\t" //tab
"\b" //backspace
"\f" //form feed

//To escape both single quotes and double quotes, use tilde
var myStr = `"'I am'the "END OF DAYS""`;

//To concatenate strings, use plus
var ourStr = "I come first. " + "I come second.";

//Can be made more direct using +=
var ourStr = "I come first. ";
ourStr += "I come second.";

//Can concatenate strings using variable names
var strOne = "My name is ";
var strTwo = "Nick ";
var strThree = "Parker";
var completeStr = strOne + strTwo + strThree;

//Can append variables to strings
var anAdjective = "gangster";
var myStr = "I am ";
myStr += anAdjective;

//To find length of string, use "".length"
var firstNameLength = 0;
var firstName = "Nick";

firstNameLength = firstName.length;

//To find nth character in string, use bracket notation
var firstName = "Nick";
var nthLetter = "";

nthLetter = firstName[2]; //Would return "c" as JS uses zero based indexing (digit zero references 1st position)

//To find last character in string, incorporate .length minus 1 (zero based indexing)
var firstName = "Nick";
var lastLetterOfFirstName = firstName[firstName.length - 1];

//To find nth to last character in string, replace '-1 with -n'
var lastName = "Parker";
var thirdLastLetterOfLastName = lastName[lastName.length - 3];

//string immutability, cannot change individual characters in a string. Only the whole string.
var immutableString = "jello world";
//immutableString[0] = "h"; console.log immutableString; will raise an error


/*create strings using template literals.
Allows for multi-line strings, punctuation and passing variables directly into the string.*/
var person = {
    name: "Nick",
    age: 33
};

var greeting = `Hello, my name is ${person.name}!
I am ${person.age} years old.`;

console.log(greeting);
