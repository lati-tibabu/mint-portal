document.addEventListener("DOMContentLoaded", function () {
  const newsPlaceholder = document.getElementById("newsPlaceholder");

  fetch("news_content.html")
    .then((response) => response.text())
    .then((content) => (newsPlaceholder.innerHTML = content))
    .catch((error) => console.log("Error: ", error));
});
