<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>COMPRAS</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-1">
            <img src="{{ asset('img/AdminLTELogo.png') }}" class="img-responsive" alt="Responsive image" height="50px" width="50px">
        </div>
        <div class="col-xs-11">
            <h3 class="bold">COMPRA N° {{ str_pad($compra->id, 3, "0", STR_PAD_LEFT) }}-{{ date("Y") }}-JS</h3>
            <p class="text-muted">Juguetería Sajhom</p>
        </div>
    </div>
    <hr class="my-4">
    <section class="content">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-6"><b>Proveedor: </b> {{ mb_strtoupper($compra->nombre) }}</div>
                                <div class="col-xs-6"><b>Tipo de comprobante: </b> {{ mb_strtoupper($compra->tipo_comprobante) }}</div>
                                <div class="col-xs-6"><b>Serie de comprobante: </b> {{ mb_strtoupper($compra->serie_comprobante) }}</div>
                                <div class="col-xs-6"><b>Número de comprobante: </b> {{ mb_strtoupper($compra->numero_comprobante) }}</div>
                            </div>
                            <hr>
                            <table class="table">
                                <thead class="table-dark">
                                  <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Subtotal</th>                              
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                      <th  colspan="3" class="py-0"><p class="mb-0" align="right">Sub Total:</p></th>
                                      <th class="py-0"><p class="mb-0" align="right"><span id="total">S/. {{ $compra->total }}</span> </p></th>
                                  </tr>      
                                  <tr>
                                      <th colspan="3" class="py-0"><p class="mb-0" align="right">IGV (18%):</p></th>
                                      <th class="py-0"><p class="mb-0" align="right"><span id="total_impuesto">S/. {{ $igv = $compra->total * $compra->impuesto}}</span></p></th>
                                  </tr>      
                                  <tr>
                                      <th colspan="3" class="py-0"><p class="mb-0" align="right">Total:</p></th>
                                  <th class="py-0"><p class="mb-0" align="right"><span align="right" id="total_pagar_html">S/. {{ $compra->total + $igv }}</span></p></th>
                                  </tr> 
                                </tfoot>
                                <tbody>
                                  @foreach ($detalles as $d)
                                      <tr>
                                        <td>{{ $d->producto}}</td>
                                        <td>{{ $d->cantidad}}</td>
                                        <td>{{ $d->precio}}</td>
                                        <td>{{ $d->cantidad* $d->precio}}</td>
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
