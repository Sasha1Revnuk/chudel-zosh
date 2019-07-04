<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$data['title']}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{asset('/admin/img/favicon.ico')}}">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<div class="py-2 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
                        <span class="text">{{$data['settings']['address']}}</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">{{$data['settings']['email']}}</span>
                    </div>
                    <div class="col-md-4 pr-4 d-flex topper align-items-center">
                        <div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">{{$data['settings']['phone']}}</span>
                    </div>
                    <div class="col-md pr-3 d-flex topper align-items-center">
                        @if($data['user'] == null)
                            <span class="text"><a href="/login" class="text" >[Авторизація]</a> <a class="text" href="/register">[Реєстрація]</a> </span>
                        @else
                            <span class="text">{!! $data['role']->role_id == \App\Models\User::ROLE_USER ? implode(' ', $data['userName']) . '<a href="' . '/logout' . '" class="' . 'text' . '"> [Вийти]</a>' : '<a href="' . '/adm' . '" class="' . 'text' . '">' . implode(' ', $data['userName']) . '</a>' !!}</span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.menu')
<!-- END nav -->
