<?php
// 데이터베이스 연결 설정
$db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
mysqli_query($db, "set names utf8"); //한글깨짐 방지
// 연결 확인
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// POST 데이터 받아오기
$title = $_POST['cmtyTitle'];
$contents = $_POST['cmtyContent'];
$name = $_POST['cmtyNic'];
$password = $_POST['cmtyPasswd'];


// 사진 파일 업로드
$file = $_FILES['cmtyImg'];
$filename = $file['name'];
$tmpName = $file['tmp_name'];
$dstName = "./uploadimg/" . date('YmdHis') . $filename;
$allowedExtensions = ['jpg', 'png']; // 허용할 확장자 목록

$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); // 파일의 확장자 추출 후 소문자로 변환

if (!in_array($extension, $allowedExtensions)) {
    echo "jpg 또는 png 파일만 업로드할 수 있습니다.";
} elseif (move_uploaded_file($tmpName, $dstName)) {
    
    // 데이터 삽입 로직을 추가해야 함
} else {
   
}

// 데이터 삽입 쿼리 작성
$sql = "INSERT INTO cCommunity (cmtyTitle, cmtyContent, cmtyNic, cmtyPasswd, cmtyDate, cmtyImg, cmtyLikeCnt) VALUES ('$title', '$contents', '$name', '$password', NOW(), '$dstName', 0)";

// 데이터 삽입 실행
if ($db->query($sql) === TRUE) {
    echo "데이터가 성공적으로 삽입되었습니다.";
} else {
    echo "데이터 삽입 중 오류가 발생하였습니다: " . $db->error;
}

// 데이터베이스 연결 종료
$db->close();
?>