/********************************************************************************************
*                                                                                           *
*                                  Récuperation des champs                                  *
*                                                                                           *
********************************************************************************************/
let minPrice         = document.getElementById('min_range_input')
let maxPrice         = document.getElementById('max_range_input')

let available       = document.getElementById('find_nanny[avaiblable]')

let latitude        = document.getElementById('lat')
let longitude       = document.getElementById('lng')
let village         = document.getElementById('find_nanny[ville]')

let km              = document.getElementById('find_nanny[km]')

let localisation    = document.querySelector('#localisation')
let chercher        = document.querySelector('#chercher')

/* Switch input ou map */
let isInputed       = false
/********************************************************************************************
*                                                                                           *
*                                 Initialisation de la map                                  *
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
if (latitude.value !== '' && longitude.value !== '' && km !== undefined) {
    mymap.setView([
        latitude.value,
        longitude.value
    ], getZoom(km.value))

    L.circle([latitude.value, longitude.value], 200, {
        weight: 1,
        color: 'red',
        fillColor: 'red',
        fillOpacity: 0.1,
    }).addTo(marker)

    L.circle([latitude.value, longitude.value], km.value/2*1000, {
        weight: 1,
        color: 'blue',
        fillColor: '#cacaca',
        fillOpacity: 0.1,
    }).addTo(marker)

    addPersonnes()
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

    mymap.setView([
        latitudeFunc,
        longitudeFunc
    ], getZoom(km.value),{
        watch: true,
        maximumAge: 3600000
    })

    L.circle([latitudeFunc, longitudeFunc], 200, {
        weight: 1,
        color: 'red',
        fillColor: 'red',
        fillOpacity: 0.1,
    }).addTo(marker)

    L.circle([latitudeFunc, longitudeFunc], km.value/2*1000, {
        weight: 1,
        color: 'blue',
        fillColor: '#cacaca',
        fillOpacity: 0.1,
    }).addTo(marker)

    getAdress(latitudeFunc, longitudeFunc, function (address) {
        setFormAdress(address, latitudeFunc, longitudeFunc)
    });

    setFormGeo(latitudeFunc, longitudeFunc)

    addPersonnes()
}
mymap.on('click', onMapClick);

/**********************************************
*                    Button                   *
**********************************************/
function onButtonClick() {
    marker.clearLayers();
    let maxZoom = getZoom(km.value)

    mymap
        .locate({setView: true, watch: true, maxZoom: maxZoom, enableHighAccuracy: true, maximumAge: 3600000, timeout: 3600000})
        .on('locationfound', function(e){
            let latitude    = e.latlng.lat
            let longitude   = e.latlng.lng

            L.circle([latitude, longitude], 200, {
                weight: 1,
                color: 'red',
                fillColor: 'red',
                fillOpacity: 0.1,
            }).addTo(marker)

            L.circle([latitude, longitude], km.value/2*1000, {
                weight: 1,
                color: 'blue',
                fillColor: '#cacaca',
                fillOpacity: 0.1,
            }).addTo(marker)

            getAdress(latitude, longitude, function (address) {
                setFormAdress(address)
            });
            setFormGeo(latitude, longitude)

            addPersonnes()
        })
        .on('locationerror', function(e){
            console.log(e)
        })
}
localisation.addEventListener('click', onButtonClick);

/**********************************************
*                Calcul du zoom               *
**********************************************/
function getZoom(){
    switch (Number(km.value)) {
        case 1:
            return 16;
        case 2:
            return 15;
        case 5:
            return 13;
        case 10:
            return 12;
        case 15:
            return 12;
        case 20:
            return 11;
        case 25:
            return 11;
        case 30:
            return 11;
        case 35:
            return 11;
        case 40:
            return 10;
        case 45:
            return 10;
        case 50:
            return 10;
        default:
            return 2;
    }
}
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
            ], getZoom(km.value))

            L.circle([latitude.value, longitude.value], 200, {
                weight: 1,
                color: 'red',
                fillColor: 'red',
                fillOpacity: 0.1,
            }).addTo(marker)

            L.circle([latitude.value, longitude.value], km.value/2*1000, {
                weight: 1,
                color: 'blue',
                fillColor: '#cacaca',
                fillOpacity: 0.1,
            }).addTo(marker)

            addPersonnes()
        })
    }
}

