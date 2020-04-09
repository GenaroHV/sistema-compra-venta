<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>CATEGORIAS</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 text-center">           
            <div class="text-center">                
                <img src="{{ asset('img/AdminLTELogo.png') }}" 
                    style="display:inline-block;
                    height: 40px;
                    vertical-align: middle;">
                <p style="display:inline-block;" class="text-muted"> JUGUETERIA SAJHOM</p>                
            </div>             
            <h4 class="bold">REPORTE DE CATEGORIAS</h4>
        </div>
    </div>
    <hr class="my-4">
    <section class="content">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>                          
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($categorias as $c)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $c->nombre }}</td>
                                        <td>{{ $c->descripcion }}</td>
                                      </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</body>
</html>
