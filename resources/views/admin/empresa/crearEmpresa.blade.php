<x-app-layout>

    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-4 mt-5">

                            <h2 class="h3">Informacion de su empresa</h2>


                            <div class="mt-5">

                                Relleno los campos con la informacion basica de su empresa para empezar.<br>



                            </div>
                        </div>
                        <div class="col-8">


                            <form {{-- enctype="multipart/form-data" --}} action="{{route('empresa.store')}}"
                                method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input required type="text" class="form-control" id="nombre" name="nombre">
                                    @error('nombre')
                                    <small class='text-danger'>{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slogan" class="form-label">Slogan</label>
                                    <input type="text" class="form-control mb-3" id="slogan" name="slogan">
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Direccion</label>
                                    <input type="text" class="form-control mb-3" id="direccion" name="direccion">
                                </div>
                                <div class="mb-3">
                                    <label for="contacto" class="form-label">Contacto</label>
                                    <input type="number" class="form-control mb-3" id="contacto" name="rnc">
                                </div>

                                <div class="row pb-5">
                                    <div class="col d-flex justify-center">
                                        <button class="btn border border-primary" type="submit"
                                            value="Crear">Registrar</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>