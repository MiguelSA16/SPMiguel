@extends('layouts.front.vertical')
@section('titulo')
    Inicio
@endsection

@section('cuerpo')
    @include('comun.front.carusel')
    @include('comun.front.carusel-items')
    @include('comun.front.familias')
    @include('comun.front.newsletter')
    @include('comun.front.certificados')
@endsection
