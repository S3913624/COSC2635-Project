/*objects are simillar to arrays, but instead of referencing to index numbers, we refer to properties.
Objects can be thought of as a key value storage like a dictionary*/

var ourDog = {
    "name": "Barky",                    //before colon is the property, after colon is the value
    "legs": 4,                      
    "tails": 1,
    "friends": ["everything!"]          //property can be any datatype, including arrays
};


//Accessing objects
var testObj = {
    "hat": "beanie",
    "shirt": "jersey",
    "shoe type": "ugg boots"
};

var hatValue = testObj.hat;              //access using 'dot' notation
var shirtValue = testObj.shirt;          //access using 'dot' notation
var shoesValue = testObj["shoe type"];   //access using bracket notation. This is required if the object property has a space in its name.


//Accessing object properties with variables
var testObjTwo = {
    12: "Nick",
    16: "Nack",
    22: "Paddy",
    25: "Wack"
};

var objNumber = 16;
var objName = testObjTwo[objNumber];

//console.log(objName);


//Updating object properties
var myDog = {
    "name": "Estevez",
    "legs": 4,
    "tails": 1,
    "friends": ["Nick", "Steve"]
};

myDog.legs = 3
myDog.tails = 0
myDog.friends.pop()

//console.log(myDog);


//Add new properties to an object
myDog.bark = "woof"

//console.log(myDog);


//Delet properties from an object
delete myDog.tails;

//console.log(myDog);


//Using object for lookups.
function phoneticLookup(val) {
    var result = "";

    var lookup = {
        "a": "alpha",
        "b": "bravo",
        "c": "charlie"
    };
    result = lookup[val];
    return result;
}

//console.log(phoneticLookup("c"));


//Testing objects for properties
var lookup = {
    "a": "alpha",
    "b": "bravo",
    "c": "charlie"
}; //see global vs. local variable notes in 01_commenting.js as to why this lookup object had to be re-created.

function checkObj(checkProp) {
    if (lookup.hasOwnProperty(checkProp)) {
        return lookup[checkProp];
    } else {
        return "Not found"
    }
}

//console.log(checkObj("a"));
//console.log(checkObj("d"));


//Manipulating complex objects
var myMusic = [
    {
        "artist": "Metallica",
        "title": "Kill 'em All",
        "formats": [
            "CD",
            "8T",
            "LP"
        ],
        "platinum": true
    },

    {
        "artist": "Opeth",
        "title": "Ghost Reveries",
        "formats": [
            "CD",
            "LP",
        ],
        "platinum": false
    }
];


//Accessing nested objects with dot notation.
var myStorage = {
    "car": {
        "inside": {
            "glove box": "maps",
            "Passenger seat": "rubbish"
        },
        "outside": {
            "trunk": "spare tyre"
        }
    }
};

var gloveBoxContents = myStorage.car.inside["glove box"];

//console.log(gloveBoxContents);


//Accessing nested arrays inside objects using dot notation
var secondAlbumSecondFormat = myMusic[1].formats[1];

console.log(secondAlbumSecondFormat);