/********************************************************************************************
*                                                                                           *
*                                     Si les km changent                                    *
*                                                                                           *
********************************************************************************************/
km.addEventListener('input', function (ev) {
    km.setAttribute('value', ev.srcElement.value)
    marker.clearLayers()

    mymap.setView([
        latitude.value,
        longitude.value
    ], getZoom(km.value))

    L.circle([latitude.value, longitude.value], 200, {
        weight: 1,
        color: 'red',
        fillColor: 'red',
        fillOpacity: 0.1,
    }).addTo(marker)

    L.circle([latitude.value, longitude.value], km.value/2*1000, {
        weight: 1,
        color: 'blue',
        fillColor: '#cacaca',
        fillOpacity: 0.1,
    }).addTo(marker)

    addPersonnes()
})


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
*                                  Autocompletion des champs                                 *
*                                                                                            *
*********************************************************************************************/
village.addEventListener('input', function () {
    let link=
        'https://geo.api.gouv.fr/communes?nom='
        +village.value

    ajax(link, function (success) {
        $( function() {
            let villes = []
            let i = 1;
            JSON.parse(success).forEach(function (ev) {
                i++;
                if (i < 10){
                    villes.push(ev.nom)
                }else {
                    return true
                }
            })

            $( '#find_nanny\\[ville\\]' ).autocomplete({
                source: villes,
                minLength: 2
            });
        });
    })
})

/*********************************************************************************************
*                                                                                            *
*                                    On rempli le tableau                                    *
*                                                                                            *
*********************************************************************************************/
let personnes = new L.LayerGroup()
mymap.addLayer(personnes)

function addPersonnes() {
    document.querySelector('#tableau').innerHTML = ""
    personnes.clearLayers()
    if (PersonnesListe !== undefined){
        PersonnesListe.forEach(function (e) {
            let near = isLocationNear(e)
            if (near[0]){
                if (isOk(e)){
                    AddPersonToMap(e, Math.trunc(near[1]))
                }
            }
        })
    }
}

function isOk(person) {
    let priceOk
    if (Number(minPrice.value) === 0 && Number(maxPrice.value) === 0) {
        priceOk = 'ok'
    }else {
        if (Number(minPrice.value) <= Number(person.price) && Number(person.price) <= Number(maxPrice.value)) {
            priceOk = 'ok'
        }else {
            priceOk = 'notOk'
        }
    }

    if (person.days !== ""){
        let allDaysElt = {
            'Lun': daysLun.value,
            'Mar': daysMar.value,
            'Mer': daysMer.value,
            'Jeu': daysJeu.value,
            'Ven': daysVen.value,
            'Sam': daysSam.value,
            'Dim': daysDim.value
        }
        let allDays = []
        for (k in unserialize(person.days)){
            allDays.push(k)
        }
        if (Number(daysLun.value) === 1 && allDays.indexOf('Lun') === -1){
            isDaysOk = 'notok'
        }else if (Number(daysMar.value) === 1 && allDays.indexOf('Mar') === -1){
            isDaysOk = 'notok'
        }else if (Number(daysMer.value) === 1 && allDays.indexOf('Mer') === -1){
            isDaysOk = 'notok'
        }else if (Number(daysJeu.value) === 1 && allDays.indexOf('Jeu') === -1){
            isDaysOk = 'notok'
        }else if (Number(daysVen.value) === 1 && allDays.indexOf('Ven') === -1){
            isDaysOk = 'notok'
        }else if (Number(daysSam.value) === 1 && allDays.indexOf('Sam') === -1){
            isDaysOk = 'notok'
        }else if (Number(daysDim.value) === 1 && allDays.indexOf('Dim') === -1){
            isDaysOk = 'notok'
        }else {
            isDaysOk = 'ok'
        }
    }else {
        isDaysOk = 'ok'
    }

    let isAvailable
    if (person.available === null){
        isAvailable = 'notOk'
    }else if (!available.hasAttribute('checked')){
        isAvailable = 'ok'
    }else if (person.available !== null){
        if (new Date().getTime() > new Date(person.available).getTime()){
            isAvailable = 'ok'
        }
    }else {
        isAvailable = 'notOk'
    }

    let nextAvailable
    if (person.nextDateAvailable !== null && document.getElementById('find_nanny[avaiblable]').hasAttribute('checked')) {
        if (new Date(person.nextDateAvailable).getTime() < new Date().getTime()){
            nextAvailable = 'ok'
        }else {
            nextAvailable = 'notOk'
        }
    }else {
        nextAvailable = 'ok'
    }

    if (
        priceOk === 'ok' &&
        isAvailable === 'ok' &&
        isDaysOk === 'ok' &&
        nextAvailable === 'ok'
    ){
        return true
    } else {
        return false
    }
}

