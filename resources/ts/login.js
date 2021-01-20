$(document).ready(function () {
    $("#registrar").click(function () {
        validarForm();
    });
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
function validarPortal(texto) {
    var regex = new RegExp("^(([0-9]){1,2}[a-zA-Z]?)$");
    if (!regex.test(texto)) {
        throw "Introduce el portal correctamente";
    }
    else {
        return true;
    }
}
function validarPiso(texto) {
    var regex = new RegExp("^([0-9]){1,3}$");
    if (!regex.test(texto)) {
        throw "Introduce el piso correctamente";
    }
    else {
        return true;
    }
}
function validarTlf(tlf) {
    var regex = new RegExp("^((6|7|8|9)[-]*([0-9][-]*){8})$");
    if (!regex.test(String(tlf))) {
        throw "Introduce el tlf correctamente Ej:688234567";
    }
    else {
        return true;
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
        //Recogemos los datos introducidos por el usuario
        var nombre = $("#nombre").val().toString();
        var apellido = $("#apellido").val().toString();
        var dni = $("#dni").val().toString();
        var email = $("#email").val().toString();
        var password1 = $("#password").val().toString();
        var password2 = $("#password2").val().toString();
        var portal = $("#portal").val().toString();
        var piso = $("#piso").val().toString();
        var direccion = $("#form-address").val().toString();
        var fecha_nac = $("#fecha_nac").val().toString();
        // @ts-ignore
        var provincia = $('select[name ="provincia"]').val();
        // @ts-ignore
        var mano = $('select[name ="mano"]').val();
        // @ts-ignore
        var tlf = $("#ntel").val();
        //llamamos a los metodos que validan los campos
        validarDNI(dni);
        validarEmail(email);
        //Comprobamos que no este vacio el nombre ni el apellido y que no tienen ambos espacios en blanco
        if (nombre == "" && apellido == "") {
            throw "El nombre y apellido no pueden estar vacios";
        }
        else if (validarNoBlanco(nombre) && validarNoBlanco(apellido)) {
            throw "El nombre y apellido no pueden contener espacios";
        }
        //Validamos el nombre comprobando antes que no tiene espacios en blanco
        if (nombre == "") {
            throw "El nombre no puede estar vacio";
        }
        else if (validarNoBlanco(nombre)) {
            throw "El nombre no puede tener espacios en blanco";
        }
        else {
            validarNombre(nombre);
        }
        //Validamos el apellido comprobando antes que no tiene espacios en blanco
        if (apellido == "") {
            throw "El apellido no puede estar vacio";
        }
        else if (validarNoBlanco(apellido)) {
            throw "El apellido no puede tener espacios en blanco";
        }
        else {
            validarApellido(apellido);
        }
        //Validar para que no nos pongan la contraseña en blanco o con espacios
        if (password1 == "" && password2 == "") {
            throw "La contraseña no puede estar vacia";
        }
        else if (validarNoBlanco(password1) && validarNoBlanco(password2)) {
            throw "La contraseña no puede tener espacios en blanco";
        }
        else {
            validarContraseña($("#password").eq(0).val(), $("#password2").val());
        }
        //Validamos para que tengan que seleccionar una obligatoriamente
        if (provincia == null) {
            throw "Seleccione su provincia de nacimiento";
        }
        //Validamos la fecha para que no la dejen vacia
        if (fecha_nac == "") {
            throw "Seleccione su fecha de nacimiento";
        }
        //Validamos la direccion para que no este vacio
        if (direccion == "") {
            throw "Rellene el campo direccion";
        }
        //Validamos el portal para que no este vacio ni mal introducido
        if (portal == "") {
            throw "El portal no puede estar vacio";
        }
        else if (validarNoBlanco(portal)) {
            throw "El portal no puede tener espacios en blanco";
        }
        else {
            validarPortal(portal);
        }
        //Validamos el piso para que no este vacio ni mal introducido
        if (piso == "") {
            throw "El piso no puede estar vacio";
        }
        else if (validarNoBlanco(piso)) {
            throw "El piso no puede tener espacios en blanco";
        }
        else {
            validarPiso(piso);
        }
        //Validamos para que tengan que seleccionar una obligatoriamente
        if (mano == null) {
            throw "Seleccione la mano de su piso";
        }
        //Validamos el numero de telefono
        validarTlf(tlf);
        alert("Usuario registrado correctamente");
        window.location.href = "login.html";
        return true;
    }
    catch (error) {
        alert(error);
        return false;
    }
}
