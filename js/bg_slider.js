const bg_content = document.getElementsByClassName("hero");

let currentBg = "tech_bg2.jpg";
function next() {
    if (bg_content.length > 0) {
        if (currentBg === "tech_bg2.jpg") {
            bg_content[0].style.backgroundImage = "url('../images/tech_bg1.jpg')";
            currentBg = "tech_bg1.jpg";
        } else {
            bg_content[0].style.backgroundImage = "url('../images/tech_bg2.jpg')";
            currentBg = "tech_bg2.jpg";  
        } 
    }
}
setInterval(next, 5000);
