let datePicker = document.getElementById('rangePicker')

let header = document.createElement('div')
header.className = 'custom-boxes'
let body = document.createElement('div')
body.className = 'custom-boxes'
let footer = document.createElement('div')
body.className = 'custom-boxes'

let week = ['Lun','Mar','Mer','Jeu','Ven','Sam','Dim']

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
        }else if(ev.srcElement.className === on){
            ev.srcElement.className = off
            ev.srcElement.setAttribute('value', '0')
            el.removeAttribute('checked')
        }
    })
    body.appendChild(el)
})

datePicker.appendChild(header)
datePicker.appendChild(body)
datePicker.appendChild(footer)