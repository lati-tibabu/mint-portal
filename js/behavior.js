window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  const logo = document.getElementById("logo");
  const co_name = document.getElementById("co_name")
  if (window.scrollY > 0) {
    header.classList.add("shrink");
    logo.classList.add("logoReduce");
    co_name.classList.add("mint_name_shrink");
  } else {
    header.classList.remove("shrink");
    logo.classList.remove("logoReduce");
    co_name.classList.add("mint_name_shrink");
  }
});


// /* About page scroller*/

// const news_container = document.getElementById("about_content");
// const content_detail = news_container.querySelector(".content-detail");

// function showNestedDivsOnScroll() {
//   const scrollPosition = outerDiv.scrollTop + outerDiv.clientHeight;
//   const totalScrollHeight = outerDiv.scrollHeight;
  
//   // Calculate the height at which you want to start showing the nested divs
//   const showThreshold = totalScrollHeight - 100; // Adjust the threshold as needed
  
//   if (scrollPosition >= showThreshold) {
//     nestedDivs.forEach((div) => {
//       div.style.opacity = '1';
//       div.style.display = 'block';
//     });
//   }
// }

// // Attach the scroll event listener to the outer div
// outerDiv.addEventListener('scroll', showNestedDivsOnScroll);