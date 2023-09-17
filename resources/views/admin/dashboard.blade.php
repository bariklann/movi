@extends('admin.layouts.base')
@section('title', 'dashboard')

@section('page')
    <h1>Dashboard</h1>
@endsection
@section('content')
    {{-- <h1>Selamat datang Kak, Husni ;)</h1> --}}
    <h1>Selamat datang Kak, {{ auth()->user()->name}}</h1>
@endsection

