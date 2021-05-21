var json;
centerMap = {lat:46.63886499344043,lng:2.4373620082870815};
var zoom = 5.6;

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;
  
    request.onreadystatechange = function() {
      if (request.readyState === 4 && request.status === 200) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };
  
    request.open('GET', url, true);
    request.send(null);
  }

downloadUrl('./api/lieu.php', function(data) { json  = JSON.parse(data.responseText);});

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: new google.maps.LatLng(centerMap.lat , centerMap.lng),
      zoom: zoom,
      disableDefaultUI: true,
    });
    json.forEach(element => {
        new google.maps.Marker({
            position: {lat: parseFloat(element.lat), lng: parseFloat(element.lng)},
            map,
            title: element.nom,
          });
    });
    
}
  
  
function doNothing() {}


function updateMap(){
 var ville = document.getElementById('ville').value;
 var type = document.getElementById('type').value;


  if ((ville === "0") == true && (type === "0") == true) {
    
    downloadUrl('./api/ville.php', function(data) { 
    centerMap = {lat:46.63886499344043,lng:2.4373620082870815};
    zoom = 5.6;
    });
    downloadUrl('./api/lieu.php', function(data) { json  = JSON.parse(data.responseText);initMap();});
  }else if ((ville === "0") == false && (type === "0") == false) {
    
    downloadUrl('./api/ville.php', function(data) { 
      villes  = JSON.parse(data.responseText);
      centerMap = {lat:villes[ville-1].lat,lng:villes[ville-1].lng};
      zoom = 12;
      });
      downloadUrl('./api/lieu.php?ville='+ville+'&typeLieu='+(parseInt(type)), function(data) { 
        json  = JSON.parse(data.responseText);
        initMap();
        
          $('#mypar').load('inc/views/caseLieu.inc.php', {
            jsonFile: json,
          });

      });
    
  }else if ((ville === "0") == false && (type === "0") == true) {
    
    downloadUrl('./api/ville.php', function(data) { 
    villes  = JSON.parse(data.responseText);
    centerMap = {lat:villes[ville-1].lat,lng:villes[ville-1].lng};
    zoom = 12;
    });
    downloadUrl('./api/lieu.php?ville='+ville, function(data) { json  = JSON.parse(data.responseText);initMap();});
    
  }else if ((ville === "0") == true && (type === "0") == false) {
    
    downloadUrl('./api/ville.php', function(data) { 
    centerMap = {lat:46.63886499344043,lng:2.4373620082870815};
    zoom = 5.6;
    });

  }
  downloadUrl('./api/lieu.php?typeLieu='+(parseInt(type)), function(data) { json  = JSON.parse(data.responseText);initMap();});

  
}
