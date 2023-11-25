@extends('frontend.layout.app')
@section('content')

<div class="row featurette">
<div style="margin: 0 auto; text-align: center">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Request Submitted!</h4>
      <p>we are processing your request and we will be back with time and cost</p>
    </div>
</div>
</div>

<div class="row featurette">
    <div class="col-md-4" style="text-align: center">
        <div id="timer" class="alert alert-primary mt-3" role="alert">
            60
        </div>
        <div id="payment" class="d-none">
            <div class="alert alert-info mt-3" role="alert">
                You have to pay AED: <span class="amount"></span>
            </div>
            <button id="clickToPay" class="btn btn-success btn-block btn-lg">Continue to Payment</button>
        </div>
    </div>
    <div class="col-md-8" style="text-align: center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<script type="text/javascript" src="https://www.foloosi.com/js/foloosipay.v2.js"></script>
<script type="text/javascript">
function startCountdown(duration, display) {
    var timer = duration, seconds;
    var countdownInterval = setInterval(function () {
        seconds = parseInt(timer % 60, 10);

        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);

    return countdownInterval;
}

window.onload = function () {
    var sixtySeconds = 59,
        display = document.querySelector('#timer');
    startCountdown(sixtySeconds, display);
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
                console.error('An error occurred:', error);
                setTimeout(fetchData, 10000);
            }
        });
    }
    // Initial call to start the loop
    fetchData();

    $("#clickToPay").on('click', function(){
        $.ajax({
            url: '/verify_payment/<?=request()->segment(2)?>',
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
