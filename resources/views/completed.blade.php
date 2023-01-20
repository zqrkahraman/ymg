@extends('layouts.index')

@section('title', 'Completed')
@section('description', '')

@section('content')
    <div class="user-information pt-4">
        <div class="container">
            <div class="shortcut mb-3">
                {{ __('main.payment.payment-details') }}
                <i class="fa-solid fa-angle-right"></i> 
                <strong>{{ __('main.payment.completed') }}</strong>
            </div>
            <h1>{{ __('main.payment.completed-title') }}</h1>
        </div>

        <form class="needs-validation completed" novalidate>
            <div class="container mt-lg-3 mt-0">
                <div class="row">
                    <div class="col-12 mb-3 mt-3 text-center">
                        <i class="fa-sharp fa-solid fa-circle-check check"></i>
                        <strong>{{ __('main.payment.order-number') }}: {{ Request::get('order') }}</strong>
                        <div class="mt-3 mb-5">
                            {{ __('main.payment.completed-description') }}. </br>
                            {{ __('main.payment.completed-description2') }} </br>
                            {{ __('main.payment.completed-description3') }}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @php
        Cart::clear();
    @endphp
@endsection
