
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

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>