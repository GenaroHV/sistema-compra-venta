@extends('layouts.app')
@section('titulo', 'Crear Compra')
@section('content')
<div class="content-wrapper">

  <section class="content pt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header py-1">
              <h3 class="card-title pt-2 mb-0 pb-0">
                <b>REALIZAR COMPRA</b>                            
              </h3>
              <div class="float-right">
                <a href="{{ URL::previous() }}" class="btn btn-primary">
                  <i class="fas fa-sign-in-alt fa-flip-horizontal"></i> Regresar
                </a>
              </div>
            </div>
            <form role="form" action="{{ route('admin.compras.store') }}" method="POST">
              @csrf @method('POST')
              <div class="card-body row">
                <div class="form-group col-12 col-md-12">
                    <label for="proveedor_id">Proveedor</label>
                    <select name="proveedor_id" class="form-control js-example-basic-single">
                      <option value="" disabled selected hidden>Seleccione un proveedor</option>
                      @foreach ($proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{ $proveedor->nombre }}</option>
                      @endforeach                              
                    </select>                  
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="tipo_comprobante">Tipo de comprobante</label>
                    <select name="tipo_comprobante" class="form-control">
                        <option value="" disabled selected hidden>Seleccione una opción</option>                        
                        @foreach($tipo_comprobante as $item)
                          <option value="{{ $item }}"> {{ strtoupper($item) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="serie_comprobante">Serie de comprobante</label>
                    <input type="text" class="form-control" name="serie_comprobante" placeholder="Ingresar serie">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="numero_comprobante">Número de comprobante</label>
                    <input type="text" class="form-control" name="numero_comprobante" placeholder="Ingresar número">
                </div>
                <div class="card container-fluid bg-light border border-secondary">
                  <div class="card-body row">
                    <div class="form-group col-12 col-md-4">
                      <label for="producto_id">Producto</label>
                      <select name="for_producto_id" id="for_producto_id" class="form-control js-example-basic-single">
                        <option value="" disabled selected hidden>Seleccione un producto</option>
                          @foreach ($productos as $producto)
                              <option value="{{$producto->id}}">{{ $producto->nombre .' - '. $producto->codigo }}</option>
                          @endforeach                              
                      </select>  
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" class="form-control" name="for_cantidad" id="for_cantidad" placeholder="Ingresar cantidad">
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="for_precio" id="for_precio" placeholder="Ingresar precio">
                    </div>
                    <div class="form-group col-12 col-md-2">
                      <br>
                      <input type="button" class="btn btn-info mt-2" id="btn_add" value="Agregar">
                    </div>

                    <div class="form-group col-12">
                      <div class="table-responsive">
                        <table id="detalles" class="table">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">Opciones</th>
                              <th scope="col">Producto</th>
                              <th scope="col">Cantidad</th>
                              <th scope="col">Precio</th>
                              <th scope="col">Subtotal</th>                              
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                                <th  colspan="4" class="py-0"><p class="mb-0" align="right">Sub Total:</p></th>
                                <th class="py-0"><p class="mb-0" align="right"><span id="total">S/. 0.00</span> </p></th>
                            </tr>      
                            <tr>
                                <th colspan="4" class="py-0"><p class="mb-0" align="right">IGV (18%):</p></th>
                                <th class="py-0"><p class="mb-0" align="right"><span id="total_impuesto">S/. 0.00</span></p></th>
                            </tr>      
                            <tr>
                                <th colspan="4" class="py-0"><p class="mb-0" align="right">Total:</p></th>
                                <th class="py-0"><p class="mb-0" align="right"><span align="right" id="total_pagar_html">S/. 0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                            </tr> 
                          </tfoot>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right row" id="guardar">
                @csrf
                <div class="d-inline col-6">
                  <button type="reset" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                </div>
                <div class="d-inline col-6">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Crear</button>
                </div>              
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
@stop
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container .select2-selection--single {
    display: block !important;
    width: 100% !important;
    height: calc(2.25rem + 2px) !important;
    padding: .375rem .75rem !important;
    font-size: 1rem !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    border: 1px solid #ced4da !important;
    border-radius: .25rem !important;
    box-shadow: inset 0 0 0 transparent !important;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
}
</style>
@endpush
@push('js')
<script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
      $('#btn_add').click(function(){
        agregar();
      });
    });
    var cont = 0;
    total = 0;
    subtotal = [];
    $("#guardar").hide();

    function agregar(){
      producto_id = $("#for_producto_id").val();
      producto = $("#for_producto_id option:selected").text();
      cantidad = $("#for_cantidad").val();
      precio = $("#for_precio").val();
      impuesto = 0.18;

      if( producto_id != "" && cantidad != "" && cantidad>0 && precio != ""){
        subtotal[cont] = (cantidad*precio);
        total = total + subtotal[cont];
        var fila = '<tr class="selected" id="fila' +cont+'"><td><button type="button" class="btn btn-warning rounded-circle" onclick="eliminar('+cont+');"><i class="fas fa-times"></i></button></td><td><input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio[]" value="'+precio+'"></td><td>S/.'+subtotal[cont]+'</td></tr>';
        cont++;
        limpiar();
        totales();        
        evaluar();
        $("#detalles").append(fila);
      }else{
        alert('error al ingresar detalle de compra');
      }
    }

    function limpiar(){
      $("#for_cantidad").val("");
      $("#for_precio").val("");
    }

    function totales(){
      $("#total").html("S/. " + total.toFixed(2));
      total_impuesto=total*impuesto;
      total_pagar=total+total_impuesto;
      $("#total_impuesto").html("S/. " + total_impuesto.toFixed(2));
      $("#total_pagar_html").html("S/. " + total_pagar.toFixed(2));
      $("#total_pagar").val(total_pagar.toFixed(2));
    }
    function evaluar(){
      if (total > 0) {
        $("#guardar").show();
      } else {
        $("#guardar").hide();
      }
    }
    function eliminar(index){
      total = total - subtotal[index];
      total_impuesto= total* impuesto;
      total_pagar_html = total + total_impuesto;

      $("#total").html("S/." + total);
      $("#total_impuesto").html("S/." + total_impuesto);
      $("#total_pagar_html").html("S/." + total_pagar_html);
      $("#total_pagar").val(total_pagar_html.toFixed(2));

      $("#fila" + index).remove();
      evaluar();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endpush