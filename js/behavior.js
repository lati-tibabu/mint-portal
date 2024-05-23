window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  const logo = document.getElementById("logo");
  const co_name = document.getElementById("co_name");
  const ulElement = document.getElementById("nav-links");
  const logoPart = document.getElementById("logoPart");
  const nestedNavLinks = ulElement.querySelectorAll("li .nav-links");
  const departmentList = document.getElementById("department-list");
  const resourceList = document.getElementById("resource-list");
  if (window.scrollY > 0) {
    header.classList.add("shrink");
    // header.style.height = "20vh";
    logo.classList.add("logoReduce");
    co_name.classList.add("mint_name_shrink");
    logoPart.style.flexDirection = "column";
    departmentList.classList.add("department-list-reduce");
    resourceList.classList.add("resource-list-reduce");
    // co_name.style.fontSize = "0.6rem";
    departmentList.style.display = "none";
    resourceList.style.display = "none";
    nestedNavLinks.forEach(link => {
      // link.innerHTML = "hello";
      link.classList.add("navLinkShrink")
    });
  } else {
    header.classList.remove("shrink");
    // header.style.height = "30vh";
    logo.classList.remove("logoReduce");
    co_name.classList.remove("mint_name_shrink");
    logoPart.style.flexDirection = "column";
    departmentList.classList.remove("department-list-reduce");
    resourceList.classList.remove("resource-list-reduce");

    co_name.style.fontSize = "0.8rem";
    // co_name.style.display = "block";

    nestedNavLinks.forEach(link => {
      // link.innerHTML = "hello";
      link.classList.remove("navLinkShrink")
    });
  }
});


let menu_bar_clicked = 0;

function menu_anima() {
  // alert("menu is clicked");

  const line1 = document.getElementById("line1");
  const line2 = document.getElementById("line2");
  const line3 = document.getElementById("line3");
  const nav_list = document.getElementById("nav_lists");
  const menu_bar_container = document.getElementById("menu-bar");

  if (menu_bar_clicked === 0) {
    line2.style.transform = "translateX(100px)";
    line2.style.opacity = "0";
    line1.style.transform = "rotate(45deg)";
    line3.style.transform = "rotate(-45deg)";
    nav_list.style.display = "flex";
    menu_bar_container.style.transform = "translateX(-200px)";
    menu_bar_clicked = 1;
  }
  else {
    line2.style.transform = "translateX(0)";
    line2.style.opacity = "1";
    line1.style.transform = "rotate(0)";
    line3.style.transform = "rotate(0)";
    nav_list.style.display = "none";
    menu_bar_container.style.transform = "translateX(0)";
    menu_bar_clicked = 0;
  }
}

let res_visible = false;

function show_more_resource() {
  const resourceList = document.getElementById("resource-list");

  if (res_visible === false) {
    resourceList.style.display = "flex";
    res_visible = true;
  }
  else{
    resourceList.style.display = "none";
    res_visible = false;
  }
}

function clicked(params) {
  // alert(params);
  const btn = document.getElementById(params);
  btn.style.backgroundColor = 'rgba(230, 148, 60, 0.585)';
}

