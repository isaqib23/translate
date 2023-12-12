@extends('frontend.layout.app')
@section('content')
<style>
  .qr-code {
    height: auto;
    margin-bottom: 15px; /* Space below QR code */
  }
  .btn {
    margin-bottom: 15px; /* Space below button */
  }
  .logo {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 30px; /* Space below the logo */
  }
  .btn-css {
        padding-left: 120px;
        padding-right: 120px;
        border-radius: 50px;
  }
</style>
<div class="container text-center mt-5">
  <h1>BIO Page</h1>
  <div class="row">

    <div class="col-md-4" style="display: flex; align-items: center; justify-content: center;">
      <img class="logo" src="{{ asset('frontend/img/logo2.png') }}" alt="Logo">
    </div>

    <div class="col-md-6">

      <div class="row">
        <div class="col-md-4">
          <img class="qr-code" src="{{ asset('frontend/img/qr1.png') }}" alt="QR Code for Email">
        </div>
        <div class="col-md-8" style="display: flex; align-items: center; justify-content: center;">
          <a href="#" class="btn btn-primary btn-lg btn-block btn-block btn-sm btn-css">Email us</a>
        </div>
      </div>

      <div class="row">
          <div class="col-md-4">
            <img class="qr-code" src="{{ asset('frontend/img/qr2.png') }}" alt="QR Code for Email">
          </div>
          <div class="col-md-8" style="display: flex; align-items: center; justify-content: center;">
            <a href="#" class="btn btn-primary btn-block btn-block btn-sm btn-css">Press Contact us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <img class="qr-code" src="{{ asset('frontend/img/qr3.png') }}" alt="QR Code for Email">
          </div>
          <div class="col-md-8" style="display: flex; align-items: center; justify-content: center;">
            <a href="#" class="btn btn-primary btn-block btn-block btn-sm btn-css">Press Contact us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <img class="qr-code" src="{{ asset('frontend/img/qr4.png') }}" alt="QR Code for Email">
          </div>
          <div class="col-md-8" style="display: flex; align-items: center; justify-content: center;">
            <a href="#" class="btn btn-primary btn-block btn-block btn-sm btn-css">Follow us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <img class="qr-code" src="{{ asset('frontend/img/qr5.png') }}" alt="QR Code for Email">
          </div>
          <div class="col-md-8" style="display: flex; align-items: center; justify-content: center;">
            <a href="#" class="btn btn-primary btn-block btn-block btn-sm btn-css">Follow us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <img class="qr-code" src="{{ asset('frontend/img/qr6.png') }}" alt="QR Code for Email">
          </div>
          <div class="col-md-8" style="display: flex; align-items: center; justify-content: center;">
            <a href="#" class="btn btn-primary btn-block btn-block btn-sm btn-css">Follow us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <img class="qr-code" src="{{ asset('frontend/img/qr7.png') }}" alt="QR Code for Email">
          </div>
          <div class="col-md-8" style="display: flex; align-items: center; justify-content: center;">
            <a href="#" class="btn btn-primary btn-block btn-block btn-sm btn-css">Follow us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <img class="qr-code" src="{{ asset('frontend/img/qr8.png') }}" alt="QR Code for Email">
          </div>
          <div class="col-md-8" style="display: flex; align-items: center; justify-content: center;">
            <a href="#" class="btn btn-primary btn-block btn-block btn-sm btn-css">Contact us</a>
          </div>
        </div>

        <div class="row">
        <div class="col-md-12">
            <p style="display: flex; align-items: center;">
            <span class="btn btn-primary" style="margin-bottom:0px; margin-right: 20px"><i class="fas fa-phone-alt"></i></span>
            +971 4 445 6740
            </p>

            <p style="display: flex; align-items: center;">
            <span class="btn btn-primary" style="margin-bottom:0px; margin-right: 20px"><i class="fas fa-phone-alt"></i></span>
            +971 50 300 7293
            </p>

            <p style="display: flex; align-items: center;">
            <span class="btn btn-primary" style="margin-bottom:0px; margin-right: 20px"><i class="fas fa-phone-alt"></i></span>
            +971 50 300 8365
            </p>
        </div>
        </div>

    </div>

  </div>
</div>
@endsection
