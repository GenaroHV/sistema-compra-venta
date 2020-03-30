@extends('layouts.app')
@section('titulo', 'Detalle de Compra')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6 ml-auto mr-auto">
                    <h1 class="m-0 text-dark text-center">Detalle de Venta</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i> Jugueteria SAJHOM
                      <small class="float-right">Fecha: {{ \Carbon\Carbon::parse($venta->fecha_hora)->format('d/m/Y') }}</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    Cliente
                    <address>
                      <strong>{{ $venta->nombre }}</strong>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    Vendedor
                    <address>
                      <strong>Jugueteria SAJHOM</strong>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <b>{{ $venta->tipo_comprobante }}</b><br>
                    <b>Serie:  #{{ $venta->serie_comprobante }}</b><br>
                    <b>Orden ID:</b> {{ $venta->numero_comprobante }}<br>
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
                          <td>S/. {{ number_format($venta->total, 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                          <th>IGV (18%)</th>
                          <td>S/. {{ number_format($venta->total * $venta->impuesto, 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td>S/. {{ number_format( $venta->total + ($venta->total * $venta->impuesto) , 2, '.', ',') }}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    <a href="{{ route('admin.ventas.print', $venta->id) }}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Imprimir</a>
                    <a href="{{ route('admin.ventas.pdf', $venta->id)}}" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                      <i class="fas fa-download"></i> Generar PDF
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
</div>
@stop