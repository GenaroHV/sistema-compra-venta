@extends('layouts.app')
@section('titulo', 'Detalle de Producto')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-6 ml-auto mr-auto">
                  <h1 class="m-0 text-dark text-center">Detalle de Producto</h1>
              </div>
          </div>
      </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Producto</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="d-flex justify-content-center mt-3">
                            <svg id="barcode"></svg>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between mx-4 px-4 py-2">
                    <div class="col-12 col-md-4">
                      <b>ID:</b>
                    </div>
                    <div class="col-12 col-md-4 text-right">
                      {{ $producto->id }}
                    </div>
                </div>
                <div class="row justify-content-between mx-4 px-4 py-2">
                    <div class="col-12 col-md-4">
                      <b>Nombre:</b>
                    </div>
                    <div class="col-12 col-md-4 text-right">
                      {{ $producto->nombre }}
                    </div>
                </div>
                <div class="row justify-content-between mx-4 px-4 py-2">
                    <div class="col-12 col-md-4">
                      <b>Descripción:</b>
                    </div>
                    <div class="col-12 col-md-4 text-right">
                      {{ $producto->descripcion }}
                    </div>
                </div>
                <div class="row justify-content-between mx-4 px-4 py-2">
                    <div class="col-12 col-md-4">
                      <b>Cantidad:</b>
                    </div>
                    <div class="col-12 col-md-4 text-right">
                      {{ $producto->stock }}
                    </div>
                </div>
                <div class="row justify-content-between mx-4 px-4 py-2">
                    <div class="col-12 col-md-4">
                      <b>Precio:</b>
                    </div>
                    <div class="col-12 col-md-4 text-right">
                      {{ $producto->precio }}
                    </div>
                </div>
                <div class="row justify-content-between mx-4 px-4 py-2">
                    <div class="col-12 col-md-4">
                      <b>Categoría:</b>
                    </div>
                    <div class="col-12 col-md-4 text-right">
                        @foreach ( $producto->categorias as $categoria)
                            {{ $categoria->nombre }}
                        @endforeach
                    </div>
                </div>
                <a href="{{route('admin.productos.index') }}" class="btn btn-primary btn-lg btn-block">Regresar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@stop
@push('js')
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<script>
    JsBarcode("#barcode", "{{ $producto->codigo }}", {
        fontOptions: "bold"
    });
</script>
@endpush()
