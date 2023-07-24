const outer = document.getElementsByClassName("outer-circle");
// const middle = document.getElementsByClassName("middle-circle");

let outer_color = "rgb(230, 148, 60)";

function anima() {
  if (outer_color === "rgb(230, 148, 60)") {
    outer[0].style.background = "rgba(230, 148, 60, 0)";
    outer_color = "rgba(230, 148, 60, 0)";
  } else {
    outer[0].style.background = "rgb(230, 148, 60)";
    outer_color = "rgb(230, 148, 60)";
  }
}

setInterval(anima, 1000);
