<?php
    header("Content-Type:text/plain; charset=utf-8");

    //1.데이터 받기
    $reviewNic = $_POST['reviewNic'];
    $reviewPasswd = $_POST['reviewPasswd'];
    $reviewContent = $_POST['reviewContent'];
    $reviewNo = (int)$_POST['reviewNo'];

    //1-1 ) 데이터 이미지 받기
    $file = $_FILES['reviewImg'];
    $tmpName = $file['tmp_name']; //임시 저장소 위치
    $filename = $file['name']; 

    if($file != "" || $file != null){
        //임시 저장소에 있는 이미지를 영구저장소 위치로 이동
        $dstName = "../uploadImg/menu_review/".date('YmdHis').$filename;
        $result = move_uploaded_file($tmpName, $dstName);
    }

    $reviewContent= addslashes($reviewContent); // 슬래시가 필요한 곳에 알아서 넣어짐
    
    //2.데이터베이스 연결 설정
    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8"); //한글깨짐 방지
 
    //3.쿼리문
    $sql = "UPDATE cMenuReview SET reviewNic = '$reviewNic',reviewPasswd='$reviewPasswd', reviewContent='$reviewContent', reviewImg='$reviewImg' WHERE reviewNo=$reviewNo";

 
    //4. 내 디비에 쿼리문 요청 보내고 받아온 응답 값 result 변수에 담기 
    $result = mysqli_query($db,$sql);

    echo "$result";
 
    //5.응답
    // if($result) echo "" . $db -> insert_id; 
    // else echo "게시글 업로드에 실패했습니다";
    if($result) echo "등록 성공"; 
    else echo "등록 실패";

    //6.php 닫기
    mysqli_close($db);

?>