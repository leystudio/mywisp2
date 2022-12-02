@props(['nombre','logo'])
<div class="card">

    <div class="card-body btn btn-dark">
        <a href="{{route('admin.dashboard')}}" class="h3">
            @if ($logo != '')

            <img src="storage/empresas/logos/{{asset($logo)}}" alt="Logo">
            @endif
            <h2 class="font-semibold">
                {{$nombre}}
            </h2>

        </a>
    </div>
</div>