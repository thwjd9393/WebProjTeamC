function check_ctn() {
    var result = confirm('게시글을 추천 하시겠습니까?');
    if (result) {
        alert('게시글을 추천 하였습니다.');
        // <h2> 요소의 값 증가
        var likeCountElement = document.getElementById('likeCount');
        var likeCount = parseInt(likeCountElement.innerText);
        likeCount++;
        likeCountElement.innerText = likeCount;
    } else {
       
    }
}










