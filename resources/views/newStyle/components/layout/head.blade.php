@props(['page'])
<head>
<meta charset="utf-8" >
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{  $title ?? 'store'}} | {{$page ?? ''}}</title>
<meta name="description" content="{{  $description ?? 'description' }}">
<meta name="keywords" content="{{  $keyword ?? 'keyword'}}">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

@if ($favicon)
<link rel="icon" type="image/x-icon" href="{{tenant_asset('media/'.$favicon)}}">
@endif

@vite(['resources/views/newStyle/css/nordic.css','resources/js/alpine.js'])

</head>