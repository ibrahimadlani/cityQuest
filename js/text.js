const latDefaut = 46.62423629785034;
const lngDefaut = 2.4361340279539414;
const zoomDefaut = 5.6;

function ajouterMarker(lat, lng, map, icon) {
    var marker = new google.maps.Marker({
        position: {lat: lat, lng: lng},
        map: map,
        icon: "img/iconsLieu/" + icon,
    });

    return marker;
}

// Recentre la carte sur des coordoonnée a un certain zoom
function definirCentre(lat, lng, zoom, map) {
    map.setZoom(zoom);
    map.setCenter({lat: lat, lng: lng});
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
        jsonFile: resultats
    });
}

function afficherPromotions(resultats) {
    $("#carouselPromotions").load("inc/views/casePromotions.inc.php", {
        jsonFile: resultats
    });
}

// Crée un point sur la map
function afficherPoints(ville, type, map) {
    let jsonLieux;

    if (ville === "0") { // Si la ville n'est pas spécifiée
        definirCentre(latDefaut, lngDefaut, zoomDefaut, map);

        if (type === "0") { // Ville : non, Type : non
            $.ajax({
                url: './api/lieu.php?',
                type: 'GET',
                async: false,
                dataType: 'json',
                success: function (data) {
                    return data;
                }
            })
                .done(function (data) {
                    jsonLieux = data;
                });

        } else { // Ville : non, Type : oui
            $.ajax({
                url: './api/lieu.php?',
                type: 'GET',
                async: false,
                data: {
                    typeLieu: type
                },
                dataType: 'json',
                success: function (data) {
                    return data;
                }
            })
                .done(function (data) {
                    jsonLieux = data;
                });
        }

    } else { //Si la ville est spécifiée

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

        if (type === "0") { // Ville : oui, Type : non
            $.ajax({
                url: './api/lieu.php?',
                type: 'GET',
                async: false,
                data: {
                    ville: ville
                },
                dataType: 'json',
                success: function (data) {
                    return data;
                }
            })
                .done(function (data) {
                    jsonLieux = data;
                });

        } else { // Ville : oui, Type : oui
            $.ajax({
                url: './api/lieu.php?',
                type: 'GET',
                async: false,
                data: {
                    ville: ville,
                    typeLieu: type
                },
                dataType: 'json',
                success: function (data) {
                    return data;
                }
            })
                .done(function (data) {
                    jsonLieux = data;
                });
        }
    }

    //Affiche les détails des lieux
    afficherResultats(jsonLieux);

    //Afficher le carousel de promotions
    afficherPromotions(jsonLieux);

    let infoWindows = [];

    //Affiche les markeurs des lieux
    jsonLieux.forEach(
        (lieu) => {
            let typeLieu;
            typesLieux = recuperationJSON("./api/typelieu.php");

            for (let item in typesLieux) {
                if (typesLieux[item]['id'] == lieu.typeLieu) {
                    typeLieu = typesLieux[item];
                    break;
                }
            }

            var marker = ajouterMarker(
                parseFloat(lieu.lat),
                parseFloat(lieu.lng),
                map,
                typeLieu.icone
            );

            var infoWindow = new google.maps.InfoWindow({
                content:
                    '<h3 className="display-6">' + lieu.nom + '</h3>' +
                    '<p className="lead mb-0">' + lieu.description + '</p>' +
                    '<button type="button" class="btn btn-sm btn-danger rounded-pill px-3 mx-2" onclick="' +
                    'document.getElementById(' + lieu.id + ').scrollIntoView({behavior: \'smooth\', block: \'start\'});' +
                    'document.getElementById(' + lieu.id + ').style.boxShadow = \'0px 0px 31px grey\';' +
                    '">Détails</button>'
            });

            //Retire l'ombre derrière la carte du lieu lorsque l'infoWindow est fermée
            google.maps.event.addListener(infoWindow, 'closeclick', function () {
                document.getElementById(lieu.id).style.boxShadow = '';
            });

            infoWindows.push(infoWindow);

            //Quand on clique sur un marker
            marker.addListener('click', function () {
                //Ferme toutes les infoWindows
                for (let iw in infoWindows) { infoWindows[iw].close(); }
                //Retire l'ombre derrière toutes les cartes de lieux
                jsonLieux.forEach((lieu) => { document.getElementById(lieu.id).style.boxShadow = ''; })
                //Ouvre l'infoWindow du lieu sur lequel on a cliqué
                infoWindow.open(map, marker);
            });

        }
    );
}

// Initialise (rafraichît) la map
function initMap(ville, type) {
    var map = new google.maps.Map(document.getElementById("map"), {
        center: {lat: latDefaut, lng: lngDefaut},
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

    var result;
    $.ajax({
        url: './inc/ajouterVilleSiNonExistante.inc.php',
        type: 'POST',
        async: false,
        data: {
            nom: json['results'][0]['address_components'][0]['long_name'],
            latitude: json['results'][0]['geometry']['location']['lat'],
            longitude: json['results'][0]['geometry']['location']['lng']
        },
        dataType: 'json',
        success: function (data) {
            return data;
        }
    })
        .done(function (data) {
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

function ajouterAvis(id, auteur) {
    item = $('#inputAvisId' + id).val();
    note = $('#inputNote' + id).val();

    if (!note) {
        alert("Merci de sélectionner une note");
        return;
    }
    else {
        window.location.reload()
    }

    texte = item;
    note = note;
    auteur = auteur;
    idLieu = id;


    $.ajax({
        url: './inc/ajouterNote.inc.php',
        type: 'POST',
        data: {
            texte: texte,
            note: note,
            auteur: auteur,
            idLieu: id
        },
        dataType: 'html',
        success: function (data) {

        }
    });


}
