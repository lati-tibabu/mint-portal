<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/content-manage-style.css">
</head>

<body>

    <div id="adminHeader"></div>
    <script src="../js/adminHeader.js"></script>

    <main id="main">
        <div class="container">
            <div class="header">
                <ul>
                    <li><a href="" onclick="post_news()">Post News</a></li>
                    <li><a href="" onclick="manage_news()">Manage News</a></li>
                </ul>
            </div>
            <div class="main">
                <div class="post-news" id="post-news">
                    <form action="../../../mint-portal/back_end/news-post.php" method="post"
                        enctype="multipart/form-data">
                        <input name="headline" class="headline" type="text" placeholder="News headline"><br>
                        <textarea name="news_detail" id="news-detail" cols="70" rows="10" autocomplete="off"
                            placeholder="News detail"></textarea><br>

                        <select name="category">
                            <option value="">News Category</option>
                            <option value="Technology">Technology</option>
                            <option value="Education">Education</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Health">Health</option>
                        </select><br>

                        <!-- <input type="file" name="image" id="news_photo" accept="image/*"> -->
                        <input type="file" id="image" name="image" accept="image/*">


                        <br>

                        <img id="preview" src="#" alt="Selected Photo" style="max-width: 300px; display: none;">

                        <input type="submit" name="submit" id="submit" value="Upload Article">
                    </form>
                </div>

                <div id="manage-news">
                    <h1>manage-news</h1>
                </div>
            </div>
        </div>
        </main>
    <footer>
        <div class="footer-text">
            &copy;Copyright 2023, MinT
        </div>
    </footer>

    <script src="../../js/behavior.js"></script>
    <script>
        function post_news() {
            const post_news = document.getElementById("post-news");

            // let show_post_news = false;

            // if(!show_post_news){
                // post_news.style.transition = "500ms";
                // post_news.style.transform = "translateX(500px)";
                // post_news.style.display = "none";

            // }

            // alert('post_news');

        }

        function manage_news() {
            const manage = document.getElementById("manage-news");

            manage.style.display = "block";
            // alert("manage");
        }
    </script>
</body>
</html>