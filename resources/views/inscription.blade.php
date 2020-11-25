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

    <form action="" method="post">
        @csrf
        <div class="row  mx-4 mb-3">
            <div class="col-md-10">
                <label>Inscripción</label>
                <select  class="form-control" name=comboInscripcion required="required">
                    <option value="test1" >test1</option>
                    <option value="test2" >test2</option>
                    <option value="test3" >test3</option>
                <!--@isset($inscripciones)
                        @foreach($inscripciones as $inscripcion)
                            <option value="{{$inscripcion->id}}">{{$inscripcion->descripcion}}</option>
                        @endforeach
                    @endisset -->
                </select>
            </div>
            <div class="col-md-2">
            <label>Año</label>
                <select  class="form-control" name=comboAño required="required">
                    @isset($años)
                        @foreach($años as $año)
                            <option value="{{$año->id}}">{{$año->descripcion}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

        <div class="row mx-4 mb-3">
            <div class="col-md-6">
                <label>Instancia</label>
                <select  class="form-control" name=comboInstancia required="required">
                    @isset($instancias)
                        @foreach($instancias as $instancia)
                            <option value="{{$instancia->inst_id}}">{{$instancia->descripcion}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="col-md-6">
                <label>Carrera</label>
                <select  class="form-control" name=comboCarrera required="required">
                    @isset($carreras)
                        @foreach($carreras as $carrera)
                            <option value="{{$carrera->id}}">{{$carrera->descripcion}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
        </div>

        <div class="row mx-4 mb-3">
            <div class="col-md-3">
                <label>Modalidad</label>
                <select  class="form-control" name=comboModalidad required="required">
                    @isset($modalidades)
                        @foreach($modalidades as $modalidad)
                            <option value="{{$modalidad->id}}">{{$modalidad->descripcion}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="col-md-3">
                <label>Cuales</label>
                <select  class="form-control" name=comboCuales required="required">
                    @isset($cuales)
                        @foreach($cuales as $cual)
                            <option value="{{$cual->id}}">{{$cual->descripcion}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="col-md-2 align-self-end">
                <button class="btn btn-primary" type="submit">BUSCAR</button><br>
            </div>
        </div>
    </form>

    <form class="m-3" action="" method="">
        @csrf
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