// Listens for window resize
window.addEventListener("resize", resize);

// When resizing window, resize the sidenav(when open).
function resize() {
  let navWidth = document.getElementById("mySidenav").style.width;
  console.log(typeof navWidth);
  console.log(navWidth);
  if (navWidth === "150px") {
    openNav();
  } else if (navWidth === "200px") {
    openNav();
  } else {
    console.log("something else");
  }
}
// Sends to correct categories page
function gotosite() {
  window.location = document.getElementById("category-select").value;
}

// Opens sidenav
function openNav() {
  if (window.innerWidth > 1100) {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
  } else {
    document.getElementById("mySidenav").style.width = "150px";
    document.getElementById("main").style.marginLeft = "150px";
  }
}
// Closes sidenav
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
