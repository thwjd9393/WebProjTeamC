<?php
  header("Content-Type:application/json; charset=utf-8");

// // 데이터 받기
// $cmtyNo= (int)$_GET['cmtyNo'];
// $cmtyPasswd= $_GET['cmtyPasswd'];

// // echo $cmtyNo;
// // echo $cmtyPasswd;

// // 데이터 연결
// $db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
// mysqli_query($db, "set names utf8"); // 한글깨짐 방지

// // mysql에 조건을 걸어 해당 게시글을 작성한 사용자의 비밀번호와 이미지를 가져옴
// $checkPasswordQuery = "SELECT cmtyPasswd, cmtyImg FROM cCommunity WHERE cmtyNo=$cmtyNo";
// $checkPasswordResult = mysqli_query($db, $checkPasswordQuery);
// $row = mysqli_fetch_assoc($checkPasswordResult);
// $storedPassword = $row['cmtyPasswd'];
// $cmtyImg = $row['cmtyImg'];

// if ($storedPassword == $cmtyPasswd) {
//     // 비밀번호가 일치하는 경우, 데이터와 이미지를 게시글 작성 페이지로 전달
//     $getPostDataQuery = "SELECT * FROM cCommunity WHERE cmtyNo=$cmtyNo";
//     $postDataResult = mysqli_query($db, $getPostDataQuery);
//     $postData = mysqli_fetch_assoc($postDataResult);
    
//     // 데이터와 이미지를 함께 전달할 배열 생성
//     $dataToPass = array(
//         'cmtyNo' => $postData['cmtyNo'],
//         'cmtyNic'=> $postData['cmtyNic'],
//         'cmtyPasswd'=> $postData['cmtyPasswd'],
        
//         'cmtyTitle' => $postData['cmtyTitle'],
//         'cmtyContent' => $postData['cmtyContent'],
//         'cmtyImg' => $cmtyImg
        
//     );
    
//     // 응답 전송
//     echo json_encode($dataToPass);
//     $response = array('success' => true);
// } else {
//     // 비밀번호가 일치하지 않는 경우
//     $response = array('success' => false, 'message' => '비밀번호가 일치하지 않습니다.');

//     // 응답 전송
//     echo json_encode($response);
// }

// // 데이터베이스 연결 종료
//  mysqli_close($db);



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
    // 비밀번호가 일치하는 경우
    $response = array('success' => true, 'cmtyNo' => $cmtyNo);
} else {
    // 비밀번호가 일치하지 않는 경우
    $response = array('success' => false, 'message' => '비밀번호가 일치하지 않습니다.');
}

// 응답 전송
header('Content-Type: application/json');
echo json_encode($response);

// 데이터베이스 연결 종료
mysqli_close($db);
?>



