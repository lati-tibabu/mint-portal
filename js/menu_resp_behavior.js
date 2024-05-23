let clicked = 0;

function menu_anima() {
    const line1 = document.getElementById("line1");
    const line2 = document.getElementById("line2");
    const line3 = document.getElementById("line3");
    const nav_list = document.getElementById("nav_lists");

    if (clicked === 0) {
        line2.style.transform = "translateX(100px)";
        line2.style.opacity = "0";
        line1.style.transform = "rotate(45deg)";
        line3.style.transform = "rotate(-45deg)";
        nav_list.style.display = "flex";
        clicked = 1;
    } else {
        line2.style.transform = "translateX(0)";
        line2.style.opacity = "1";
        line1.style.transform = "rotate(0)";
        line3.style.transform = "rotate(0)";
        nav_list.style.display = "none";
        clicked = 0;
    }
}