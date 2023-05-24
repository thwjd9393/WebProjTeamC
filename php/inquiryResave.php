<?php
    header('Location: http://mrhisj23.dothome.co.kr/WebProjTeamC/inquiry-list.html');

    // 데이터 받기
    $qaNo=(int)$_POST['no'];

    $qaNic=$_POST['name'];
    $qaPasswd=$_POST['password'];
    $qaType=$_POST['type'];
    $qaTitle=$_POST['title'];
    $qaContent=$_POST['context'];
    $qaImg=$_POST['image'];
    $qaDate= date('Y-m-d', time());

    // 데이터베이스 연결 설정
    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8"); //한글깨짐 방지
    

    //"UPDATE mUser SET passwd ='$passwd',nicname='$nicname',profileImg='$dstName' WHERE userNo = $userNo";
    $sql = "UPDATE cQa SET qaNic='$qaNic',qaPasswd='$qaPasswd',qaTitle = '$qaTitle',qaContent='$qaContent',qaImg='$qaImg' WHERE qaNo = $qaNo";
    // 쿼리문
 
    // 실행
    $result = mysqli_query($db, $sql);

    // if($result) echo "<script>location.href='http://mrhisj23.dothome.co.kr/WebProjTeamC/inquiry-list.html'</script>";
    // else echo "등록 실패";

    // php 닫기
    mysqli_close($db);

?>