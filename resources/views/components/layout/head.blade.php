<head>
<meta charset="utf-8" >
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{  $title ?? 'test style'}} </title>
<meta name="description" content="{{  $description ?? 'description' }}">
<meta name="keywords" content="{{  $keyword ?? 'keyword'}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
@if ($favicon)
<link rel="icon" type="image/x-icon" href="{{tenant_asset('media/'.$favicon)}}">

@endif

@vite(['resources/css/app.css','resources/js/app.js'])

</head>