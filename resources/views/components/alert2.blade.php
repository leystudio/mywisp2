@props(['color'=>'red'])
<div role="alert">

    <div class="bg-{{$color}}-500 text-white font-bold rounded-t px-4 py-2">
      {{$titulo}}
    </div>
    <div {{$attributes->merge(['class'=>"border border-t-0 border-$color-400 rounded-b bg-$color-100 px-4 py-3 text-$color-700"])}}>
      <p>{{$slot}}</p>
    </div>
  </div>