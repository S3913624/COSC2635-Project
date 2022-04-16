/*import functions from external files.
Does not work from vscode because extensions are run in a Node environment which does not natively support modules.*/
import { capitalizeString } from "./19_importExportFunction";

const cap = capitalizeString("Hello!");

//console.log(cap)



//can import functions/variables individually, or import everything from the file using *
import * as capitalizeStrings from "./19_importExportFunction";