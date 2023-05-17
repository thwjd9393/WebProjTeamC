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
        alert('게시글 추천을 취소하였습니다.');
    }
}


function fun_repost() {
    var password = prompt('게시글을 수정 하려면 비밀번호를 입력해주세요.')
    if (password) {
        // 확인 버튼을 클릭한 경우
        alert('게시글을 수정합니다.');
        // 게시글 작성 페이지로 이동
        window.location.href = 'http://vasco1379.dothome.co.kr/WebProjectTeamC/writepost.html';
    } else {
        // 취소 버튼을 클릭한 경우
        alert('수정이 취소되었습니다.');
    }
}

function fun_delete() {
    var password = prompt('게시글을 삭제하려면 비밀번호를 입력해주세요.')

    if (password) {
        // 확인 버튼을 클릭한 경우
        alert('게시글이 삭제되었습니다.');
        // 삭제 로직을 추가하세요
    } else {
        // 취소 버튼을 클릭한 경우
        alert('삭제가 취소되었습니다.');
    }
}