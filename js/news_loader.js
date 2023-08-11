document.addEventListener("DOMContentLoaded", function () {
  const newsPlaceholder = document.getElementById("newsPlaceholder");

  fetch("header.html")
    .then((response) => response.text())
    .then((content) => (newsPlaceholder.innerHTML = content))
    .catch((error) => console.log("Error: ", error));
});
