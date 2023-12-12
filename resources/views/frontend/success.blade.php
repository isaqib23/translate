@extends('frontend.layout.app')
@section('content')

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
            <button id="clickToPay" class="btn btn-success btn-block btn-lg">Continue to Payment</button>
            <br>
            <a style="margin-top:10px" class="btn btn-block btn-lg btn-outline-primary" href="https://wa.me/+971567463549?text=Hello%20I%20have%20an%20inquiry" target="_blank">for any clarification <i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
    <div class="col-md-8" style="text-align: center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            url: '/verify_payment/<?=request()->segment(2)?>/stripe',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                window.location.href = response.payment_url;
            },
            error: function(xhr, status, error) {
                console.error('An error occurred:', error);
            }
        });
    })
</script>
@endsection
