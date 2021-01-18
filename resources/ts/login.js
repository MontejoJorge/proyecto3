"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var $ = require("jquery");
$(document).ready(function () {
});
// Validaciones
function validarNombre(nombre) {
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,3}$");
    if (!regex.test(nombre)) {
        throw "El nombre tiene un formato incorrecto";
    }
    else {
        return true;
    }
}
function validarApellido(apellido) {
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,4}$");
    if (!regex.test(apellido)) {
        throw "El apellido tiene un formato incorrecto";
    }
    else {
        return true;
    }
}
function validarEmail(email) {
    var regex = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$");
    if (!regex.test(email)) {
        throw "El email tiene un formato incorrecto";
    }
    else {
        return true;
    }
}
function validarDNI(dni) {
    var regex = new RegExp("^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$");
    var letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var charIndex = parseInt(dni.substr(0, 8)) % 23;
    var letra = dni.toString().toUpperCase().substr(-1);
    if (dni.length != 9) {
        throw "El dni tiene que tener 9 valores";
    }
    else if (!regex.test(dni)) {
        throw "El dni tiene un formato incorrecto";
    }
    else if (letrasValidas.charAt(charIndex) != letra) {
        throw "La dni introducido no es valido";
    }
    else {
        return true;
    }
}
function validarContraseña(contraseña, contraseña2) {
    var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&?¿!¡._-]).{8,64}$");
    if (regex.test(contraseña)) {
        if (contraseña != contraseña2) {
            throw "Las contraseñas no coinciden";
        }
        else {
            return true;
        }
    }
    else {
        throw "La contraseña debe contener 8 o más caracteres, una mayuscula, una minuscula, un numero y un caracter especial (@#$%&?¿!¡._-)";
    }
}
function validarNoBlanco(texto) {
    if (/^\s+|\s+$/.test(texto)) {
        return true;
    }
    else {
        return false;
    }
}
//Registrarse
function validarForm() {
    try {
        var nombre = $("#nombre").val().toString();
        var apellido = $("#apellido").val().toString();
        var dni = $("#dni").val().toString();
        var email = $("#email").val().toString();
        //llamamos a los metodos que validan los campos
        validarDNI(dni);
        //Comprobamos que no este vacio el nombre ni el apellido
        if (nombre == "" && apellido == "") {
            throw "El nombre y apellido no pueden estar vacios";
        }
        else if (validarNoBlanco(nombre) && validarNoBlanco(apellido)) {
            throw "El nombre y apellido no pueden contener espacios";
        }
        if (nombre == "") {
            throw "El nombre no puede estar vacio";
        }
        else if (validarNoBlanco(nombre)) {
            throw "El nombre no puede tener espacios en blanco";
        }
        else {
            validarNombre(nombre);
        }
        if (apellido == "") {
            throw "El apellido no puede estar vacio";
        }
        else if (validarNoBlanco(apellido)) {
            throw "El apellido no puede tener espacios en blanco";
        }
        else {
            validarApellido(apellido);
        }
        validarEmail(email);
        validarContraseña($("#password").eq(0).val(), $("#password2").val());
        alert("Usuario registrado correctamente");
        window.location.href = "login.html";
        return true;
    }
    catch (error) {
        alert(error);
        return false;
    }
}
