<?php

$cmtyNo = $_GET['cmtyNo'];

// 데이터베이스 연결 설정
$db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
mysqli_query($db, "set names utf8"); //한글깨짐 방지
// 연결 확인
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// 데이터 조회 쿼리 작성
$sql = "SELECT * FROM cCommunity WHERE cmtyNo = $cmtyNo";

// 데이터 조회 실행
$result = mysqli_query($db, $sql);

if ($result) {
    // 데이터가 존재하는 경우
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        // JSON 응답 생성
        echo json_encode($data);
    } else {
        // 데이터가 없는 경우
        echo "데이터가 존재하지 않습니다.";
    }
} else {
    // 데이터 조회 오류 발생
    echo "데이터 조회 중 오류가 발생하였습니다: " . mysqli_error($db);
}

// 데이터베이스 연결 종료
mysqli_close($db);
?>