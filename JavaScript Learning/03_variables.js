/*Declaring Variables:
 - var: global when declared outside of functions. Var declared within a function becomes local to the function.
 - let: only used in scope of where it has been declared. cannot be declared more than once.
 - const: can never change. If there is an attempt, it will raise an error

 To determine type of variable, use "typeof"
*/

var myName = "Nick";
myName = "Not Nick"; //variable changed
let age = 33;
const pi = 3.14;

//end all lines with a semi-colon ";"

var a; //declaring a variable, undefined/unassigned
var b = 2; //declaring and assigning a variable at the same time
a = 7; //assiging a value to a variable
b = a; //assigning a variable to equal another variable

//Variables are case sensitive. Use Camel Case as standard convention
var properCamelCase;

console.log(a) //shows state of a variable at various stages in the program. prints output in the console.


//var vs let