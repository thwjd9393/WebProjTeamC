<?php
    header("Content-Type:text/plain; charset=utf-8");

    //1.데이터 받기
    //$reviewNic = $_GET['reviewNic'];
    $reviewNic = $_POST['reviewNic'];
    $reviewPasswd = $_POST['reviewPasswd'];
    $reviewContent = $_POST['reviewContent'];
    $mnuNo = (int)$_POST['mnuNo'];

    //1-1 ) 데이터 이미지 받기
    $file = $_FILES['reviewImg'];
    $tmpName = $file['tmp_name']; //임시 저장소 위치
    $filename = $file['name']; 

    // echo "aaaa";
    // echo "$reviewNic";
    // echo "$reviewPasswd";
    // echo "$reviewContent";

    if($tmpName != "" || $tmpName != null){
        $allowedExtensions = ['jpg', 'png']; // 허용할 확장자 목록
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); // 파일의 확장자 추출 후 소문자로 변환

        if (!in_array($extension, $allowedExtensions)) {
            echo "jpg 또는 png 파일만 업로드할 수 있습니다.";
            return;
        }
        
        //임시 저장소에 있는 이미지를 영구저장소 위치로 이동
        $dstName = "./uploadImg/".date('YmdHis').$filename;
        $result = move_uploaded_file($tmpName, $dstName);
    }

    $reviewContent= addslashes($reviewContent); // 슬래시가 필요한 곳에 알아서 넣어짐
    
    //2.데이터베이스 연결 설정
    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8"); //한글깨짐 방지
 
    //3.쿼리문
    $sql = "INSERT INTO cMenuReview (reviewNic, reviewPasswd, reviewContent, reviewImg, mnuNo) 
        VALUES ('$reviewNic','$reviewPasswd','$reviewContent','$dstName','$mnuNo')";

 
    //4. 내 디비에 쿼리문 요청 보내고 받아온 응답 값 result 변수에 담기 
    $result = mysqli_query($db,$sql);

    echo "$result";
 
    //5.응답
    // if($result) echo "" . $db -> insert_id; 
    // else echo "게시글 업로드에 실패했습니다";
    if($result) echo "등록 성공"; 
    else echo "등록 실패.$result";

    //6.php 닫기
    mysqli_close($db);

?>