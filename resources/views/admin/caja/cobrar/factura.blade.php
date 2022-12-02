<div class="contenedor_factura">
    <div class=" btn_cerrar_factura d-flex justify-content-end">
        <i class="btn text-danger">x</i>
    </div>

    <div id="factura">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">



        <div class='card'>
            <div class='card-header'>
                <div class="container">
                    <div class="row">
                        <div class="col-4 d-flex justify-content-center">
                            <h1 class="d-flex align-items-center ">Factura</h1>
                        </div>
                        <div class="col-4 d-flex justify-content-center">
                            <img class="logo_emp" alt="Logo" style="max-width: 5rem">
                        </div>
                        <div class="col-4 d-flex justify-content-center ">
                            <h3 class="d-flex  align-items-center" id="div_nombre_empresa"></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <i class="text-muted">Datos de usuario</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label">Id. </label>
                                <span id="id_usuario"></span>

                                {{-- <input type="text" id="id_usuario" class="form-control border-0" readonly> --}}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label class="form-label" for="nombre">Usuario</label>
                                <br>
                                <span id="nombre_usuario"></span>

                                {{-- <input type="text" id="nombre_usuario" class="form-control usuario border-0"
                                    readonly> --}}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="descripcion" class="form-label">Descripcion de servicio</label>
                                <br>
                                <span id="descripcion_servicio"></span>
                                {{-- <input type="text" id="descripcion_servicio" class="form-control border-0"
                                    readonly> --}}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <i class="text-muted">Datos de factura</i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="monto" class="form-label">Monto</label>
                                <br>
                                <span id="monto"></span>

                                {{-- <input type="text" id="monto" class="form-control border-0" readonly> --}}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="fecha_pago" class="form-label">Se ha generado</label>
                                <br>
                                <span id="fecha_pago"></span>
                                {{-- <input type="text" id="fecha_pago" class="form-control border-0" readonly> --}}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="fecha_limite" class="form-label">Limite de
                                    pago</label>
                                <br>
                                <span id="fecha_limite"></span>
                                {{-- <input type="text" id="fecha_limite" class="form-control border-0" readonly> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <p>fecha de pago: <b id="f_de_p"></b> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">

        <div class="btn_imprimir_factura me-5 mb-4 btn btn-primary">
            Imprimir
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>