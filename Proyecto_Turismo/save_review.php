<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];
    $stars = str_repeat("⭐", $rating);

    $reviewText = "$name - $stars<br>$review<br><br>";

    $file = "reviews.txt";

    if (file_put_contents($file, $reviewText, FILE_APPEND)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
