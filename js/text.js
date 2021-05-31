const latDefaut = 46.62423629785034;
const lngDefaut = 2.4361340279539414;
const zoomDefaut = 5.6;

function ajouterMarker(lat, lng, map, icon) {
  var marker = new google.maps.Marker({
    position: { lat: lat, lng: lng },
    map: map,
    icon: "img/iconsLieu/" + icon,
  });

  return marker;
}

// Recentre la carte sur des coordoonnée a un certain zoom
function definirCentre(lat, lng, zoom, map) {
  map.setZoom(zoom);
  map.setCenter({ lat: lat, lng: lng });
}

// Transforme un requete AJAX en un objet JSON
function recuperationJSON(requete) {
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

// Affichage (rafraichissement) des cases Lieu sur la page carte.php
function afficherResultats(resultats) {
  $("#resultatRecherche").load("inc/views/caseLieu.inc.php", {
    jsonFile: resultats,
  });
}

// Crée un point sur la map
function afficherPoints(ville, type, map) {
  if ((ville === "0") == false && (type === "0") == false) {
    console.log(1);
    recuperationJSON(
      "http://localhost:8888/cityQuest/api/lieu.php?ville=" +
        ville +
        "&typeLieu=" +
        type
    ).forEach((lieu) => {
      var marker = ajouterMarker(
        parseFloat(lieu.lat),
        parseFloat(lieu.lng),
        map,
        recuperationJSON("http://localhost:8888/cityQuest/api/typelieu.php")[
          parseInt(lieu.typeLieu) - 1
        ].icone
      );
      marker.addListener("click", () => {
        document
          .getElementById(lieu.id)
          .scrollIntoView({ behavior: "smooth", block: "start" });
        document.getElementById(lieu.id).style.boxShadow = "0px 0px 31px grey";
      });
    });
    var infoVille = recuperationJSON(
      "http://localhost:8888/cityQuest/api/ville.php"
    )[ville - 1];
    definirCentre(
      parseFloat(infoVille.lat),
      parseFloat(infoVille.lng),
      12,
      map
    );
    afficherResultats(
      recuperationJSON(
        "http://localhost:8888/cityQuest/api/lieu.php?ville=" +
          ville +
          "&typeLieu=" +
          type
      )
    );
  } else if ((ville === "0") == false && (type === "0") == true) {
    recuperationJSON(
      "http://localhost:8888/cityQuest/api/lieu.php?ville=" + ville
    ).forEach((lieu) => {
      var marker = ajouterMarker(
        parseFloat(lieu.lat),
        parseFloat(lieu.lng),
        map,
        recuperationJSON("http://localhost:8888/cityQuest/api/typelieu.php")[
          parseInt(lieu.typeLieu) - 1
        ].icone
      );
      marker.addListener("click", () => {
        document
          .getElementById(lieu.id)
          .scrollIntoView({ behavior: "smooth", block: "start" });
        document.getElementById(lieu.id).style.boxShadow = "0px 0px 31px grey";
      });
    });
    var infoVille = recuperationJSON(
      "http://localhost:8888/cityQuest/api/ville.php"
    )[ville - 1];
    definirCentre(
      parseFloat(infoVille.lat),
      parseFloat(infoVille.lng),
      12,
      map
    );
    afficherResultats(
      recuperationJSON(
        "http://localhost:8888/cityQuest/api/lieu.php?ville=" + ville
      )
    );
  } else if ((ville === "0") == true && (type === "0") == false) {
    recuperationJSON(
      "http://localhost:8888/cityQuest/api/lieu.php?typeLieu=" + type
    ).forEach((lieu) => {
      var marker = ajouterMarker(
        parseFloat(lieu.lat),
        parseFloat(lieu.lng),
        map,
        recuperationJSON("http://localhost:8888/cityQuest/api/typelieu.php")[
          parseInt(lieu.typeLieu) - 1
        ].icone
      );
      marker.addListener("click", () => {
        document
          .getElementById(lieu.id)
          .scrollIntoView({ behavior: "smooth", block: "start" });
        document.getElementById(lieu.id).style.boxShadow = "0px 0px 31px grey";
      });
    });
    definirCentre(latDefaut, lngDefaut, zoomDefaut, map);
    afficherResultats(
      recuperationJSON(
        "http://localhost:8888/cityQuest/api/lieu.php?typeLieu=" + type
      )
    );
  } else if ((ville === "0") == true && (type === "0") == true) {
    recuperationJSON("http://localhost:8888/cityQuest/api/lieu.php").forEach(
      (lieu) => {
        var marker = ajouterMarker(
          parseFloat(lieu.lat),
          parseFloat(lieu.lng),
          map,
          recuperationJSON("http://localhost:8888/cityQuest/api/typelieu.php")[
            parseInt(lieu.typeLieu) - 1
          ].icone
        );
        marker.addListener("click", () => {
          document
            .getElementById(lieu.id)
            .scrollIntoView({ behavior: "smooth", block: "start" });
          document.getElementById(lieu.id).style.boxShadow =
            "0px 0px 31px grey";
        });
      }
    );
    definirCentre(latDefaut, lngDefaut, zoomDefaut, map);
    afficherResultats(
      recuperationJSON("http://localhost:8888/cityQuest/api/lieu.php")
    );
  }
}

// Initialise (rafraichît) la map
function initMap(ville, type) {
  var map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: latDefaut, lng: lngDefaut },
    zoom: zoomDefaut,
    mapId: "34fdf6f4bce154c0",
    disableDefaultUI: true,
  });

  var ville = document.getElementById("ville").value;
  var type = document.getElementById("type").value;

  afficherPoints(ville, type, map);
}

