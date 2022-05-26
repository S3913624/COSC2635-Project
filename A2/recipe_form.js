const imageInput = document.querySelector("#image");
let uploaded_image = "";
const addStep = document.querySelector("#add-step");
let = stepCounter = 0;
const addIngredient = document.querySelector("#add-ingredient");
let = ingredientCounter = 0;

imageInput.addEventListener("change", insertImage);
addIngredient.addEventListener("click", insertIngredient);
addStep.addEventListener("click", insertStep);

function insertImage() {
  const displayImage = document.querySelector("#empty-image");
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    uploaded_image = reader.result;
    displayImage.setAttribute("id", "display-image");
    document.querySelector(
      "#display-image"
    ).style.backgroundImage = `url(${uploaded_image})`;
  });
  reader.readAsDataURL(this.files[0]);
}

function insertIngredient(e) {
  e.preventDefault();
  ingredientCounter++;
  const ingredients = document.querySelector("#ingredients");
  const ingredientID = "ingredient-" + ingredientCounter;
  const newIngredient = document.createElement("div");
  newIngredient.setAttribute("id", ingredientID);
  newIngredient.innerHTML = `
      <h3>Ingredient ${ingredientCounter}</h3>
      <div class="field-txt">
        <label for="ing-name-${ingredientCounter}">Name:</label>
        <input type="text" id="ing-name-${ingredientCounter}" name="ingredients[${ingredientCounter}][name]" placeholder="Enter ingredient name" required>
      </div>
      <div class="field-num">
        <label for="amount${ingredientCounter}">Amount:</label>
        <input type="number" id="amount-${ingredientCounter}" name="ingredients[${ingredientCounter}][amount]" placeholder="Enter ingredient amount" required>
      </div>
      <div class="field-radio">
        <input type="radio" id="ml-${ingredientCounter}" name="ingredients[${ingredientCounter}][unit]" value="ml" required>
        <label for="ml-${ingredientCounter}">ml</label>
        <input type="radio" id="g-${ingredientCounter}" name="ingredients[${ingredientCounter}][unit]" value="g" required>
        <label for="g-${ingredientCounter}">g</label>
        <input type="radio" id="ounces-${ingredientCounter}" name="ingredients[${ingredientCounter}][unit]" value="ounces" required>
        <label for="ounces-${ingredientCounter}">ounces</label>
        <input type="radio" id="cups-${ingredientCounter}" name="ingredients[${ingredientCounter}][unit]" value="cups" required>
        <label for="cups-${ingredientCounter}">cups</label>
      </div>
    `;
  ingredients.appendChild(newIngredient);
}

function insertStep(e) {
  e.preventDefault();
  stepCounter++;
  const steps = document.querySelector("#steps");
  const stepID = "step-" + stepCounter;
  const newStep = document.createElement("div");
  newStep.setAttribute("id", stepID);
  newStep.innerHTML = `
      <div class="field-msg">
        <label for="step-${stepCounter}">Step ${stepCounter}:</label>
        <textarea id="step-${stepCounter}" name="instructions[${stepCounter}][step]" placeholder="Enter instructions" required></textarea>
      </div>
    `;
  steps.appendChild(newStep);
}
