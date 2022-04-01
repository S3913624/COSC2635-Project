const addStep = document.querySelector('#add-step');
let = stepCounter = 0;
const addIngredient = document.querySelector('#add-ingredient');
let = ingredientCounter = 0;
const imageInput = document.querySelector("#recipe-img");
let uploaded_image = "";

imageInput.addEventListener("change", function(){
  const displayImage = document.querySelector("#blank")
  const reader = new FileReader();
  reader.addEventListener("load", () =>{
    uploaded_image = reader.result;
    displayImage.setAttribute('id', "display-image")
    document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`
  })
  reader.readAsDataURL(this.files[0]);
})

addIngredient.addEventListener('click', e => {
  e.preventDefault();
  ingredientCounter++;
  const ingredients = document.querySelector('#ingredients');
  const ingredientID = "ingredient-"+ingredientCounter
  const newIngredient = document.createElement('div');
  newIngredient.setAttribute('id', ingredientID);
  newIngredient.innerHTML = `
      <h3>Ingredient ${ingredientCounter}</h3>
      <div class="field-txt">
        <label for="name-${ingredientCounter}">Name:</label>
        <input type="text" id="name-${ingredientCounter}" name="name-${ingredientCounter}" placeholder="Enter ingredient name">
      </div>
      <div class="field-num">
        <label for="amount${ingredientCounter}">Amount:</label>
        <input type="number" id="amount-${ingredientCounter}" name="amount-${ingredientCounter}" placeholder="Enter ingredient amount">
      </div>
      <div class="field-radio">
        <input type="radio" id="ml-${ingredientCounter}" name="unit-${ingredientCounter}" value="ml">
        <label for="ml-${ingredientCounter}">ml</label>
        <input type="radio" id="g-${ingredientCounter}" name="unit-${ingredientCounter}" value="g">
        <label for="g-${ingredientCounter}">g</label>
        <input type="radio" id="ounces-${ingredientCounter}" name="unit-${ingredientCounter}" value="ounces">
        <label for="ounces-${ingredientCounter}">ounces</label>
        <input type="radio" id="cups-${ingredientCounter}" name="unit-${ingredientCounter}" value="cups">
        <label for="cups-${ingredientCounter}">cups</label>
      </div>
    `;
  ingredients.appendChild(newIngredient)
});

addStep.addEventListener('click', e => {
  e.preventDefault();
  stepCounter++;
  const steps = document.querySelector('#steps');
  const stepID = "step-"+stepCounter
  const newStep = document.createElement('div');
  newStep.setAttribute('id', stepID);
  newStep.innerHTML = `
      <div class="field-msg">
        <label for="step-${stepCounter}">Step ${stepCounter}:</label>
        <textarea id="step-${stepCounter}" name="step-${stepCounter}" placeholder="Enter instructions"></textarea>
      </div>
    `;
  steps.appendChild(newStep)
});

function subForm (){
  $.ajax({
    url: 'https://api.apispreadsheets.com/data/v7h9VwK8eecjdgSj/',
    type: 'post',
    data:$("#recipe-form").serializeArray(),
    success: function() {
      alert("Form submitted successfully!")
    },
    error: function() {
      alert("Error: Form not submitted")
    }
  });
}
