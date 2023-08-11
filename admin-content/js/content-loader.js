let selected_section = "home"; // Initialize with a default value 
const loadedContent = document.getElementById("loadedContent");

fetch(`cms-pages/${selected_section}.html`)
    .then((response) => response.text())
    .then((content) => (loadedContent.innerHTML = content))
    .catch((error) => console.error("Error: ", error));


function clicked(params) {
    const clickedLink = document.getElementById(params);
    selected_section = clickedLink.textContent.trim();
    fetch(`cms-pages/${selected_section}.html`)
        .then((response) => response.text())
        .then((content) => (loadedContent.innerHTML = content))
        .catch((error) => console.error("Error: ", error));
}