function recupererAdresse() { //Exporter la récupération des infos google map dans une autre fonction pour pouvoir réutiliser
  var json = recuperationJSON(
    "https://maps.googleapis.com/maps/api/geocode/json?address=" +
      encodeURIComponent(
        document
          .getElementById("rechercheGoogleAPI")
          .value.normalize("NFD")
          .replace(/[\u0300-\u036f]/g, "")
      ) +
      "&key=AIzaSyDPddKexH8VgK3ORDbfuxpcdNFwwcjg5GI"
  );
  $("#fenetreAjouter").load("inc/views/caseAdresse.inc.php", {
    jsonFile: json,
    typesLieu: recuperationJSON(
      "http://localhost:8888/cityQuest/api/typelieu.php"
    )
  });
}

function addLieuBDD(
  nom,
  description,
  presentation,
  adresse,
  latitude,
  longitude,
  ville,
  typeLieu,
  auteur
) {
  $.post("http://localhost:8888/cityQuest/inc/ajouterLieu.inc.php", {
    nom: nom,
    description: description,
    presentation: presentation,
    adresse: adresse,
    latitude: latitude,
    longitude: longitude,
    ville: ville,
    typeLieu: typeLieu,
    auteur: auteur,
  });
  initMap();
}

function addVilleIfNotExistsBDD(nom) { //Rajouter une vérification par le place_id google map qu'on enregistrerais dans la bdd
  $.post(
      "http://localhost:8888/cityQuest/inc/ajouterVilleSiNonExistante.inc.php",
      {
        nom: nom
      },
      function (data) {
        return data;
      }
  );
  /*initMap();*/ //Pas d'initialisation de la map puisque la ville n'est pas validée donc n'apparaitra pas
}

$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $("#back-to-top").fadeIn();
    } else {
      $("#back-to-top").fadeOut();
    }
  });
  // scroll body to 0px on click
  $("#back-to-top").click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      400
    );
    return false;
  });
});

function seDeclarerProprietaire(idLieu) {
  $.post("http://localhost:8888/cityQuest/inc/ajouterProprietaire.inc.php", {
    idLieu: idLieu,
  });
}
