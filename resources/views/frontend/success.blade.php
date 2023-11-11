@extends('frontend.layout.app')
@section('content')

<div class="row featurette">
<div style="margin: 0 auto; text-align: center">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Request Submitted!</h4>
      <p>We have received your request for translation please stay on that page and don't refresh, An agent should contact you shortly!</p>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto d-none" id="requestApproved" style="margin-bottom:30px">
        <button class="btn btn-success btn-lg" type="button">Request Approved - Click to Pay</button>
      </div>
</div>
</div>

<div class="row featurette">
    <div class="col-md-12" style="text-align: center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<script type="text/javascript" src="https://www.foloosi.com/js/foloosipay.v2.js"></script>
<script type="text/javascript">
    var resp = null;
    function fetchData() {
        $.ajax({
            url: '/verify_status/<?=request()->segment(2)?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                resp = response;
                $("#requestApproved").removeClass("d-none");
                /*var options = {
                    "reference_token" : response.data.reference_token,
                    "merchant_key" : response.merchant_key,
                    "redirect" : false
                }
                var fp1 = new Foloosipay(options);
                fp1.open();*/
            },
            error: function(xhr, status, error) {
                console.error('An error occurred:', error);
                setTimeout(fetchData, 10000);
            }
        });
    }
    // Initial call to start the loop
    fetchData();

$(document).ready(function() {
    // Use .find() to locate the button and attach a click event handler
     $(document).on("click", "#requestApproved", function() {
            console.log(resp)
            let fetchRes = fetch(
                    "https://api.foloosi.com/aggregatorapi/web/initialize-setup",{
                    method: 'POST',
                    headers: {
                      'Content-Type': 'application/json',
                      'merchant_key': resp.merchant_key
                    },
                    body: JSON.stringify(resp.data)
                  });

                  fetchRes.then(res =>
                        res.json()).then(d => {
                              var options = {
                                  "reference_token" : d.data.reference_token,
                                  "merchant_key" : resp.merchant_key,
                                  "redirect" : true
                              }
                      var fp1 = new Foloosipay(options);
                      fp1.open();
                    })
        });
});
</script>
@endsection
