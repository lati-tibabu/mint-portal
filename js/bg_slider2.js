const bg_content = document.getElementsByClassName("hero");
const bg_content2 = document.getElementsByClassName("hero2");
// const prev_button = document.getElementById("prev")
// const next_button = document.getElementById("next")
let currentBg = "tech_bg2.jpg";


function next() {
    if (bg_content.length > 0) {
        if (currentBg === "tech_bg2.jpg") {
            bg_content[0].style.backgroundImage = "url('../images/tech_bg1.jpg')";
            // next_button.style.background = "white";
            // next_button.style.color = "black";
            // prev_button.style.background = "white";
            // prev_button.style.color = "black";
            currentBg = "tech_bg1.jpg";
        } else {
            bg_content[0].style.backgroundImage = "url('../images/tech_bg2.jpg')";
            // next_button.style.background = "black";
            // next_button.style.color = "white";
            // prev_button.style.background = "black";
            // prev_button.style.color = "white";            
            currentBg = "tech_bg2.jpg";  
        } 
    }
}
// function next2() {
//     if (bg_content2.length > 0) {
//         if (currentBg === "tech_bg2.jpg") {
//             bg_content2[0].style.backgroundImage = "url('../images/tech_bg1.jpg')";
//             // next_button.style.background = "white";
//             // next_button.style.color = "black";
//             // prev_button.style.background = "white";
//             // prev_button.style.color = "black";
//             currentBg = "tech_bg1.jpg";
//         } else {
//             bg_content2[0].style.backgroundImage = "url('../images/tech_bg2.jpg')";
//             // next_button.style.background = "black";
//             // next_button.style.color = "white";
//             // prev_button.style.background = "black";
//             // prev_button.style.color = "white";            
//             currentBg = "tech_bg2.jpg";  
//         } 
//     }
    
// }

setInterval(next, next2, 5000);
// setInterval(next2, 5000);