function isLocationNear(e) {
    Math.radians = function(degrees) {
        return degrees * Math.PI / 180;
    };

    Math.degrees = function(radian) {
        return radian / (Math.PI / 180);
    };

    let theta = e.lng - longitude.value
    let distance =
        Math.sin(Math.radians(e.lat)) *
        Math.sin(Math.radians(latitude.value)) +
        Math.cos(Math.radians(e.lat)) *
        Math.cos(Math.radians(latitude.value)) *
        Math.cos(Math.radians(theta))

    distance = Math.acos(distance)
    distance = Math.degrees(distance)

    distance = distance * 60 * 1.1515 * 1.609344

    return [Number(distance) < Number(km.value/2), distance];
}

function AddPersonToMap(personne, distance) {
    let lat = personne.lat
    let lng = personne.lng

    let tooltip = L.marker([lat, lng]).addTo(personnes)
    tooltip.bindTooltip(personne.nom)

    let disponible;

    if (personne.nextDateAvailable !== null && personne.available !== null) {
        let a = new Date(personne.nextDateAvailable).getTime()
        let b = new Date().getTime()

        let c = new Date(personne.available).getTime()

        if (a === b || a < b){
            if (c === b || c < b){
                disponible = '<span style="color: #008800;">disponible</span>'
            }else{
                disponible = '<span style="color: #880000;">Indisponible</span>'
            }
        }else{
            disponible = '<span style="color: #908a4a;">à partir du : </span>'
            disponible += "\n"+personne.nextDateAvailable
        }
    }else if (personne.nextDateAvailable === null) {
        disponible = '<span style="color: #008800;">Disponible</span>'
    }else {
        disponible = '<span style="color: #880000;">Indisponible</span>'
    }

    let personneOnListe =
        "<th><a href='"+personne.nanny_url+"'>"+personne.nom+"</a></th>" +
        "<th>"+personne.price+"</th>" +
        "<th>"+personne.nbrChildren+"</th>" +
        "<th>"+distance+"</th>" +
        "<th>"+disponible+"</th>";

    let personneOnListeElt = document.createElement('tr')
    personneOnListeElt.innerHTML = personneOnListe

    document.querySelector('#tableau').appendChild(personneOnListeElt)
}

/*********************************************************************************************
*                                                                                            *
*                                         DatePicker                                         *
*                                                                                            *
*********************************************************************************************/

let datePicker = document.getElementById('rangePicker')

let header = document.createElement('div')
header.className = 'custom-boxes'
let body = document.createElement('div')
body.className = 'custom-boxes'
let footer = document.createElement('div')
body.className = 'custom-boxes'

let week = ['Lun','Mar','Mer','Jeu','Ven','Sam','Dim']
let days = {'Lun':0,'Mar':0,'Mer':0,'Jeu':0,'Ven':0,'Sam':0,'Dim':0}

