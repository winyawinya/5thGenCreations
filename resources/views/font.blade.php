<x-layout>
@php
 $fonts = [
    'bebasfont',
    'playfairfont',
    'otomanopeefont',
    'uchenfont',
    'cursivefont',
    'antonfont',
    'arbutusslabfont',
    'caveatfont',
    'arapeifont',
    'lorafont',
    'gagalinfont',
    'kaushanfont',
    'hammersmithfont',
     ];   
@endphp

    <div class="container bg-white p-3">
        @foreach ($fonts as $font)
            <div class="{{$font}} border border-dark border-1 p-4">
                <h3>{{ucfirst(str_replace('font',' ',$font))}}</h3>
                <h4>
                    ABCDEFGHIJKLMNOPQRSTUVWXYZ      <b>ABCDEFGHIJKLMNOPQRSTUVWXYZ</b>
                    <br> 
                    abcdefghijklmnopqrstuvwxyz      <b>abcdefghijklmnopqrstuvwxyz</b>
                </h4>
            </div>
        @endforeach 
    </div>

</x-layout>