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

document.getElementById("confirmBtn").addEventListener("click", function () {
    // 다른 HTML 페이지로 이동하는 코드를 추가합니다.
    window.location.href = "writePost.html";
});








