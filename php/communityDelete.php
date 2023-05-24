<?php

// 데이터 받기
$cmtyNo = (int)$_GET['cmtyNo'];
$cmtyPasswd = $_GET['cmtyPasswd'];

// 데이터 연결
$db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
mysqli_query($db, "set names utf8"); // 한글깨짐 방지

// mysql에 조건을 걸어 해당 게시글을 작성한 사용자의 비밀번호를 가져옴
$checkPasswordQuery = "SELECT cmtyPasswd FROM cCommunity WHERE cmtyNo=$cmtyNo";
$checkPasswordResult = mysqli_query($db, $checkPasswordQuery);
$row = mysqli_fetch_assoc($checkPasswordResult);
$storedPassword = $row['cmtyPasswd'];

if ($storedPassword == $cmtyPasswd) {
    // 게시글과 댓글 번호 대조 검증 및 삭제 기능 
    $deletePost = "DELETE FROM cCommunity WHERE cmtyNo=$cmtyNo";
    $deleteComment = "DELETE FROM cComment WHERE cmtyNo=$cmtyNo";

    mysqli_query($db, $deletePost);
    mysqli_query($db, $deleteComment);

    $response = array('success' => true);
} else {
    // 실패시 추가
    $response = array('success' => false, 'message' => '비밀번호가 일치하지 않습니다.');
}

// 응답 전송
header('Content-Type: application/json');
echo json_encode($response);

// 데이터베이스 연결 종료
mysqli_close($db);
?>