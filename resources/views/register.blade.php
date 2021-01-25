<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro - Ayuntamiento Vitoria</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/personalizado.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bgregister"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="dni"
                                           placeholder="DNI">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="email"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="nombre"
                                           placeholder="Nombre">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="apellido"
                                           placeholder="Apellido">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                           id="password" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                           id="password2" placeholder="Repeat Password">
                                </div>





                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    Provincia de nacimiento
                                    <select required name="provincia" id="provincia" aria-label="Escoge una provincia" class="form-control form-control-user selector ">
                                        <option value="" disabled selected>Seleccione la provincia</option>
                                        <option value="Álava">Álava</option>
                                        <option value="Albacete">Albacete</option>
                                        <option value="Alicante">Alicante</option>
                                        <option value="Almería">Almería</option>
                                        <option value="Asturias">Asturias</option>
                                        <option value="Ávila">Ávila</option>
                                        <option value="Badajoz">Badajoz</option>
                                        <option value="Baleares">Baleares</option>
                                        <option value="Barcelona">Barcelona</option>
                                        <option value="Burgos">Burgos</option>
                                        <option value="Cáceres">Cáceres</option>
                                        <option value="Cádiz">Cádiz</option>
                                        <option value="Cantabria">Cantabria</option>
                                        <option value="Castellón">Castellón</option>
                                        <option value="Ceuta">Ceuta</option>
                                        <option value="Ciudad Real">Ciudad Real</option>
                                        <option value="Córdoba">Córdoba</option>
                                        <option value="Cuenca">Cuenca</option>
                                        <option value="Girona">Girona</option>
                                        <option value="Granada">Granada</option>
                                        <option value="Guadalajara">Guadalajara</option>
                                        <option value="Guipuzkoa">Guipuzkoa</option>
                                        <option value="Huelva">Huelva</option>
                                        <option value="Huesca">Huesca</option>
                                        <option value="Jaén">Jaén</option>
                                        <option value="A Coruña">A Coruña</option>
                                        <option value="La Rioja">La Rioja</option>
                                        <option value="Las Palmas">Las Palmas</option>
                                        <option value="León">León</option>
                                        <option value="Lérida">Lérida</option>
                                        <option value="Lugo">Lugo</option>
                                        <option value="Madrid">Madrid</option>
                                        <option value="Málaga">Málaga</option>
                                        <option value="Melilla">Melilla</option>
                                        <option value="Murcia">Murcia</option>
                                        <option value="Navarra">Navarra</option>
                                        <option value="Ourense">Ourense</option>
                                        <option value="Palencia">Palencia</option>
                                        <option value="Pontevedra">Pontevedra</option>
                                        <option value="Salamanca">Salamanca</option>
                                        <option value="Segovia">Segovia</option>
                                        <option value="Sevilla">Sevilla</option>
                                        <option value="Soria">Soria</option>
                                        <option value="Tarragona">Tarragona</option>
                                        <option value="Tenerife">Tenerife</option>
                                        <option value="Teruel">Teruel</option>
                                        <option value="Toledo">Toledo</option>
                                        <option value="Valencia">Valencia</option>
                                        <option value="Valladolid">Valladolid</option>
                                        <option value="Vizcaya">Vizcaya</option>
                                        <option value="Zamora">Zamora</option>
                                        <option value="Zaragoza">Zaragoza</option>
                                    </select>

                                </div>
                                <div class="col-sm-6">
                                    Fecha de nacimiento:<input type="date" class="form-control form-control-user" id="fecha_nac">
                                </div>
                            </div>

                            <div class="form-group ">

                                <input type="search" class="form-control form-control-user" id="form-address"
                                       placeholder="Direccion...">


                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input placeholder="Portal" type="text" class="form-control form-control-user" id="portal"
                                    >
                                </div>
                                <div class="col-sm-6">
                                    <input placeholder="Piso" type="text" class="form-control form-control-user" id="piso">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select required name="mano" id="mano" class="form-control form-control-user selector">
                                        <option value="" disabled selected>Seleccione una</option>
                                        <option value="Izquierda">Izquierda</option>
                                        <option value="Centro">Centro</option>
                                        <option value="Derecha">Derecha</option>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <input type="number" placeholder="Telefono" class="form-control form-control-user" id="ntel">
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary btn-user btn-block" id="registrar">
                                Register Account
                            </a>
                            <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>

                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="login.html">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/address.js"></script>
<script src="../../resources/ts/login.js"></script>

</body>

</html>
