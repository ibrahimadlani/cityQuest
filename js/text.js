const latDefaut = 46.62423629785034;
const lngDefaut = 2.4361340279539414;
const zoomDefaut = 5.6;

function ajouterMarker(lat, lng, map, icon){

    var marker = new google.maps.Marker({
        position: { lat: lat, lng: lng },
        map: map,
        icon:'img/iconsLieu/'+icon
      });

      return marker;
}

function definirCentre(lat, lng, zoom, map){
    map.setZoom(zoom);
    map.setCenter({lat: lat, lng: lng});
}


function recuperationJSON(requete){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function test() {
      if (this.readyState == 4 && this.status == 200) {
        return this.responseText;
      }
    };
    xhttp.open("GET", requete, false);
    xhttp.send();

    return JSON.parse(xhttp.responseText);
}

function afficherResultats(resultats){
    $('#mypar').load('inc/views/caseLieu.inc.php', {
        jsonFile: resultats,
      });
}

function afficherPoints(ville,type,map){
    if ((ville === "0") == false && (type === "0") == false) {
        recuperationJSON("http://localhost:8888/cityQuest/api/lieu.php?ville="+ville+"&typeLieu="+type).forEach(lieu => {
            var marker = ajouterMarker(parseFloat(lieu.lat), parseFloat(lieu.lng),map,recuperationJSON("http://localhost:8888/cityQuest/api/typelieu.php")[parseInt(lieu.typeLieu)-1].icone);
            marker.addListener("click", () => {
                document.getElementById(lieu.id).scrollIntoView({behavior: "smooth", block: "start"});
                document.getElementById(lieu.id).style.boxShadow = "0px 0px 31px grey" ;
              });
        });
        var infoVille = recuperationJSON("http://localhost:8888/cityQuest/api/ville.php")[ville-1]
        definirCentre(parseFloat(infoVille.lat), parseFloat(infoVille.lng), 12, map);
    }else if ((ville === "0") == false && (type === "0") == true) {
        recuperationJSON("http://localhost:8888/cityQuest/api/lieu.php?ville="+ville).forEach(lieu => {
            var marker = ajouterMarker(parseFloat(lieu.lat), parseFloat(lieu.lng),map,recuperationJSON("http://localhost:8888/cityQuest/api/typelieu.php")[parseInt(lieu.typeLieu)-1].icone);
            marker.addListener("click", () => {
                document.getElementById(lieu.id).scrollIntoView({behavior: "smooth", block: "start"});
                document.getElementById(lieu.id).style.boxShadow = "0px 0px 31px grey" ;
              });
        });
        var infoVille = recuperationJSON("http://localhost:8888/cityQuest/api/ville.php")[ville-1]
        definirCentre(parseFloat(infoVille.lat), parseFloat(infoVille.lng), 12, map);
        afficherResultats(recuperationJSON("http://localhost:8888/cityQuest/api/lieu.php?ville="+ville));
    }else if ((ville === "0") == true && (type === "0") == false) {
        recuperationJSON("http://localhost:8888/cityQuest/api/lieu.php?typeLieu="+type).forEach(lieu => {
            var marker = ajouterMarker(parseFloat(lieu.lat), parseFloat(lieu.lng),map,recuperationJSON("http://localhost:8888/cityQuest/api/typelieu.php")[parseInt(lieu.typeLieu)-1].icone);
            marker.addListener("click", () => {
                document.getElementById(lieu.id).scrollIntoView({behavior: "smooth", block: "start"});
                document.getElementById(lieu.id).style.boxShadow = "0px 0px 31px grey" ;
              });
        });
        definirCentre(latDefaut, lngDefaut, zoomDefaut, map);
        afficherResultats(recuperationJSON("http://localhost:8888/cityQuest/api/lieu.php?typeLieu="+type));
    }else if ((ville === "0") == true && (type === "0") == true) {
        recuperationJSON("http://localhost:8888/cityQuest/api/lieu.php").forEach(lieu => {
            var marker = ajouterMarker(parseFloat(lieu.lat), parseFloat(lieu.lng),map,recuperationJSON("http://localhost:8888/cityQuest/api/typelieu.php")[parseInt(lieu.typeLieu)-1].icone);
            marker.addListener("click", () => {
                document.getElementById(lieu.id).scrollIntoView({behavior: "smooth", block: "start"});
                document.getElementById(lieu.id).style.boxShadow = "0px 0px 31px grey" ;
              });
        });
        definirCentre(latDefaut, lngDefaut, zoomDefaut, map);
        afficherResultats(recuperationJSON("http://localhost:8888/cityQuest/api/lieu.php"));
        
    }
}

let service;

function initMap(ville,type) {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: latDefaut, lng: lngDefaut},
        zoom: zoomDefaut,
        mapId: '6b985e72b5f5f6c1',
        disableDefaultUI: true,
    });
    
    var ville = document.getElementById('ville').value;
    var type = document.getElementById('type').value;

    afficherPoints(ville,type,map);
    


  }
  console.log();
 function recupererAdresse(){
    var json = recuperationJSON('https://maps.googleapis.com/maps/api/geocode/json?address='+encodeURIComponent(document.getElementById('rechercheGoogleAPI').value)+'&key=AIzaSyDPddKexH8VgK3ORDbfuxpcdNFwwcjg5GI');
    $('#resultats').load('inc/views/caseAdresse.inc.php', {
        jsonFile: json,
      });
 }


  $(document).ready(function(){
	$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
});