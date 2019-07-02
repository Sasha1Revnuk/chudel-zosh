@extends('layouts.page')
@if($data['banner'])
    @section('banner')
        @include('layouts.banners')
    @endsection
@endif
@section('content')
    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                @if (request()->session()->has('Send'))
                <div class="alert alert-success" role="alert">
                    {{request()->session()->pull('Send')}}
                </div>

                @endif
                <div class="col-md-4 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Адреса</h3>
                        <p>{{$data['settings']['address']}}</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Телефон</h3>
                        <p>{{$data['settings']['phone']}}</p>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="bg-light align-self-stretch box p-4 text-center">
                        <h3 class="mb-4">Email</h3>
                        <p>{{$data['settings']['email']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
        <div class="container">
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
                    <form action="/contacts" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Ім'я" value="{{$data['user'] ? $data['user']->full_name : ''}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{$data['user'] ? $data['user']->email : ''}}">
                        </div>
                        <div class="form-group">
                            <textarea name="text" id="" cols="30" rows="7" class="form-control" placeholder="Повідомлення"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Відправити повідомлення" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1248.7105636427534!2d26.727243!3d51.2481551!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4f21263aeb2fb585!2sChudel%CA%B9s%CA%B9ka+Zahal%CA%B9noosvitnya+Shkola+I-Iii+Stupeniv!5e0!3m2!1sru!2sua!4v1562098930928!5m2!1sru!2sua" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection