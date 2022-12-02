@props(['color'=>'blue','titulo'])
<div class="bg-{{$color}}-100 border-t border-b border-{{$color}}-500 text-{{$color}}-700 px-4 py-3" role="alert">
    <p class="font-bold">{{$titulo}}</p>
    <p class="text-sm">Some additional text to explain said message.</p>
  </div>