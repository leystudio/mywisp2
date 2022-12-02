<div class="card">
    <div class="card-body">
        <form enctype="multipart/form-data" action="{{route('empresa.logo')}}" method="POST">
            @csrf

            <div class="form-group">
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <div class="d-flex justify-content-center">
                        @if ($item->image)

                        <img class="card-img w-50" src={{$item->image['url']}}>


                        @else
                    </div>
                    <br>
                    <i class="text-danger">Seleccione un logo</i>

                    @endif

                    <input type="file" class="form-control mb-3 visually-hidden " id="select_logo" placeholder="logo"
                        name="logo" accept="image/*">
                    <br>
                    @error('logo')
                    <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>


            </div>
            <div class="card-footer grid text-center">

                <div class="btn-group g-col-12">

                    <button class="btn btn-success btn_cambiar_logo" type="submit" value="Crear">Guardar</button>
                    <div class="btn btn-primary btn_select_logo">Seleccionar</div>
                    <div class="btn btn-danger btn_cancel_logo">Cancelar</div>
                </div>
            </div>

        </form>


        @if ($item->image)
        <form action="{{route('empresa.eliminar_logo')}}" method="get">
            @csrf
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn text-danger  btn-sm eliminar_logo">Eliminar mi logo</button>
            </div>
        </form>
        @endif
    </div>
</div>