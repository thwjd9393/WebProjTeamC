var mapContainer = document.getElementById('map');
var mapOption = {
    center: new kakao.maps.LatLng(33.450701, 126.570667),
    level: 3
};

var map = new kakao.maps.Map(mapContainer, mapOption);

var ps = new kakao.maps.services.Places();
var infowindow = new kakao.maps.InfoWindow({
    zIndex: 1
});

var markers=[]
function placesSearchCB(data, status, pagination) {
    if (status === kakao.maps.services.Status.OK) {
      
        removeMarkers()

        var bounds = new kakao.maps.LatLngBounds();

        for (var i = 0; i < data.length; i++) {
            displayMarker(data[i]);
            bounds.extend(new kakao.maps.LatLng(data[i].y, data[i].x));
        }

        map.setBounds(bounds); //마커 배열에 추가
    }
}



function displayMarker(place) {
    var marker = new kakao.maps.Marker({
        map: map,
        position: new kakao.maps.LatLng(place.y, place.x)
    });

    markers.push(marker)

    kakao.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent('<div style="padding:5px;font-size:12px;">' + place.place_name + '</div>');
        infowindow.open(map, marker);
    });
}

function removeMarkers(){
    for(var i=0; i<markers.length; i++){
        markers[i].setMap(null);
    }
    marker=[];
}

function submit() {
    var keyword = document.getElementById('place').value;
    ps.keywordSearch(keyword, placesSearchCB);
}
function handleSearch(event){
    if(event.keyCode==13){
        submit();
    }
}