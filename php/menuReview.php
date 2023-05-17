<?php
    // header('Content-Type:application/json; charset=utf-8'); 

    //1.데이터 받기
    $mnuNo = (int)$_GET['mnuNo'];

    //2.데이터베이스 연결 설정
    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8"); //한글깨짐 방지
 
    //3.쿼리문
    $sql = "SELECT * FROM cMenuReview WHERE mnuNo=$mnuNo";
 
    $result = mysqli_query($db,$sql);
 
    //총 레코드 수
    $rowNum = mysqli_num_rows($result);
 
    //결과 받을 빈 배열
    $rows = array(); 
    for($i=0; $i<$rowNum; $i++){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 
        $rows[$i] = $row; //빈 배열에 배열을 넣음 - 2차원 배열로 변경
 
    }
    //곧바로 연관배열을 json 문법으로 변환하는 기능 있다 : json_encode
    echo json_encode($rows); //=> [{}, {}] 로 보임

    //5.php 닫기
    mysqli_close($db);

?>