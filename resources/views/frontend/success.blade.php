@extends('frontend.layout.app')
@section('content')
<style>
.parent{
            height: 100vh;
        }
        .parent>.row{
            display: flex;
            align-items: center;
            height: 100%;
        }
        .col img{
            height:100px;
            width: 100%;
            cursor: pointer;
            transition: transform 1s;
            object-fit: cover;
        }
        .col label{
            overflow: hidden;
            position: relative;
        }
        .imgbgchk:checked + label>.tick_container{
            opacity: 1;
        }
/*         aNIMATION */
        .imgbgchk:checked + label>img{
            transform: scale(1.25);
            opacity: 0.3;
        }
        .tick_container {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }
        .tick {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 6px 12px;
            height: 40px;
            width: 40px;
            border-radius: 100%;
        }
</style>
<div class="row featurette">
<div style="margin: 0 auto; text-align: center">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Request Submitted!</h4>
      <p>we are processing your request and we will be back with time and cost within 2 minutes</p>
    </div>
</div>
</div>

<div class="row featurette">
    <div class="col-md-4" style="text-align: center">
        <div id="timer" class="alert alert-success mt-3" role="alert">
            02:00
        </div>
        <div id="payment" class="d-none">
            <div class="alert alert-success mt-3" role="alert">
                You have to pay AED: <span class="amount"></span>
            </div>
            <div class="col-md-12 row">
                <div class='col text-center'>
                  <input type="radio" name="imgbackground" id="img1" class="d-none imgbgchk" value="stripe" checked>
                  <label for="img1">
                    <img src="{{ asset('frontend/img/stripe.jpeg') }}" alt="Image 1">
                    <div class="tick_container">
                      <div class="tick"><i class="fa fa-check"></i></div>
                    </div>
                  </label>
                </div>
                <div class='col text-center'>
                    <input type="radio" name="imgbackground" id="img2" class="d-none imgbgchk" value="foloosi">
                    <label for="img2">
                        <img src="{{ asset('frontend/img/faloosi.jpeg') }}" alt="Image 2">
                        <div class="tick_container">
                          <div class="tick"><i class="fa fa-check"></i></div>
                        </div>
                    </label>
                </div>
            </div>
            <button id="clickToPay" class="btn btn-success btn-block btn-lg">Continue to Payment</button>
            <br>
            <a style="margin-top:10px" class="btn btn-block btn-lg btn-outline-primary" href="https://wa.me/+971567463549?text=Hello%20I%20have%20an%20inquiry" target="_blank">for any clarification <i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
    <div class="col-md-8" style="text-align: center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/l0km1k1Waa4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      

    </div>
</div>
<script type="text/javascript" src="https://www.foloosi.com/js/foloosipay.v2.js"></script>
<script type="text/javascript">
function startCountdown(duration, display) {
    var timer = duration, minutes, seconds;
    var countdownInterval = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);

    return countdownInterval;
}

window.onload = function () {
    var twoMinutes = 120,  // 120 seconds for 2 minutes
        display = document.querySelector('#timer');
    startCountdown(twoMinutes, display);
};


    function fetchData() {
        $.ajax({
            url: '/verify_status/<?=request()->segment(2)?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $("#timer").addClass("d-none");
                $(".amount").text(response.amount);
                $("#payment").removeClass("d-none");
            },
            error: function(xhr, status, error) {
            if(xhr.status === 403){
                window.location.href = "/"
            }else{
                console.error('An error occurred:', error);
                setTimeout(fetchData, 10000);
              }
            }
        });
    }
    // Initial call to start the loop
    fetchData();

    $("#clickToPay").on('click', function(){
        $.ajax({
            url: '/verify_payment/<?=request()->segment(2)?>/'+$('input[name="imgbackground"]:checked').val(),
            type: 'GET',
            dataType: 'json',
            success: function(response) {
            console.log(response.payment_url.message);
            if(response.payment_url.is_foloosi !== undefined){
                var reference_token = response.payment_url.message;
                var options = {
                    "reference_token" : reference_token,
                    "merchant_key" : response.payment_url.merchant_key,
                    "redirect" : true
                }
                var fp1 = new Foloosipay(options);
                fp1.open();
            }else{
                window.location.href = response.payment_url;
            }
            },
            error: function(xhr, status, error) {
                console.error('An error occurred:', error);
            }
        });
    })
</script>
@endsection
