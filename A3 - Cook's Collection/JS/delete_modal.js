// Closes delete confirmation modal
let recipesContainer = document.querySelector('.recipes')

recipesContainer.addEventListener('click', e => {
  
  const modalToggle = e.target.closest('.confirm')
  window.onclick = function(event) {
    if (event.target == modalToggle) {
      modalToggle.style.display = "none";
        }
    }
})
