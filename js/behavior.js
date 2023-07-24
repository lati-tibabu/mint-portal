window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  const logo = document.getElementById("logo");
  if (window.scrollY > 0) {
    header.classList.add("shrink");
    logo.classList.add("logoReduce");
  } else {
    header.classList.remove("shrink");
    logo.classList.remove("logoReduce");
  }
});
