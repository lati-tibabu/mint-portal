window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  const logo = document.getElementById("logo");
  const co_name = document.getElementById("co_name");
  const ulElement = document.getElementById("nav-links");
  const nestedNavLinks = ulElement.querySelectorAll("li .nav-links");

  if (window.scrollY > 0) {
    header.classList.add("shrink");
    logo.classList.add("logoReduce");
    co_name.classList.add("mint_name_shrink");

    nestedNavLinks.forEach(link => {
      // link.innerHTML = "hello";
      link.classList.add("navLinkShrink")
    });
  } else {
    header.classList.remove("shrink");
    logo.classList.remove("logoReduce");
    co_name.classList.remove("mint_name_shrink");
    nestedNavLinks.forEach(link => {
      // link.innerHTML = "hello";
      link.classList.remove("navLinkShrink")
    });
  }
});
