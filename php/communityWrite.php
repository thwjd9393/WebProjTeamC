<?php
// 데이터베이스 연결 설정
$db = mysqli_connect('localhost', 'vasco1379', 'chldydtjr159!', 'vasco1379');

// 연결 확인
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// POST 데이터 받아오기
$title = $_POST['title'];
$contents = $_POST['contents'];
$name = $_POST['name'];
$password = $_POST['password'];
$date = date("YmdHis"); // 현재 날짜시간 가져오기

// 사진 파일 업로드
$file = $_FILES['image'];
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
    echo "사진 업로드 실패";
}

// 데이터 삽입 쿼리 작성
$sql = "INSERT INTO community (no, title, contents, name, password, date, image, like_ctn, comment) VALUES (null, '$title', '$contents', '$name', '$password', '$date', '$dstName', 0, 0)";

// 데이터 삽입 실행
if ($db->query($sql) === TRUE) {
   
} else {
    echo "데이터 삽입 중 오류가 발생하였습니다: " . $db->error;
}

// 데이터베이스 연결 종료
$db->close();
?>