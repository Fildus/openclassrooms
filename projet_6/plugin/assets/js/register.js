/********************************************************************************************
*                                                                                           *
*                                  Récuperation des champs                                  *
*                                                                                           *
********************************************************************************************/
let form = document.getElementById('customForm')
let checkbox = document.getElementById('find_nanny_register[nanny]')

let village         = document.getElementById('find_nanny_register[ville]')

let latitude        = document.getElementById('lat')
let longitude       = document.getElementById('lng')

let localisation    = document.querySelector('#localisation')

let submit = document.getElementById('find_nanny_register[submit]')

let isInputed = false

/********************************************************************************************
*                                                                                           *
*                                    Affichage de la map                                    *
*                                                                                           *
********************************************************************************************/
let mymap = L.map('mapid')
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>' +
        ' contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>,' +
        ' Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiZmlsZHVzIiwiYSI6ImNqa25yNzJ5eDAwOG0zc28wYnhwN3VocHEifQ._5TD6vvgtsDYr8GzxfJLCw'
}).addTo(mymap)

/********************************************************************************************
*                                                                                           *
*                                 Initialisation de layers                                  *
*                                                                                           *
********************************************************************************************/
let marker = new L.LayerGroup()
mymap.addLayer(marker)

/********************************************************************************************
*                                                                                           *
*                               initialisation de la vue (MAP)                              *
*                                                                                           *
********************************************************************************************/
if (latitude.value !== '' && latitude.value !== '0' && longitude.value !== '' && longitude.value !== '0') {
    mymap.setView([
        latitude.value,
        longitude.value
    ], 16)
    L.marker([latitude.value, longitude.value]).addTo(marker)
}else {
    mymap.setView([47, 2], 6)
}

/*********************************************************************************************
 *                                                                                           *
 *                               Click sur la map ou le bouton                               *
 *                                                                                           *
 *********************************************************************************************/
/**********************************************
 *                     Map                     *
 **********************************************/
function onMapClick(e) {
    marker.clearLayers();

    let latitudeFunc    = e.latlng.lat
    let longitudeFunc   = e.latlng.lng

    mymap.setView([latitudeFunc,longitudeFunc],16,{
        watch: true,
        maximumAge: 3600000
    })

    L.marker([latitudeFunc, longitudeFunc]).addTo(marker)

    getAdress(latitudeFunc, longitudeFunc, function (address) {
        setFormAdress(address)
    });
    setFormGeo(latitudeFunc, longitudeFunc)
}
mymap.on('click', onMapClick);

/**********************************************
 *                    Button                   *
 **********************************************/
function onButtonClick() {
    marker.clearLayers();

    mymap
        .locate({setView: true, watch: true, maxZoom: 18, enableHighAccuracy: true, maximumAge: 3600000, timeout: 3600000})
        .on('locationfound', function(e){
            let latitudeFunc    = e.latlng.lat
            let longitudeFunc   = e.latlng.lng

            L.marker([latitudeFunc, longitudeFunc]).addTo(marker)

            getAdress(latitudeFunc, longitudeFunc, function (address) {
                setFormAdress(address)
            });
            setFormGeo(latitudeFunc, longitudeFunc)
        })
        .on('locationerror', function(e){
            console.log(e)
        })
}
localisation.addEventListener('click', onButtonClick);

/********************************************************************************************
 *                                                                                           *
 *                              Si l'adresse est entrée en input                             *
 *                                                                                           *
 ********************************************************************************************/

village.addEventListener('input', function () {
    village.setAttribute('value', village.value)
})

chercher.addEventListener('click', function (ev) {
    find()
})

function find() {

    if (village.value !== ''){
        isInputed = true

        let url = 'https://api-adresse.data.gouv.fr/search/?q='+village.value+'&limit=1'
        ajax(url, function (ev) {
            longitude.setAttribute('value', JSON.parse(ev)['features'][0]['geometry']['coordinates'][0])
            latitude.setAttribute('value', JSON.parse(ev)['features'][0]['geometry']['coordinates'][1])

            marker.clearLayers()

            mymap.setView([
                latitude.value,
                longitude.value
            ])

            // L.marker([latitude, longitude]).addTo(marker)
        })
    }
}

/*********************************************************************************************
 *                                                                                            *
 *                         Récupération de l'adresse via OpenStreetMap                        *
 *                                                                                            *
 *********************************************************************************************/
function getAdress(latitude, longitude, callback){
    let link=
        'https://nominatim.openstreetmap.org/reverse?format=xml&lat='
        +latitude+'&lon='
        +longitude+'&zoom=18&addressdetails=1';
    ajax(link, function (success) {
        callback(
            ( new DOMParser() )
                .parseFromString(success, "application/xml")
                .getElementsByTagName('reversegeocode')[0]
                .getElementsByTagName('addressparts')[0])
    });
}

/*********************************************************************************************
 *                                                                                            *
 *                                       Appel en AJAX                                        *
 *                                                                                            *
 *********************************************************************************************/
function ajax(url, success) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            success(this.responseText);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

/*********************************************************************************************
 *                                                                                            *
 *                                 Modification du formulaire                                 *
 *                                                                                            *
 *********************************************************************************************/
function setFormGeo(lat, lng) {
    latitude.setAttribute('value', lat);
    longitude.setAttribute('value', lng);
}

function setFormAdress(address) {
    let formatedAddress = []
    address.childNodes.forEach(function (ev) {
        formatedAddress.push(ev.textContent)
    })
    village.setAttribute('value', formatedAddress.join(' - ') )
    village.value = formatedAddress.join(' - ')
}

/********************************************************************************************
 *                                                                                           *
 *                   Affichage du formulaire si "devenir nounou est coché"                   *
 *                                                                                           *
 ********************************************************************************************/
if (!checkbox.getAttribute('checked')){
    form.setAttribute('hidden', 'hidden')
}
checkbox.addEventListener('click', function () {
    if (checkbox.getAttribute('checked')){
        checkbox.removeAttribute('checked')
        form.setAttribute('hidden', 'hidden');
    }else{
        checkbox.setAttribute('checked', 'checked')
        form.removeAttribute('hidden');
    }
});