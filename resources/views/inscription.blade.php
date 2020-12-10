<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preinscripcion</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 1em;">
  		<span class="navbar-brand mb-0 h1">Bienvenido {{Session::get('login')}}</span>
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
                <select  class="form-control" id="comboInscripcion" required="required">
                    <option value="inscripcion1" >inscripcion1</option>
                    <option value="inscripcion2" >inscripcion2</option>
                    <option value="inscripcion3" >inscripcion3</option>
                    @isset($inscripciones)
                        @foreach($inscripciones as $inscripcion)
                            <option value="{{$inscripcion->id}}">{{$inscripcion->descripcion}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="col-md-2">
                <label>Año</label>
                <select  class="form-control" id="comboAño" required="required">
                <option value="año1" >año1</option>
                <option value="año2" >año1</option>
                </select>
            </div>
        </div>

        <div class="row mx-4 mb-3">
            <div class="col-md-6">
                <label>Instancia</label>
                <select  class="form-control" id="comboInstancia" required="required">
                    <option value="instancia1" >instancia1</option>
                    <option value="instancia2" >instancia2</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Carrera</label>
                <select  class="form-control" id="comboCarrera" required="required">
                    <option value="carrera1" >carrera1</option>
                </select>
            </div>
        </div>

        <div class="row mx-4 mb-3">
            <div class="col-md-3">
                <label>Modalidad</label>
                <select  class="form-control" id="comboModalidad" required="required">
                    <option value="modalidad1" >modalidad1</option>
                    @isset($modalidades)
                        @foreach($modalidades as $modalidad)
                            <option value="{{$modalidad->id}}">{{$modalidad->descripcion}}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="col-md-3">
                <label>Cuales</label>
                <select  class="form-control" id="comboCuales" required="required">
                    <option value="1" >TODAS</option>
                    <option value="2" >CON NRO. DE INSCRIPCION</option>
                    <option value="3" >SIN NRO. DE INSCRIPCION</option>
                </select>
            </div>
            <div class="col-md-2 align-self-end">
                <button class="btn btn-primary" type="submit">BUSCAR</button><br>
            </div>
        </div>
    </form>

    <form class="m-3" action="" method="post">
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
        <button class="btn btn-secondary" name ="RGA" type="submit">EXPORTAR RGA</button>
        <button class="btn btn-secondary" name ="EXCEL" type="submit">EXPORTAR A EXCEL</button>
    </form>

    <script type="text/javascript">

        $('#comboInscripcion').change(function(){
            
            //console.log($(this).val());
            var id = $(this).val();
            var option=" ";

            $.ajax({
				type:'get',
				url:'{!!URL::to('buscarAnios')!!}',
				data:{'id':id},
				success:function(anios){
					console.log('test');
					//console.log(anios);
					//console.log(anios.length);
					option+='<option value="0" selected disabled>...</option>';
					for(var i=0;i<anios.length;i++){
					option+='<option value="'+anios[i]+'">'+anios[i]+'</option>';
				   }
                   //Se vacia el dropdown por si hay años de otra instancia.
				   $('#comboAño').html(" ");
                   //Se cargan los años al dropdown.
                   $('#comboAño').append(option);
				},
				error:function(){
                    console.log('no');
				}
			});
        });

        $('#comboAño').change(function(){
            //console.log($(this).val());

            var anio = $(this).val();
            var option=" ";

            $.ajax({
				type:'get',
				url:'{!!URL::to('buscarInstancias')!!}',
				data:{'anio':anio},
				success:function(instancia){
					console.log('testAnio');
					//console.log(instancia);
					//console.log(instancia.length);
					option+='<option value="0" selected disabled>...</option>';
					for(var i=0;i<instancia.length;i++){
					option+='<option value="'+instancia[i].idInscripcion+'">'+instancia[i].descripcion+'</option>';
				   }
				   $('#comboInstancia').html(" ");
                   $('#comboInstancia').append(option);
				},
				error:function(){
                    console.log('noAnio');
				}
			});
        });    

        $('#comboInstancia').change(function(){
            //console.log($(this).val());

            var idInscripcion = $(this).val();
            var option=" ";

            $.ajax({
				type:'get',
				url:'{!!URL::to('buscarCarreras')!!}',
				data:{'idInscripcion':idInscripcion},
				success:function(carreras){
					console.log('testCarreras');
					//console.log(carreras);
					//console.log(carreras.length);
					option+='<option value="0" selected disabled>...</option>';
					for(var i=0;i<carreras.length;i++){
					option+='<option value="'+carreras[i].id+'">'+carreras[i].descripcion+'</option>';
				   }
				   $('#comboCarrera').html(" ");
                   $('#comboCarrera').append(option);
				},
				error:function(){
                    console.log('noCarreras');
				}
			});
        });
    </script>
</body>
</html