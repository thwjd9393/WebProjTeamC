<?php
header('Content-Type: application/json');

// 데이터 받기
$qaNo = (int)$_GET['qaNo'];
$qaPasswd = $_GET['qaPasswd'];

// 데이터 연결
$db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
mysqli_query($db, "set names utf8"); // 한글깨짐 방지

// mysql에 조건을 걸어 해당 게시글을 작성한 사용자의 비밀번호를 가져옴
$checkPasswordQuery = "SELECT qaPasswd FROM cQa WHERE qaNo=$qaNo";
$checkPasswordResult = mysqli_query($db, $checkPasswordQuery);
$row = mysqli_fetch_assoc($checkPasswordResult);
$storedPassword = $row['qaPasswd'];

if ($storedPassword == $qaPasswd) { 
    $response = array('success' => true);
} else {
    // 실패시 추가
    $response = array('success' => false, 'message' => '비밀번호가 일치하지 않습니다.');
}

// 응답 전송
echo json_encode($response);

// 데이터베이스 연결 종료
mysqli_close($db);
?>