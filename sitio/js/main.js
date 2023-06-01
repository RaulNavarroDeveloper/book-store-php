'use strict'

let msgError = document.querySelector('.msg-error');
let msgExito = document.querySelector('.msg-exito');

if(msgError){
    setTimeout(() => {
        msgError.className = 'msg-error animate__animated animate__fadeOutUp';
    }, 4000);
    setTimeout(() => {
        msgError.remove();
    }, 4500);
} else if (msgExito){
    setTimeout(() => {
        msgExito.className = 'msg-exito animate__animated animate__fadeOutUp';
    }, 4000);
    setTimeout(() => {
        msgExito.remove();
    }, 4500);
}