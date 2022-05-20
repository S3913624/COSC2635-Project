// Listens for window resize
window.addEventListener("resize", resize);

// When resizing window, resize the sidenav(when open).
function resize() {
  let navWidth = document.getElementById("mainSidenav").style.width;
  if (navWidth === "150px") {
    openNav();
  } else if (navWidth === "200px") {
    openNav();
  }
}

// Sends to correct categories page
function gotosite() {
  window.location = document.getElementById("category-select").value;
}

// Opens sidenav
function openNav() {
  if (window.innerWidth > 1100) {
    document.getElementById("mainSidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
  } else {
    document.getElementById("mainSidenav").style.width = "150px";
    document.getElementById("main").style.marginLeft = "150px";
  }
}

// Closes sidenav
function closeNav() {
  document.getElementById("mainSidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

