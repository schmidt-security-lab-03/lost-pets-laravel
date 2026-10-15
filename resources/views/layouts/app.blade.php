<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>@yield('title', 'Paws Back Home')</title><link rel="stylesheet" href="{{ asset('app.css') }}"></head>
<body>
<header class="topbar"><a class="brand" href="{{ route('home') }}"><span aria-hidden="true">✦</span> Paws Back Home</a><nav><a href="{{ route('pets.index') }}">Browse pets</a><a href="{{ route('pets.create') }}" class="button">Create report</a></nav></header>
<main class="container">@if(session('status'))<p role="status" class="notice">{{ session('status') }}</p>@endif @yield('content')</main>
<footer class="container footer">Every report can bring a reunion closer. Demonstration records are fictional.</footer>
</body></html>
