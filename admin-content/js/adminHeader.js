document.addEventListener("DOMContentLoaded", function () {
    const adminHeader = document.getElementById("adminHeader");

    fetch("header.html")
        .then((response) => response.text())
        .then((content) => (adminHeader.innerHTML = content))
        .catch((error) => console.error("Error: ", error));
});

document.getElementById("home").style.borderBottom = "2px solid white";
document.getElementById("home").style.backgroundColor="beige";
function updateActiveLink(linkId) {
    const navLinks = document.querySelectorAll(".nav-links");

    navLinks.forEach(link => {
        link.style.borderBottom = "none";
        link.style.backgroundColor = "aliceblue";
    });

    const clickedLink = document.getElementById(linkId);
    clickedLink.style.borderBottom = "2px solid white";
    clickedLink.style.background = "white";
}