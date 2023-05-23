<?php

    // POST 데이터 받아오기
    $cmtyNo = $_POST['cmtyNo'];
    $title = $_POST['cmtyTitle'];
    $contents = $_POST['cmtyContent'];
    $name = $_POST['cmtyNic'];
    $password = $_POST['cmtyPasswd'];

    echo $cmtyNo;

    // 사진 파일 업로드
    $file = $_FILES['cmtyImg'];
    $filename = $file['name'];
    $tmpName = $file['tmp_name']; //임시 저장소 위치

    $dstName = "";
    if (!empty($filename)) {
        $dstName = "../uploadImg/community/" . date('YmdHis') . $filename; // 영구 저장소 위치
        $allowedExtensions = ['jpg', 'png']; // 허용할 확장자 목록

        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); // 파일의 확장자 추출 후 소문자로 변환

        if (!in_array($extension, $allowedExtensions)) {
            echo "jpg 또는 png 파일만 업로드할 수 있습니다.";
            exit; // 업로드 오류 발생 시 코드 실행 중단
        } elseif (!move_uploaded_file($tmpName, $dstName)) {
            echo "파일 업로드 중 오류가 발생하였습니다.";
            exit; // 업로드 오류 발생 시 코드 실행 중단
        }
    }

    // 데이터베이스 연결 설정
    $db = mysqli_connect('localhost', 'mrhisj23', 'hi23bye6!', 'mrhisj23');
    mysqli_query($db, "set names utf8"); //한글깨짐 방지
    // 연결 확인
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // 데이터 업데이트 쿼리 작성
    $sql = "UPDATE cCommunity SET cmtyTitle = '$title', cmtyContent = '$contents', cmtyNic = '$name', cmtyPasswd = '$password', cmtyImg = '$dstName' WHERE cmtyNo = $cmtyNo";

    // 데이터 업데이트 실행
    if ($db->query($sql) === TRUE) {
        echo "<script>window.location.href ='http://mrhisj23.dothome.co.kr/WebProjTeamC/community.html';</script>";
    } else {
        echo "데이터 업데이트 중 오류가 발생하였습니다: " . $db->error;
    }

    // 데이터베이스 연결 종료
    $db->close();
?>