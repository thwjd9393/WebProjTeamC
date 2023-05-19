<?php

//데이터 받기
$cmtyNo = (int)$_GET['cmtyNo'];

// 데이터 연결
$db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
mysqli_query($db, "set names utf8"); //한글깨짐 방지

// 쿼리문
$sql = "SELECT * FROM cCommunity ORDER BY cmtyNo DESC";

// 받아온 값 변수(result)에 저장
$result = mysqli_query($db, $sql);

$rowNum= mysqli_num_rows($result);

$rows=array();
for($i=0; $i<$rowNum; $i++){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $rows[$i] = $row; //빈 배열에 배열을 넣음 - 2차원 배열로 변경
}
echo json_encode($rows); //=> [{}, {}] 로 보임

//9.php 닫기
mysqli_close($db);
?>