week.forEach(function (ev) {
    /**
     * Header
     * @type {HTMLElement}
     */
    let headerElt = document.createElement('span')
    headerElt.className = 'custom-boxes-block-text'
    headerElt.innerText = ev
    header.appendChild(headerElt)

    /**
     * Jours
     * @type {HTMLElement}
     */
    let el  = document.createElement('input')
    el.setAttribute('name', 'find_nanny_register[days]['+ev+']')
    el.setAttribute('id', 'find_nanny_register[days]['+ev+']')
    el.setAttribute('type', 'checkbox')

    let off = 'custom-boxes-block custom-boxes-grey'
    let on  = 'custom-boxes-block custom-boxes-green'

    if (days !== null && Number(days[ev]) === 1){
        el.className = on
        el.setAttribute('value','1')
        el.setAttribute('checked','checked')
    }else {
        el.className = off
        el.setAttribute('value','0')
    }

    el.addEventListener('click', function (ev) {
        if (ev.srcElement.className === off){
            ev.srcElement.className = on
            ev.srcElement.setAttribute('value', '1')
            el.setAttribute('checked','checked')
            addPersonnes()
        }else if(ev.srcElement.className === on){
            ev.srcElement.className = off
            ev.srcElement.setAttribute('value', '0')
            el.removeAttribute('checked')
            addPersonnes()
        }
    })
    body.appendChild(el)
})

datePicker.appendChild(header)
datePicker.appendChild(body)
datePicker.appendChild(footer)

/**
 * Prix désiré
 * @type {HTMLElement}
 */
let min_range_output = document.getElementById('min_range_output')
let max_range_output = document.getElementById('max_range_output')
min_range_output.value = 0
max_range_output.value = 0
function echoRange(value, a){
    if (a === 'min'){
        min_range_output.innerText = value
        minPrice.value = value
    }else if (a === 'max'){
        max_range_output.innerText = value
        maxPrice.value = value
    }
}

minPrice.addEventListener('change', function (e) {
    addPersonnes()
})
maxPrice.addEventListener('change', function (e) {
    addPersonnes()
})

function checkboxUse(checkbox){
    if (checkbox.hasAttribute('checked')){
        checkbox.removeAttribute('checked')
    }else {
        checkbox.setAttribute('checked', 'checked')
    }
    addPersonnes()
}


let daysLun         = document.getElementById('find_nanny_register[days][Lun]')
let daysMar         = document.getElementById('find_nanny_register[days][Mar]')
let daysMer         = document.getElementById('find_nanny_register[days][Mer]')
let daysJeu         = document.getElementById('find_nanny_register[days][Jeu]')
let daysVen         = document.getElementById('find_nanny_register[days][Ven]')
let daysSam         = document.getElementById('find_nanny_register[days][Sam]')
let daysDim         = document.getElementById('find_nanny_register[days][Dim]')

