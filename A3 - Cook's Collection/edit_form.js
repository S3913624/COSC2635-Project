const imageInput = document.querySelector("#image");
let uploaded_image = "";
const addStep = document.querySelector("#add-step");
const addIngredient = document.querySelector("#add-ingredient");
const ingredients = document.querySelector("#ingredients");
let ingredientCounter = ingredients.childElementCount;
const steps = document.querySelector("#steps");
let = stepCounter = steps.childElementCount;

imageInput.addEventListener("change", insertImage);
addIngredient.addEventListener("click", insertIngredient);
addStep.addEventListener("click", insertStep);

function insertImage() {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    uploaded_image = reader.result;

    document.querySelector(
      "#display-image"
    ).style.backgroundImage = `url(${uploaded_image})`;
  });
  reader.readAsDataURL(this.files[0]);
}

function insertIngredient(e) {
  ingredientCounter++;
  e.preventDefault();
  const newIngredient = document.createElement("div");

  newIngredient.innerHTML = `
      <h3>Ingredient ${ingredientCounter}</h3>
      <div class="field-txt">
        <label for="ing-name-${ingredientCounter}">Name:</label>
        <input type="text" id="ing-name-${ingredientCounter}" name="ingredients[${ingredientCounter}][name]" placeholder="Enter ingredient name" required>
      </div>
      <div class="field-num">
        <label for="amount${ingredientCounter}">Amount:</label>
        <input type="number" step="any" id="amount-${ingredientCounter}" name="ingredients[${ingredientCounter}][amount]" placeholder="Enter ingredient amount" required>
      </div>

      <div>
      <label for="unit-${ingredientCounter}">Unit:</label>
      <select id="unit-${ingredientCounter}" name="ingredients[${ingredientCounter}][unit]" required>
        <option value="g">g</option>
        <option value="kg">kg</option>
        <option value="mg">mg</option>
        <option value="cup(s)">cup(s)</option>
        <option value="tsp.">tsp.</option>
        <option value="tbsp.">tbsp.</option>
        <option value="pinch(es)">pinch(es)</option>
        <option value="mL">mL</option>
        <option value="L">L</option>
        <option value="dL">dL</option>
        <option value="oz">oz</option>
        <option value="fl oz">fl oz</option>
        <option value="fl pt">fl pt</option>
        <option value="fl qt">fl qt</option>
        <option value="gal">gal</option>
        <option value="gill">gill</option>
        <option value="ea.">ea.</option>
      </select>
      </div>
    `;
  ingredients.appendChild(newIngredient);
}

function insertStep(e) {
  e.preventDefault();
  stepCounter++;
  const newStep = document.createElement("div");
  newStep.innerHTML = `
      <div class="field-msg">
        <label for="step-${stepCounter}">Step ${stepCounter}:</label>
        <textarea id="step-${stepCounter}" name="instructions[${stepCounter}][step]" placeholder="Enter instructions" required></textarea>
      </div>
    `;
  steps.appendChild(newStep);
}
