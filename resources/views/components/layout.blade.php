<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $metaTitle ?? "Default Title" }}</title>
    <meta name="description" content="{{ $metaDescription ?? "Default Description" }}">


</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<x-partials.navigation/>

@session('status')
<div>
    {{ $value }}
</div>
@endsession

{{ $slot }}
@isset($sidebar)

    <div id="sidebar">
        <h3>Sidebar</h3>

        {{ $sidebar }}

    </div>
@endisset
</body>
</html>

