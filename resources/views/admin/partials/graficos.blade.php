<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-1">
              <h3 class="card-title">
                <b>GRÁFICOS ESTADÍSTICOS</b>                            
              </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($totales as $total)                                  
                        <div class="col-lg-4 mr-auto ml-auto">
                            <div class="info-box mb-3 bg-info">
                                <span class="info-box-icon"><i class="fas fa-shopping-basket"></i></span>                            
                                <div class="info-box-content">
                                    <span class="info-box-text">Compras del mes actual</span>
                                    <span class="info-box-number">S/. {{$total->totalcompra}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mr-auto ml-auto">
                            <div class="info-box mb-3 bg-lightblue">
                                <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>                            
                                <div class="info-box-content">
                                    <span class="info-box-text">Ventas del mes actual</span>
                                    <span class="info-box-number">S/. {{$total->totalventa}}</span>
                                </div>
                            </div>
                        </div>                                
                    @endforeach
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                      <span class="text-bold text-lg">Compra Anual</span>
                                    </p>
                                </div>                                  
                                <canvas id="compraAnual"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                      <span class="text-bold text-lg">Venta Anual</span>
                                    </p>
                                </div>                                  
                                <canvas id="ventaAnual"></canvas>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                      <span class="text-bold text-lg">Compras del mes</span>
                                    </p>
                                </div>                                  
                                <canvas id="compras"></canvas>
                            </div>
                        </div>
                    </div>              
                    
                    <div class="col-lg-6">
                      <div class="card">
                          <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                  <span class="text-bold text-lg">Ventas del mes</span>
                                </p>
                            </div>                      
                            <canvas id="ventas"></canvas>
                          </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                              <div class="d-flex">
                                  <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Compras del día</span>
                                  </p>
                              </div>                      
                              <canvas id="comprasDia"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                              <div class="d-flex">
                                  <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">Ventas del día</span>
                                  </p>
                              </div>                      
                              <canvas id="ventasDia"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script>
    var varCompraAnual=document.getElementById('compraAnual').getContext('2d');
    var charCompraAnual = new Chart(varCompraAnual, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($comprasanual as $reg){            
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                $anual_traducido=strftime('%Y',strtotime($reg->anual));

                echo '"'. $anual_traducido.'",';
            } ?>],
            datasets: [{
                label: 'Compra Anual',
                data: [<?php foreach ($comprasanual as $reg)
                    {echo ''. $reg->totalanual.',';} ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth:1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    var varVentaAnual=document.getElementById('ventaAnual').getContext('2d');
    var charVentaAnual = new Chart(varVentaAnual, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($ventasanual as $reg){            
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                $anual_traducido=strftime('%Y',strtotime($reg->anual));

                echo '"'. $anual_traducido.'",';
            } ?>],
            datasets: [{
                label: 'Venta Anual',
                data: [<?php foreach ($ventasanual as $reg)
                    {echo ''. $reg->totalanual.',';} ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth:1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    var varCompra=document.getElementById('compras').getContext('2d');
    var charCompra = new Chart(varCompra, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($comprasmes as $reg){            
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                $mes_traducido=strftime('%B',strtotime($reg->mes));

                echo '"'. $mes_traducido.'",';
            } ?>],
            datasets: [{
                label: 'Compras',
                data: [<?php foreach ($comprasmes as $reg)
                    {echo ''. $reg->totalmes.',';} ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth:1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    var varVenta=document.getElementById('ventas').getContext('2d');
    var charVenta = new Chart(varVenta, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($ventasmes as $reg)
        {
            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
            $mes_traducido=strftime('%B',strtotime($reg->mes));
            
            echo '"'. $mes_traducido.'",';} ?>],
            datasets: [{
                label: 'Ventas',
                data: [<?php foreach ($ventasmes as $reg)
                {echo ''. $reg->totalmes.',';} ?>],
                backgroundColor: [
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 159, 64, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });

    var varVentaDia=document.getElementById('ventasDia').getContext('2d');
    var charVentaDia = new Chart(varVentaDia, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($ventasdia as $r){           
                setlocale(LC_TIME, "es_ES.UTF-8");
                $dia_traducido=strftime("%A %d",strtotime($r->dia));

                echo '"'. $dia_traducido.'",';
            } ?>],
            datasets: [{
                label: 'Ventas del día',
                data: [<?php foreach ($ventasdia as $r)
                    {echo ''. $r->totaldia.',';} ?>
                    ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth:1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    }); 

    var varCompraDia=document.getElementById('comprasDia').getContext('2d');
    var charCompraDia = new Chart(varCompraDia, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($comprasdia as $r){           
                setlocale(LC_TIME, "es_ES.UTF-8");
                $dia_traducido=strftime("%A %d",strtotime($r->dia));

                echo '"'. $dia_traducido.'",';
            } ?>],
            datasets: [{
                label: 'Compras del día',
                data: [<?php foreach ($comprasdia as $r)
                    {echo ''. $r->totaldia.',';} ?>
                    ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth:1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    }); 

</script>
@endpush