<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preinscripcion</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 1em;">
  		<span class="navbar-brand mb-0 h1">Bienvenido nombreUsuario</span>
	</nav>

    <div class="jumbotron jumbotron-fluid mx-4">
        <div class="container">
            <h1 class="display-5">CONSULTAS PREINSCRIPTOS CARRERAS</h1>
            <p class="lead">Universidad Tecnológica Nacional</p>
            <hr class="my-2">
            <p>Facultad Regional Pacheco</p>
        </div>
    </div>

    <form class="mx-4">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>Inscripcion</label>
                <select class="custom-select" id="validationCustom04">
                    <option selected disabled value=""></option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
            <label>Año</label>
                <select class="custom-select" id="validationCustom04">
                    <option selected disabled value=""></option>
                    <option>...</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>Instancia</label>
                <select class="custom-select" id="validationCustom04">
                    <option selected disabled value=""></option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Carrera</label>
                <select class="custom-select" id="validationCustom04">
                    <option selected disabled value=""></option>
                    <option>...</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label>Modalidad</label>
                <select class="custom-select" id="validationCustom04">
                    <option selected disabled value=""></option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>Cuales</label>
                <select class="custom-select" id="validationCustom04">
                    <option selected disabled value=""></option>
                    <option>...</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">BUSCAR</button><br>
    </form>

    <form class="m-3">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Apellido</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Modalidad</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Calle</th>
                    <th scope="col">Nro. calle</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Nro. inscripcion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-secondary" type="submit">EXPORTAR RGA</button>
        <button class="btn btn-secondary" type="submit">EXPORTAR A EXCEL</button>
    </form>

</body>
</html