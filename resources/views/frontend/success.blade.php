@extends('frontend.layout.app')
@section('content')

<div class="row featurette">
<div style="margin: 0 auto; text-align: center">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Request Submitted!</h4>
      <p>We have received your request for translation please stay on that page and don't refresh, An agent should contact you shortly!</p>
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
    function fetchData() {
        $.ajax({
            url: '/verify_status/<?=request()->segment(2)?>',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                var options = {
                    "reference_token" : response.data.reference_token,
                    "merchant_key" : response.merchant_key,
                    "redirect" : false
                }
                var fp1 = new Foloosipay(options);
                fp1.open();
            },
            error: function(xhr, status, error) {
                console.error('An error occurred:', error);
                setTimeout(fetchData, 10000);
            }
        });
    }
    // Initial call to start the loop
    fetchData();
</script>
@endsection
