@if($model->avatar)
    <a href="" data-toggle="modal" data-target="#modalImagenProducto{{ $model->id }}">
        <img src="{{ asset("storage/".$model->avatar) }}" class="img-fluid" width="60px" height="60px">
    </a>
@else
    <a href="" data-toggle="modal" data-target="#modalImagenProducto{{ $model->id }}">
        <img src="{{ asset("storage/img/productos/default-product.png") }}" class="img-fluid" width="60px" height="60px">
    </a>
@endif