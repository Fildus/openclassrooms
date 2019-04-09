jQuery(function($) {
    $("#language_langue").change(function() { //put class or id of your select input
        $("[name='language']").submit();
    });
});

let index = Number(document.querySelector('#MyLoop').getAttribute('data'))//2

/**
 * innerHTML visitor data-prototype
 * @type {string | null}
 */
let prototype = document.querySelector('.visitor').getAttribute('data-prototype')

/**
 * HTMLDivElement "visitor"
 * @type {Element | null}
 */
let formElt = document.querySelector('.form')

/**
 * TODO: rechercher les éléments en html
 */
let addVisitorLinkElt    = document.querySelector('.moreTickets')
let removeVisitorLinkElt = document.querySelector('.lessTickets')

/**
 * +1 ticket
 */
function addForm(){
    if (index <= 10){
        let NewForm
        NewForm = prototype
        NewForm = NewForm.replace(/__name__/g, index)

        let NewFormElt = document.createElement('div')
        NewFormElt.id = 'visiteurElt-'+index
        NewFormElt.className =  'singleVisitor'
        NewFormElt.innerHTML = NewForm

        formElt.appendChild(NewFormElt)
        console.log('test')
        console.log(index)
        document.querySelector('.numberOfTickets').innerHTML = (index) + ' Tickets'

        index++
    }
}

/**
 * -1 ticket
 */
function removeForm(){
    if (index > 2){
        console.log(index)
        index--
        document.querySelector('.numberOfTickets').innerHTML = index-1 + ' Tickets'
        if (formElt.hasChildNodes('visiteurElt-'+index)) {
            formElt.removeChild(document.getElementById('visiteurElt-'+index))
        }else{
            document.querySelector('form').removeChild(document.getElementById('visiteurElt-'+index))
        }
    }
}

addVisitorLinkElt.addEventListener('click',function (ev) {
    ev.stopPropagation()
    addForm()
})

removeVisitorLinkElt.addEventListener('click',function (ev) {
    ev.stopPropagation()
    removeForm()
})

document.querySelector('.numberOfTickets').innerHTML = (index-1) + ' Tickets'

if (index === 1){
    addForm()
}