<?php
    header('Content-Type:application/json; charset=utf-8'); 

    // 데이터 받기
    $qaNic=$_POST['name'];
    $qaPasswd=$_POST['password'];
    $qaType=$_POST['type'];
    $qaTitle=$_POST['title'];
    $qaContent=$_POST['context'];
    $qaImg=$_POST['image'];

    $qaDate= date('Y-m-d', time());

    // 데이터베이스 연결 설정
    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8"); //한글깨짐 방지
 
    // 쿼리문
    $sql = "INSERT INTO cQa(qaType, qaNic, qaPasswd, qaTitle, qaContent, qaDate, qaImg)
    VALUES ('${qaType}','${qaNic}','${qaPasswd}','${qaTitle}','${qaContent}','${qaDate}','${qaImg}');";
 
    // 실행
    $result = mysqli_query($db, $sql);

    if($result) echo "등록 성공"; 
    else echo "등록 실패";

    // php 닫기
    mysqli_close($db);

?>