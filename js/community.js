function loadPostList() {

    //글번호 찾아오기
    // const cmtNo = document.getElementById('cmtyNo').innerHTML;

    // console.log('cmtyNo');

    //연동할 주소
    var url = `http://mrhisj23.dothome.co.kr/WebProjTeamC/php/community.php`;

    // 안드로이드의 레트로핏이랑 같은 아이 - 네트워크 연결
    fetch(url)
        .then(response => response.json())
        .then(data =>

            //포문이 then문 안에서는 동작하지 않음
            // 그래서 외부함수에 응답받은 data 값 매개변수로 전달
            // displayPostList(data)
            displayPostList(data)

            // console.log(data)
        ).catch(error => console.log(error))
    // console.log(data)
}

// function changeDate(date){
//     //16 February 2020
//     var dt=date.sprit(" ")[0];
//     var year=dt.sprit("-")[0];
//     var month=dt.sprit("-")[1];
//     var day=dt.sprit("-")[2];
//     if(month===12){
//         month="december"
//     }else if(month===11){
//         month="november"
//     }else if(month==10){
//         month="october"
//     }else if(month===9){
//         month="september"
//     }
//     else if(month===8){
//         month="august"
//     }
//     else if(month===7){
//         month="july"
//     }
//     else if(month===6){
//         month="june"
//     }else if(month===5){
//         month="may"
//     }else if(month===4){
//         month="april"
//     }
//     else if(month===3){
//         month="march"
//     }else if(month===2){
//         month="february"
//     }else if(month===1){
//         month="january"
//     }
//     return `${day} ${month} ${year}`

// }

function displayPostList(data) {
    // const poi=document.querySelector('postitem');
    const poi = document.getElementById('postitem');

    // data.forEach(e =>{
    //     poi.innerHTML +=`<div class="col-lg-4 col-md-6 col-sm-6">
    //         <div class="blog__item">
    //             <div id="cmtyNo" style="display:none">
    //             <div class="blog__item__pic set-bg" data-setbg="${e.cmtyImg}"></div>
    //             <div class="blog__item__text">
    //                 <span><img src="img/icon/calendar.png" alt="">${changeDate(e.cmtyDate)}</span>
    //                 <h5>${e.cmtyTitle}</h5>
    //                 <a href="./community-post.html">Read More</a>
    //             </div>
    //         </div>
    //     </div>`
    // })

    data.forEach(e => {
        poi.innerHTML += `<div class="col-lg-4 col-md-6 col-sm-6">
            <div class="blog__item " id="imgcontainer>
                <div id="cmtyNo" style="display:none">${e.cmtyNo}</div>
                <img class="blog__item__pic" src="${e.cmtyImg}" alt="${e.cmtyImg}">
                <div class="blog_item_text">
                    <span><img src="img/icon/calendar.png" alt="">${e.cmtyDate}</span>
                    <h5>${e.cmtyTitle}</h5>
                    <a href="./community-post.html">Read More</a>
                </div>
            </div>
        </div>` 

        
    })
}

// url(.${e.cmtyImg})


// <div class="col-lg-4 col-md-6 col-sm-6">
//             <div class="blog__item">
//                 <div class="blog__item__pic set-bg"data-setbg="img/blog/blog-9.jpg"></div>
//                 <div class="blog__item__text">
//                     <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
//                     <h5>Lasik Eye Surgery Are You Ready</h5>
//                     <a href="./community-post.html">Read More</a>
//                 </div>
//             </div>
//         </div>



// 페이지 로드 시 loadMemberList 함수 호출
window.onload = loadPostList();