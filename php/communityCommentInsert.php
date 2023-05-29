<?php

header("Content-Type: text/plain; charset=utf-8");

// 데이터 받기
// POST 방식으로

$cmtNic = $_POST['cmtNic'];
$cmtPasswd = $_POST['cmtPasswd'];
$cmtContent = $_POST['cmtContent'];
$cmtyNo = (int)$_POST['cmtyNo'];

$cmtContent = addslashes($cmtContent);

$db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
mysqli_query($db, "set names utf8"); // 한글깨짐 방지

// sql 문으로 해당 항목 값 넣기
$sql = "INSERT INTO cComment (cmtNic, cmtPasswd, cmtContent, cmtDate, cmtyNo) VALUES ('$cmtNic', '$cmtPasswd', '$cmtContent', NOW(), '$cmtyNo')";

$result = mysqli_query($db, $sql);
echo $result;
if ($result) {
    echo "응답 성공";
} else {
    echo "등록 실패";
}
//sql 닫기
mysqli_close($db);

?>
