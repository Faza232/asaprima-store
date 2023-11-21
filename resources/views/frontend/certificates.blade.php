@extends('layout.main')
@section('container')
<div class="container mx-auto px-40">
    @foreach($sertifikats as $sertifikat)
    <img class="w max flex"
    src="{{ $sertifikat->image }}"
    alt="image">
    @endforeach

</div>


@endsection