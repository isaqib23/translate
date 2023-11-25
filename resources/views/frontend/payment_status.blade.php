@extends('frontend.layout.app')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card text-center">
                @if($status == "paid")
                <div class="card-header">
                    Payment Successful
                </div>
                <div class="card-body">
                    <h5 class="card-title">Thank You for Your Payment!</h5>
                    <p class="card-text">Your transaction was successful. You will receive a confirmation email shortly.</p>
                    <a href="<?=url('/')?>" class="btn btn-primary">Go to Home</a>
                </div>
                @else
                <div class="card-header">
                    Payment UnSuccessful
                </div>
                <div class="card-body">
                    <h5 class="card-title">Your Payment Cancelled!</h5>
                    <p class="card-text">Your transaction was cancelled. Please contact with administrator</p>
                    <a href="<?=url('/')?>" class="btn btn-primary">Go to Home</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
