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
if (person.lat && person.lng) {
    mymap.setView([
        person.lat,
        person.lng
    ], 16)

    L.marker([person.lat, person.lng]).addTo(marker)
}

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
    // el.setAttribute('type', 'checkbox')

    let off = 'custom-boxes-block custom-boxes-grey'
    let on  = 'custom-boxes-block custom-boxes-green'

    if (days !== null && Number(unserialize(person.days)[ev]) === 1){
        el.className = on
    }else {
        el.className = off
    }

    el.addEventListener('click', function (ev) {
        ev.stopPropagation()
        ev.preventDefault()
    })
    body.appendChild(el)
})

datePicker.appendChild(header)
datePicker.appendChild(body)
datePicker.appendChild(footer)

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
