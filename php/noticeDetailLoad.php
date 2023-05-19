<?php
    // header('Content-Type:application/json; charset=utf-8'); 

    //1.데이터 받기
    $ntcNo = (int)$_GET['ntcNo']; 

    //2.데이터베이스 연결 설정
    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8"); //한글깨짐 방지
 
    //3.쿼리문
    $sql = "SELECT * FROM cNotice WHERE ntcNo=$ntcNo";
 
    //4. 내 디비에 쿼리문 요청 보내고 받아온 응답 값 result 변수에 담기 
    $result = mysqli_query($db,$sql);
 
    //5. 총 레코드 수
    $rowNum = mysqli_num_rows($result);
 
    //6.결과 값 넣을 빈 배열 준비
    $rows = array(); 
    //7. 총 레코드 수 만큼 for문을 돌려 배열에 넣어주기
    for($i=0; $i<$rowNum; $i++){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $rows[$i] = $row; //빈 배열에 배열을 넣음 - 2차원 배열로 변경
    }

    //8. 곧바로 연관배열을 json 문법으로 변환하는 기능 있다 : json_encode
    echo json_encode($rows); //=> [{}, {}] 로 보임

    //9.php 닫기
    mysqli_close($db);

?>