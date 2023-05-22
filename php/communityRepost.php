<?php

//데이터 받기
$cmtyNo = (int)$_GET['cmtyNo'];

// 데이터 연결
$db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
mysqli_query($db, "set names utf8"); //한글깨짐 방지


?>