function unserialize (data) {
    // http://kevin.vanzonneveld.net
    // +     original by: Arpad Ray (mailto:arpad@php.net)
    // +     improved by: Pedro Tainha (http://www.pedrotainha.com)
    // +     bugfixed by: dptr1988
    // +      revised by: d3x
    // +     improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +        input by: Brett Zamir (http://brett-zamir.me)
    // +     improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +     improved by: Chris
    // +     improved by: James
    // +        input by: Martin (http://www.erlenwiese.de/)
    // +     bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +     improved by: Le Torbi
    // +     input by: kilops
    // +     bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Jaroslaw Czarniak
    // %            note: We feel the main purpose of this function should be to ease the transport of data between php & js
    // %            note: Aiming for PHP-compatibility, we have to translate objects to arrays
    // *       example 1: unserialize('a:3:{i:0;s:5:"Kevin";i:1;s:3:"van";i:2;s:9:"Zonneveld";}');
    // *       returns 1: ['Kevin', 'van', 'Zonneveld']
    // *       example 2: unserialize('a:3:{s:9:"firstName";s:5:"Kevin";s:7:"midName";s:3:"van";s:7:"surName";s:9:"Zonneveld";}');
    // *       returns 2: {firstName: 'Kevin', midName: 'van', surName: 'Zonneveld'}
    var that = this,
        utf8Overhead = function (chr) {
            // http://phpjs.org/functions/unserialize:571#comment_95906
            var code = chr.charCodeAt(0);
            if (code < 0x0080) {
                return 0;
            }
            if (code < 0x0800) {
                return 1;
            }
            return 2;
        },
        error = function (type, msg, filename, line) {
            throw new window[type](msg, filename, line);
        },
        read_until = function (data, offset, stopchr) {
            var i = 2, buf = [], chr = data.slice(offset, offset + 1);

            while (chr != stopchr) {
                if ((i + offset) > data.length) {
                    error('Error', 'Invalid');
                }
                buf.push(chr);
                chr = data.slice(offset + (i - 1), offset + i);
                i += 1;
            }
            return [buf.length, buf.join('')];
        },
        read_chrs = function (data, offset, length) {
            var i, chr, buf;

            buf = [];
            for (i = 0; i < length; i++) {
                chr = data.slice(offset + (i - 1), offset + i);
                buf.push(chr);
                length -= utf8Overhead(chr);
            }
            return [buf.length, buf.join('')];
        },
        _unserialize = function (data, offset) {
            var dtype, dataoffset, keyandchrs, keys,
                readdata, readData, ccount, stringlength,
                i, key, kprops, kchrs, vprops, vchrs, value,
                chrs = 0,
                typeconvert = function (x) {
                    return x;
                },
                readArray = function () {
                    readdata = {};

                    keyandchrs = read_until(data, dataoffset, ':');
                    chrs = keyandchrs[0];
                    keys = keyandchrs[1];
                    dataoffset += chrs + 2;

                    for (i = 0; i < parseInt(keys, 10); i++) {
                        kprops = _unserialize(data, dataoffset);
                        kchrs = kprops[1];
                        key = kprops[2];
                        dataoffset += kchrs;

                        vprops = _unserialize(data, dataoffset);
                        vchrs = vprops[1];
                        value = vprops[2];
                        dataoffset += vchrs;

                        readdata[key] = value;
                    }
                };

            if (!offset) {
                offset = 0;
            }
            dtype = (data.slice(offset, offset + 1)).toLowerCase();

            dataoffset = offset + 2;

            switch (dtype) {
                case 'i':
                    typeconvert = function (x) {
                        return parseInt(x, 10);
                    };
                    readData = read_until(data, dataoffset, ';');
                    chrs = readData[0];
                    readdata = readData[1];
                    dataoffset += chrs + 1;
                    break;
                case 'b':
                    typeconvert = function (x) {
                        return parseInt(x, 10) !== 0;
                    };
                    readData = read_until(data, dataoffset, ';');
                    chrs = readData[0];
                    readdata = readData[1];
                    dataoffset += chrs + 1;
                    break;
                case 'd':
                    typeconvert = function (x) {
                        return parseFloat(x);
                    };
                    readData = read_until(data, dataoffset, ';');
                    chrs = readData[0];
                    readdata = readData[1];
                    dataoffset += chrs + 1;
                    break;
                case 'n':
                    readdata = null;
                    break;
                case 's':
                    ccount = read_until(data, dataoffset, ':');
                    chrs = ccount[0];
                    stringlength = ccount[1];
                    dataoffset += chrs + 2;

                    readData = read_chrs(data, dataoffset + 1, parseInt(stringlength, 10));
                    chrs = readData[0];
                    readdata = readData[1];
                    dataoffset += chrs + 2;
                    if (chrs != parseInt(stringlength, 10) && chrs != readdata.length) {
                        error('SyntaxError', 'String length mismatch');
                    }
                    break;
                case 'a':
                    readArray();
                    dataoffset += 1;
                    break;
                case 'o':
                    ccount = read_until(data, dataoffset, ':');
                    dataoffset += ccount[0] + 2;

                    ccount = read_until(data, dataoffset, '"');
                    dataoffset += ccount[0] + 2;

                    readArray();
                    dataoffset += 1;
                    break;
                default:
                    error('SyntaxError', 'Unknown / Unhandled data type(s): ' + dtype);
                    break;
            }
            return [dtype, dataoffset - offset, typeconvert(readdata)];
        }
    ;

    return _unserialize((data + ''), 0)[2];
}