document.addEventListener("DOMContentLoaded", function () {
  const headerPlaceholder = document.getElementById("placeHolderHeader");

  fetch("header.html")
    .then((response) => response.text())
    .then((content) => (headerPlaceholder.innerHTML = content))
    .catch((error) => console.error("Error: ", error));
});

// const more_nav = document.getElementById("more-nav-links");
let more_expanded = 0;

function more_nav_links() {
  const more_nav_bars = document.getElementById("more-nav-links");

  if (more_expanded === 0) {
    more_nav_bars.style.display = "flex";
    more_nav_bars.style.height = "350px";
    more_expanded = 1;
  } else {
    more_nav_bars.style.display = "none";
    more_nav_bars.style.height = "0";
    more_expanded = 0;
  }

  // alert("hello there");
}
