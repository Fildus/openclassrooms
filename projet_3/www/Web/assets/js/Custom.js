/**
 * SUBSCRIBE
 */

/**         confirmation des passwords          */
var password = document.getElementById("password_A")
    , confirm_password = document.getElementById("password_B");

function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Les passwords ne correspondent pas");
    } else {
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

/**         confirmation des email          */
var email_subscribe_A = document.getElementById("email_subscribe_A")
    , email_subscribe_B = document.getElementById("email_subscribe_B");

function validateEmail(){
    if(email_subscribe_A.value != email_subscribe_B.value) {
        email_subscribe_B.setCustomValidity("Les email ne correspondent pas");
    } else {
        email_subscribe_B.setCustomValidity('');
    }
}

email_subscribe_A.onchange = validateEmail;
email_subscribe_B.onkeyup = validateEmail;

window.setTimeout(function() { $(".alert").alert('close'); }, 5000);