<template>
 
              <div class="card-body row">
                <div class="form-group col-12 col-md-8">
                  <label for="proveedor_id">Proveedor</label>
                  <select name="proveedor_id" class="form-control js-example-basic-single">
                    <option value="" disabled selected hidden>Seleccione un proveedor</option>                            
                  </select>
                  
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="impuesto">Impuesto</label>
                    <input type="text" class="form-control" name="impuesto" placeholder="0.18">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="tipo_comprobante">Tipo de comprobante</label>
                    <select name="tipo_comprobante" class="form-control">
                        <option value="" disabled selected hidden>Seleccione tipo de comprobante</option>
                        <option value="Boleta">Boleta</option>
                        <option value="Factura">Factura</option>
                        <option value="Tikect">Tikect</option>
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
                <div class="form-group col-12 col-md-4">
                    <label for="producto_id">Producto</label>
                    <input type="text" class="form-control" name="producto_id" placeholder="Ingresar producto">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="cantidad">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad" placeholder="Ingresar cantidad">
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" name="precio" placeholder="Ingresar precio">
                </div>
              </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
