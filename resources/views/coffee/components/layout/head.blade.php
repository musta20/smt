@props(['page'])
<head>
<meta charset="utf-8" >
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{  $title ?? 'store'}} {{$page ? ' | '.$page:''}}</title>
<meta name="description" content="{{  $description ?? 'description' }}">
<meta name="keywords" content="{{  $keyword ?? 'keyword'}}">
<meta name="viewport" content="width=device-width, initial-scale=1">


@if ($favicon)
<link rel="icon" type="image/x-icon" href="{{tenant_asset('media/'.$favicon)}}">
@endif
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=El+Messiri:wght@400..700&family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
@vite(['resources/views/coffee/css/coffee.css','resources/js/alpine.js'])

</head>