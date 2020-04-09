<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>PRODUCTOS</title>
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
            <h4 class="bold">REPORTE DE PRODUCTOS</h4>
        </div>
    </div>
    <hr class="my-4">
    <section class="content">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Categoría</th>             
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($productos as $p)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($p->avatar)
                                                <img src="{{ asset('storage/' .$p->avatar) }}" width="60px" height="60px">
                                            @else
                                            <img src="{{ asset('img/productos/default-product.png') }}" width="60px" height="60px">
                                            @endif
                                        </td>
                                        <td><svg id="barcode{{ $p->id }}"></svg></td>
                                        <td>{{ $p->nombre }}</td>
                                        <td>{{ $p->descripcion }}</td>
                                        <td>{{ $p->cantidad }}</td>
                                        <td>{{ $p->precio }}</td>
                                        <td>
                                            @foreach ( $p->categorias as $categoria)
                                                {{ $categoria->nombre }}
                                            @endforeach
                                        </td>
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
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
@foreach ($productos as $p)
<script>
    JsBarcode("#barcode{{ $p->id }}", "{{ $p->codigo }}", {
        fontOptions: "bold",
        height: 35
    });
</script>
@endforeach
</body>
</html>
