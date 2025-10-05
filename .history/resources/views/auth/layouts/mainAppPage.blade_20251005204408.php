@extends('auth.layouts.app')

@section('title', 'Manajemen ' . $namaTahfiz)

@section('content')
@if (Auth::check() && (Auth::user()->role == '1' || Auth::user()->role == '2'))
    <section class="section">
        <div class="section-header">
            <h1 id="txtTitlePage">Manajemen {{ $namaTahfiz }} - @{{ titleSection }}</h1>
        </div>

        <div id="divUtama"></div>
    </section>
@endif
@endsection
