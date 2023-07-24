document.addEventListener("DOMContentLoaded", function () {
  const headerPlaceholder = document.getElementById("placeHolderHeader");

  fetch("header.html")
    .then((response) => response.text())
    .then((content) => (headerPlaceholder.innerHTML = content))
    .catch((error) => console.error("Error: ", error));
});
