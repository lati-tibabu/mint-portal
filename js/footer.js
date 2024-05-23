document.addEventListener("DOMContentLoaded", function () {
    const headerPlaceholder = document.getElementById("footerPlaceholder");
  
    fetch("footer.html")
      .then((response) => response.text())
      .then((content) => (headerPlaceholder.innerHTML = content))
      .catch((error) => console.error("Error: ", error));
  });