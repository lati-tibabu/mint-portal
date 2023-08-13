document.addEventListener("DOMContentLoaded", function () {
    const headerPlaceholder = document.getElementById("aboutPlaceholder");
  
    fetch("about.html")
      .then((response) => response.text())
      .then((content) => (headerPlaceholder.innerHTML = content))
      .catch((error) => console.error("Error: ", error));
  });