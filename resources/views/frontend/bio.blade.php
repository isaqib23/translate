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
            padding-top: 20px;
            padding-bottom: 20px;
            font-size: 20px;
  }
</style>
<div class="container text-center mt-5">
  <h1>BIO Page</h1>
  <div class="row">



    <div class="col-md-12">

      <div class="row">
        <div class="col-md-6">
            <a href="mailto:DubaiCourt@translingu.com">
          <img class="qr-code" src="{{ asset('frontend/img/qr1.png') }}" alt="QR Code for Email">
          </a>
        </div>
        <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
          <a href="mailto:DubaiCourt@translingu.com" class="btn btn-primary btn-lg btn-block btn-block btn-sm btn-css">Email us</a>
        </div>
      </div>

      <div class="row">
          <div class="col-md-6">
            <a href="https://wa.me/+971503007293" target="_blank">
            <img class="qr-code" src="{{ asset('frontend/img/qr2.png') }}" alt="QR Code for Email">
            </a>
          </div>
          <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
            <a href="https://wa.me/+971503007293" target="_blank" class="btn btn-primary btn-block btn-block btn-sm btn-css">Press Contact us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <a href="https://wa.me/+971503008365" target="_blank">
            <img class="qr-code" src="{{ asset('frontend/img/qr3.png') }}" alt="QR Code for Email">
            </a>
          </div>
          <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
            <a href="https://wa.me/+971503008365" target="_blank" class="btn btn-primary btn-block btn-block btn-sm btn-css">Press Contact us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <a href="https://www.instagram.com/translingu/?igshid=ZGUzMzM3NWJiOQ%3D%3D" target="_blank">
            <img class="qr-code" src="{{ asset('frontend/img/qr4.png') }}" alt="QR Code for Email">
            </a>
          </div>
          <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
            <a href="https://www.instagram.com/translingu/?igshid=ZGUzMzM3NWJiOQ%3D%3D" target="_blank" class="btn btn-primary btn-block btn-block btn-sm btn-css">Follow us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <a href="https://www.facebook.com/profile.php?id=61550779989478&mibextid=nW3QTL" target="_blank">
            <img class="qr-code" src="{{ asset('frontend/img/qr5.png') }}" alt="QR Code for Email">
            </a>
          </div>
          <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
            <a href="https://www.facebook.com/profile.php?id=61550779989478&mibextid=nW3QTL" target="_blank" class="btn btn-primary btn-block btn-block btn-sm btn-css">Follow us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <a href="https://www.threads.net/@translingu" target="_blank">
            <img class="qr-code" src="{{ asset('frontend/img/qr6.png') }}" alt="QR Code for Email">
            </a>
          </div>
          <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
            <a href="https://www.threads.net/@translingu" target="_blank" class="btn btn-primary btn-block btn-block btn-sm btn-css">Follow us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <a href="https://twitter.com/translingu?s=09" target="_blank">
            <img class="qr-code" src="{{ asset('frontend/img/qr7.png') }}" alt="QR Code for Email">
            </a>
          </div>
          <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
            <a href="https://twitter.com/translingu?s=09" target="_blank" class="btn btn-primary btn-block btn-block btn-sm btn-css">Follow us</a>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <a href="https://www.linkedin.com/in/trans-lingu-ab7155290/" target="_blank">
            <img class="qr-code" src="{{ asset('frontend/img/qr8.png') }}" alt="QR Code for Email">
            </a>
          </div>
          <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
            <a href="https://www.linkedin.com/in/trans-lingu-ab7155290/" target="_blank" class="btn btn-primary btn-block btn-block btn-sm btn-css">Contact us</a>
          </div>
        </div>

        <div class="row">
        <div class="col-md-12">
            <p style="display: flex; align-items: center; left: 180px;
                                                              position: relative;">
            <span class="btn btn-primary" style="margin-bottom:0px; margin-right: 20px"><i class="fas fa-phone-alt"></i></span>
            +971 50 300 7293
            </p>

            <p style="display: flex; align-items: center; left: 180px;
                                                              position: relative;">
            <span class="btn btn-primary" style="margin-bottom:0px; margin-right: 20px"><i class="fas fa-phone-alt"></i></span>
            +971 50 300 8365
            </p>

            <p style="display: flex; align-items: center; left: 180px;
                                                              position: relative;">
                <span class="btn btn-primary" style="margin-bottom:0px; margin-right: 20px"><i class="fas fa-phone-alt"></i></span>
                +971 4 445 6740
            </p>
        </div>
        </div>

    </div>

  </div>
</div>
@endsection
