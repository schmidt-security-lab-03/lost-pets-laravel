<!doctype html>
<html lang="pt-BR">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>@yield('title', 'Laços de Volta')</title><link rel="stylesheet" href="{{ asset('app.css') }}"></head>
<body>
<header class="topbar"><a class="brand" href="{{ route('home') }}"><span aria-hidden="true">✦</span> Laços de Volta</a><nav><a href="{{ route('pets.index') }}">Ver animais</a><a href="{{ route('pets.create') }}" class="button">Cadastrar aviso</a></nav></header>
<main class="container">@if(session('status'))<p role="status" class="notice">{{ session('status') }}</p>@endif @yield('content')</main>
<footer class="container footer">Cada aviso pode aproximar um reencontro. Dados demonstrativos são fictícios.</footer>
</body></html>
