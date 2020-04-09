@extends('layouts.app')
@section('titulo', 'Empresa')
@section('content')
<div class="content-wrapper">

    <section class="content pt-3">
        <div class="container-fluid">         
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Información de Empresa</h3>
                
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                              <i class="fas fa-times"></i></button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                              <div class="row">
                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Estimated budget</span>
                                      <span class="info-box-number text-center text-muted mb-0">2300</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Total amount spent</span>
                                      <span class="info-box-number text-center text-muted mb-0">2000</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                  <div class="info-box bg-light">
                                    <div class="info-box-content">
                                      <span class="info-box-text text-center text-muted">Estimated project duration</span>
                                      <span class="info-box-number text-center text-muted mb-0">20 <span>
                                    </span></span></div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <h4>Recent Activity</h4>
                                    <div class="post">
                                      <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                        <span class="username">
                                          <a href="#">Jonathan Burke Jr.</a>
                                        </span>
                                        <span class="description">Shared publicly - 7:45 PM today</span>
                                      </div>
                                      <!-- /.user-block -->
                                      <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore.
                                      </p>
                
                                      <p>
                                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                      </p>
                                    </div>
                
                
                                    
                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                <h4 class="text-primary">
                                  <img height="50" width="50" src="https://via.placeholder.com/150" class="img-fluid img-circle" alt="logo"> 
                                  {{ $empresa->first()->razon_social }}
                                </h4>
                              <p class="text-muted">
                                  {{ $empresa->first()->descripcion }}
                              </p>
                              <br>
                              <div class="text-muted">
                                <p class="text-sm">Dueño de la Empresa
                                  <b class="d-block">Deveint Inc</b>
                                </p>
                                <p class="text-sm">Rubro de la Empresa
                                  <b class="d-block">Tony Chicken</b>
                                </p>
                              </div>
                
                              <h5 class="mt-5 text-muted">Project files</h5>
                              <ul class="list-unstyled">
                                <li>
                                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                                </li>
                                <li>
                                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                                </li>
                                <li>
                                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                                </li>
                                <li>
                                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                                </li>
                                <li>
                                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                                </li>
                              </ul>
                              <div class="text-center mt-5 mb-3">
                                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
                <div style ="position: absolute; bottom: 8px;right:8px;">
                  <a href="{{ url('/admin/configurar') }}" class="btn btn-dark rounded-circle boton-custom" data-toggle="tooltip" data-placement="top" title="Regresar">
                      <i class="fas fa-sign-in-alt fa-flip-horizontal"></i>
                  </a>
                </div>
            </div>
        </div>
    </section>
</div>
@stop