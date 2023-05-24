<?php
    header("Content-Type:text/plain; charset=utf-8");
    // header("Content-Type: application/json; charset=utf-8");

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
    $row = mysqli_fetch_assoc($checkPasswordResult);
    $storedPassword = $row['reviewPasswd'];


    if ($storedPassword == $reviewPasswd2) {
        // 게시글과 댓글 번호 대조 검증 및 삭제 기능 
        $deletReview = "DELETE FROM cMenuReview WHERE reviewNo=$reviewNo";

        mysqli_query($db, $deletReview);

        // $response = array('success' => true);
        echo "성공";
    } else {
        // 실패시 추가
        // $response = array('success' => false);
        echo "실패";
    }

    //응답 전송
    // echo json_encode($response);

    //데이터베이스 연결 종료
    mysqli_close($db);

?>