<?php
    header("Content-Type:text/html; charset=utf-8");

    $name=$_POST['name'];
    $password=$_POST['password'];
    $type=$_POST['type'];
    $title=$_POST['title'];
    $context=$_POST['context'];
    $image=$_POST['image'];
    


    $context= nl2br($context);

    echo "<h2>$name</h2>";
    echo "<p>$password</p>";
    echo "<p>$type</p>";
    echo "<p>$title</p>";
    echo "<p>$context</p>";
    echo "<p>$image</p>";


?>