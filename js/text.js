const latDefaut = 46.62423629785034;
const lngDefaut = 2.4361340279539414;
const zoomDefaut = 5.6;

function ajouterMarker(lat, lng, map, icon){

    const marker = new google.maps.Marker({
        position: { lat: lat, lng: lng },
        map: map,
        icon:'img/iconsLieu/'+icon
      });
    console.log('img/iconsLieu/'+icon);
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
    xhttp.open("GET", "http://localhost:8888/cityQuest/api/"+requete, false);
    xhttp.send();

    return JSON.parse(xhttp.responseText);
}

function afficherResultats(resultats){
    $('#mypar').load('inc/views/caseLieu.inc.php', {
        jsonFile: resultats,
      });
}

console.log();
function afficherPoints(ville,type,map){
    if ((ville === "0") == false && (type === "0") == false) {
        recuperationJSON("lieu.php?ville="+ville+"&typeLieu="+type).forEach(lieu => {
            ajouterMarker(parseFloat(lieu.lat), parseFloat(lieu.lng),map,recuperationJSON("typelieu.php")[parseInt(lieu.typeLieu)-1].icone);
        });
        var infoVille = recuperationJSON("ville.php")[ville-1]
        definirCentre(parseFloat(infoVille.lat), parseFloat(infoVille.lng), 12, map);
    }else if ((ville === "0") == false && (type === "0") == true) {
        recuperationJSON("lieu.php?ville="+ville).forEach(lieu => {
            ajouterMarker(parseFloat(lieu.lat), parseFloat(lieu.lng),map,recuperationJSON("typelieu.php")[parseInt(lieu.typeLieu)-1].icone);
        });
        var infoVille = recuperationJSON("ville.php")[ville-1]
        definirCentre(parseFloat(infoVille.lat), parseFloat(infoVille.lng), 12, map);
        afficherResultats(recuperationJSON("lieu.php?ville="+ville));
    }else if ((ville === "0") == true && (type === "0") == false) {
        recuperationJSON("lieu.php?typeLieu="+type).forEach(lieu => {
            ajouterMarker(parseFloat(lieu.lat), parseFloat(lieu.lng),map,recuperationJSON("typelieu.php")[parseInt(lieu.typeLieu)-1].icone);
        });
        definirCentre(latDefaut, lngDefaut, zoomDefaut, map);
        afficherResultats(recuperationJSON("lieu.php?typeLieu="+type));
    }else if ((ville === "0") == true && (type === "0") == true) {
        recuperationJSON("lieu.php").forEach(lieu => {
            ajouterMarker(parseFloat(lieu.lat), parseFloat(lieu.lng),map,recuperationJSON("typelieu.php")[parseInt(lieu.typeLieu)-1].icone);
        });
        definirCentre(latDefaut, lngDefaut, zoomDefaut, map);
        afficherResultats(recuperationJSON("lieu.php"));
    }
}



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

