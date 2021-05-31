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
      "./api/lieu.php?ville=" +
        ville +
        "&typeLieu=" +
        type
    ).forEach((lieu) => {
      var marker = ajouterMarker(
        parseFloat(lieu.lat),
        parseFloat(lieu.lng),
        map,
        recuperationJSON("./api/typelieu.php")[
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

    let infoVille;
    let infoVilles = recuperationJSON(
        "./api/ville.php"
    )
    for (let item in infoVilles) {
      if (infoVilles[item]['id'] == ville) {
        infoVille = infoVilles[item];
        break;
      }
    }

    definirCentre(
      parseFloat(infoVille.lat),
      parseFloat(infoVille.lng),
      12,
      map
    );
    afficherResultats(
      recuperationJSON(
        "./api/lieu.php?ville=" +
          ville +
          "&typeLieu=" +
          type
      )
    );
  } else if ((ville === "0") == false && (type === "0") == true) {
    recuperationJSON(
      "./api/lieu.php?ville=" + ville
    ).forEach((lieu) => {
      var marker = ajouterMarker(
        parseFloat(lieu.lat),
        parseFloat(lieu.lng),
        map,
        recuperationJSON("./api/typelieu.php")[
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

    let infoVille;
    let infoVilles = recuperationJSON(
        "./api/ville.php"
    )
    for (let item in infoVilles) {
      if (infoVilles[item]['id'] == ville) {
        infoVille = infoVilles[item];
        break;
      }
    }

    definirCentre(
      parseFloat(infoVille.lat),
      parseFloat(infoVille.lng),
      12,
      map
    );
    afficherResultats(
      recuperationJSON(
        "./api/lieu.php?ville=" + ville
      )
    );
  } else if ((ville === "0") == true && (type === "0") == false) {
    recuperationJSON(
      "./api/lieu.php?typeLieu=" + type
    ).forEach((lieu) => {
      var marker = ajouterMarker(
        parseFloat(lieu.lat),
        parseFloat(lieu.lng),
        map,
        recuperationJSON("./api/typelieu.php")[
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
        "./api/lieu.php?typeLieu=" + type
      )
    );
  } else if ((ville === "0") == true && (type === "0") == true) {
    recuperationJSON("./api/lieu.php").forEach(
      (lieu) => {
        var marker = ajouterMarker(
          parseFloat(lieu.lat),
          parseFloat(lieu.lng),
          map,
          recuperationJSON("./api/typelieu.php")[
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
      recuperationJSON("./api/lieu.php")
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
      "./api/typelieu.php"
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
  $.post("./inc/ajouterLieu.inc.php", {
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
  /*initMap();*/ //Pas d'initialisation de la map puisque le lieu n'est pas validé donc n'apparaitra pas
}

function addVilleIfNotExistsBDD(nomVille, nomPays) { //Rajouter une vérification par le place_id google map qu'on enregistrerais dans la bdd
  var json = recuperationJSON(
      "https://maps.googleapis.com/maps/api/geocode/json?address=" +
      encodeURIComponent(
          nomVille + ' ' + nomPays
      ) +
      "&key=AIzaSyDPddKexH8VgK3ORDbfuxpcdNFwwcjg5GI"
  );
  console.log(nomVille + ' ' + nomPays);

  var result;
  $.ajax({
    url : './inc/ajouterVilleSiNonExistante.inc.php', // La ressource ciblée
    type : 'POST', // Le type de la requête HTTP.
    async : false,
    data : {
      nom: json['results'][0]['address_components'][0]['long_name'],
      latitude: json['results'][0]['geometry']['location']['lat'],
      longitude: json['results'][0]['geometry']['location']['lng']
    },
    dataType : 'json',
    success: function(data) {
      console.log('valeur data : ' + data);
      return data;
    }
  })
      .done(function(data) {
        result = data;
      });

  return result;

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
  $.post("./inc/ajouterProprietaire.inc.php", {
    idLieu: idLieu,
  });
}

function ajouterAvis(id, auteur, typePoint){
  item = $('#inputAvisId'+id).val();
  note = $('#inputNote'+id).val();

  if(!note){
    alert("Merci de sélectionner une note");
    return;
  }

  texte = item;
  note = note;
  auteur = auteur;
  idPoint = id;
  typePoint = typePoint;


  $.ajax({
    url : './inc/ajouterNote.inc.php', // La ressource ciblée
    type : 'POST', // Le type de la requête HTTP.
    data : {
      texte : texte,
      note : note,
      auteur : auteur,
      idPoint : id,
      typePoint : typePoint
    },
    dataType : 'html',
    success: function(data){
      console.log(data);
    }
  });


}
