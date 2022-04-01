const searchForm = document.querySelector('form');
const searchResultDiv = document.querySelector('.searchResult');
const container = document.querySelector('container');

// Detais of the database
const APP_ID = '37c2f8da';
const APP_KEY = '1df87d766df7af671f36533d396009f4';


let searchQuery = '';

searchForm.addEventListener('submit', (e) => {
    e.preventDefault();
    searchQuery = e.target.querySelector('input').value;
    //console.log(searchQuery);
    fetchAPI();
});

async function fetchAPI (){
    const baseURL = `https://api.edamam.com/api/recipes/v2?type=public&q=${searchQuery}&app_id=${APP_ID}&app_key=${APP_KEY}`;
    const response = await fetch(baseURL);
    const data = await response.json();
    
    generateHTML(data.hits);
    
    console.log(data);
};

function generateHTML(results){
    let generatedHTML = '';
    results.map(result => {
        generatedHTML += 
        `
        <div class="item">
            <img src="${result.recipe.image}">
            <div class="flexContainer">
                <h1 class="title">${result.recipe.label}</h1>
                <a class="viewButton" href="${result.recipe.url}" target = "_blank">View recipe</a>
            </div>
            <p class="itemData">Calories: ${result.recipe.calories.toFixed(2)} ${result.recipe.totalNutrients.ENERC_KCAL.unit}</p>
            <p class="itemData">Diet Label: ${result.recipe.dietLabels.length > 0 ? result.recipe.dietLabels : "N/A"}</p>

        </div>
        `
    })
    searchResultDiv.innerHTML = generatedHTML;
}