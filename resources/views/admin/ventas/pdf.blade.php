{{--  
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Juguetería SAJHOM | Impresión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Jugueteria SAJHOM
          <small class="float-right">Fecha: {{ \Carbon\Carbon::parse($compra->fecha_hora)->format('d/m/Y') }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
        Proveedor
        <address>
            <strong>{{ $compra->nombre }}</strong>
        </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        Comprador
        <address>
            <strong>Jugueteria SAJHOM</strong>
        </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <b>{{ $compra->tipo_comprobante }}</b><br>
        <b>Serie:  #{{ $compra->serie_comprobante }}</b><br>
        <b>Orden ID:</b> {{ $compra->numero_comprobante }}<br>
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
          <table class="table border">
            <thead class="table-dark">
            <tr>
              <th scope="col">Producto</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Precio</th>
              <th scope="col">Subtotal</th> 
            </tr>
            </thead>
            <tbody>
              @foreach ($detalles as $d)
              <tr>
                <td>{{ $d->producto}}</td>
                <td>{{ $d->cantidad}}</td>
                <td>S/. {{ number_format($d->precio, 2, '.', ',') }}</td>
                <td>S/. {{ number_format($d->cantidad * $d->precio, 2, '.', ',')}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Métodos de Pago:</p>
          <img src="{{ asset('img/credit/visa.png') }}" alt="Visa">
          <img src="{{ asset('img/credit/mastercard.png') }}" alt="Mastercard">
          <img src="{{ asset('img/credit/american-express.png') }}" alt="American Express">
          <img src="{{ asset('img/credit/paypal2.png') }}" alt="Paypal">

          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            El pago se realizará una vez efectuada la entrega de los productos.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-6">
          <p class="lead">Monto a pagar</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>S/. {{ number_format($compra->total, 2, '.', ',') }}</td>
              </tr>
              <tr>
                <th>IGV (18%)</th>
                <td>S/. {{ number_format($compra->total * $compra->impuesto, 2, '.', ',') }}</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>S/. {{ number_format( $compra->total + ($compra->total * $compra->impuesto) , 2, '.', ',') }}</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
--}}

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
