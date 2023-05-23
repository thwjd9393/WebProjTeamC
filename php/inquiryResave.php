<?php
    header('Content-Type:application/json; charset=utf-8'); 

    // 데이터 받기
    $qaNo=$_POST['no']
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
    
    $sql = "UPDATE cQa SET qaTitle = $qaIitle WHERE qaNo = $qaNo";
    // 쿼리문
 
    // 실행
    $result = mysqli_query($db, $sql);

    

    // php 닫기
    mysqli_close($db);

?>