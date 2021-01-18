import * as $ from "jquery";

$(document).ready(function () {

});
// Validaciones
function validarNombre(nombre:string):boolean{
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,3}$");
    if(!regex.test(nombre)){
        throw "El nombre tiene un formato incorrecto";
    }else{
        return true;
    }
}
function validarApellido(apellido:string):boolean{
    var regex = new RegExp("^(([a-zA-Z ])?[a-zA-Z]*){1,4}$");
    if(!regex.test(apellido)){
        throw "El apellido tiene un formato incorrecto";
    }else{
        return true;
    }
}
function validarEmail(email:string):boolean {
    var regex = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$");
    if (!regex.test(email)) {
        throw "El email tiene un formato incorrecto";
    } else {
        return true;
    }
}
function validarDNI(dni:string):boolean{
    var regex= new RegExp("^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$");
    var letrasValidas:string = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var charIndex:number= parseInt(dni.substr(0, 8)) % 23;
    var letra = dni.toString().toUpperCase().substr(-1);

    if(dni.length!=9){
        throw "El dni tiene que tener 9 valores";
    }else if (!regex.test(dni)){
        throw "El dni tiene un formato incorrecto";
    }else if(letrasValidas.charAt(charIndex) != letra) {
        throw "La dni introducido no es valido";
    }else{
        return true;
    }
}
function validarContraseña(contraseña, contraseña2):boolean{
    var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&?¿!¡._-]).{8,64}$");
    if (regex.test(contraseña)) {
        if (contraseña != contraseña2) {
            throw "Las contraseñas no coinciden";
        } else {
            return true;
        }
    } else {
        throw "La contraseña debe contener 8 o más caracteres, una mayuscula, una minuscula, un numero y un caracter especial (@#$%&?¿!¡._-)";
    }
}
function validarNoBlanco(texto:string):boolean {
    if(/^\s+|\s+$/.test(texto)) {
        return true;
    } else {
        return false;
    }
}
//Registrarse
function validarForm():boolean {
    try {
        let nombre: string = $("#nombre").val().toString();
        let apellido: string = $("#apellido").val().toString();
        let dni: string = $("#dni").val().toString();
        let email: string = $("#email").val().toString();

        //llamamos a los metodos que validan los campos
        validarDNI(dni);
        //Comprobamos que no este vacio el nombre ni el apellido
        if (nombre == "" && apellido == "") {
            throw "El nombre y apellido no pueden estar vacios";
        } else if (validarNoBlanco(nombre) && validarNoBlanco(apellido)) {
            throw "El nombre y apellido no pueden contener espacios"
        }
        if (nombre == "") {
            throw "El nombre no puede estar vacio";
        } else if (validarNoBlanco(nombre)) {
            throw "El nombre no puede tener espacios en blanco"
        } else {
            validarNombre(nombre);
        }

        if (apellido == "") {
            throw "El apellido no puede estar vacio";
        }else if (validarNoBlanco(apellido)){
            throw "El apellido no puede tener espacios en blanco"

        }else{
            validarApellido(apellido);
        }
        validarEmail(email);
        validarContraseña($("#password").eq(0).val(),$("#password2").val());
        alert("Usuario registrado correctamente");
        window.location.href="login.html";
        return true;
    }catch (error){
        alert(error);
        return false;
    }
}
