<?php
    header("Content-Type: application/json; charset=utf-8");

    //1.데이터 받기
    $reviewNo= (int)$_POST['reviewNo'];
    $reviewPasswd2= $_POST['reviewPasswd'];

    // echo $reviewNo;
    // echo $reviewPasswd2;


    // 데이터 연결
    $db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
    mysqli_query($db, "set names utf8"); // 한글깨짐 방지

    // mysql에 조건을 걸어 해당 게시글을 작성한 사용자의 비밀번호를 가져옴
    $checkPasswordQuery = "SELECT reviewPasswd FROM cMenuReview WHERE reviewNo=$reviewNo";
    $checkPasswordResult = mysqli_query($db, $checkPasswordQuery);
    $checkResult = mysqli_fetch_assoc($checkPasswordResult);
    $storedPassword = $checkResult['reviewPasswd'];


    // $rows = array(); 
    
    if ($storedPassword == $reviewPasswd2) {

        //3. 쿼리문
        $sql = "SELECT * FROM cMenuReview WHERE reviewNo = $reviewNo";
    
        //4. 내 디비에 쿼리문 요청 보내고 받아온 응답 값 result 변수에 담기 
        $result = mysqli_query($db,$sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        echo json_encode($row);

    } else {
        // 실패시 추가
        $row = ['result'=>'false'];

        echo json_encode($row);
    }

    //8. 곧바로 연관배열을 json 문법으로 변환하는 기능 있다 : json_encode
    //echo json_encode($row);

    //데이터베이스 연결 종료
    mysqli_close($db);

?>