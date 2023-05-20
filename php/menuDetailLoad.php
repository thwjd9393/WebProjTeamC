<?php
    header('Content-Type:application/json; charset=utf-8'); 

    //1. 데이터 받기
    $mnuNo = (int)$_GET['mnuNo']; 

    //2. 데이터베이스 연결 설정
    $db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
    mysqli_query($db, "set names utf8");
 
    //3. 쿼리문
    $sql = "SELECT * FROM cMenu WHERE mnuNo=$mnuNo";
 
    //4. 내 디비에 쿼리문 요청 보내고 받아온 응답 값 result 변수에 담기 
    $result = mysqli_query($db,$sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    echo json_encode($row);
 
    mysqli_close($db);
?>
