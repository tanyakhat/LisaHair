@extends('layouts.main')

@section('title', 'Lisa - студия наращивания и реконструкции волос')

@section('content')

    @include('services.services-info')
    @include('stocks.stocks')
    @include('masters.masters-lisa')
    @include('faq.faq')
    @include('footers.footer')
    @include('online-registration.Online-registration')


@endsection
