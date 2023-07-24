
// // const news_detail = document.getElementById("news-detail");
// // const news_detail = document.getElementsByClassName("news-detail");
// var news_date = document.getElementById("news_date");

// // news_date.innerHTML = "hey";
// let news_visible = false;

// function appear(clickedHeadline) {

//     const news_detail = clickedHeadline.nextElementSibiling;

//     if (news_visible === false) {
//         news_detail.style.opacity = 1;
//         news_detail.style.height = "auto";
//         news_visible = true;
//     } else {
//         news_detail.style.opacity = 0;
//         news_detail.style.height = "0";
//         news_visible = false;
//     }
// }

function appear(clickedHeadline) {
    const newsDetail = clickedHeadline.nextElementSibling; // Get the sibling news-detail element

    if (newsDetail.style.display === "none") {
        newsDetail.style.display = "block";
    } else {
        newsDetail.style.display = "none";
    }
}

function show_news_detail(clickedNews) {
    
    const clickedNewsDetail = clickedNews.nextElementSibling;

    // alert(clickedNewsDetail);
    // clickedNewsDetail.style.display = "none";
    // alert("hello");

    window.open("../news_detail.html");
}

function prev() {
    // alert("prev button is clicked!");
    window.close();
}

