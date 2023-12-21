@extends('frontend.layout.app')
@section('content')
<style>
  .image-container {
      display: flex;
      justify-content: center; /* Center the image container horizontally */
      align-items: center; /* Center the image container vertically */
      background-color: #39C4EB; /* Your specified background color */
      border-radius: 50%; /* Makes the container round */
      width: 202px; /* Width of the round container */
      height: 201px; /* Height of the round container */
      margin: auto; /* Additional centering for the container */
    }
    .image-container img {
      max-width: 80%; /* Adjust the image size inside the container */
      height: auto; /* Keep the image aspect ratio */
    }
    .description {
      text-align: center; /* Center the description text */
      margin-top: 20px; /* Spacing between the image container and the text */
      margin-bottom: 100px;
          font-size: 25px;
          font-weight: 700;
    }
</style>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6">
    <div class="image-container">
        <img src="{{ asset('frontend/img/icon1.png') }}" alt="Icon Description">
    </div>
    <div class="description">
        <p>Legal Translation
           for all documents in all languages.</p>
    </div>
    </div>
    <div class="col-md-6">
      <div class="image-container">
          <img src="{{ asset('frontend/img/icon2.png') }}" alt="Icon Description">
      </div>
      <div class="description">
          <p>Translating, Drafting and Preparing all Legal Applications for Courts, Rental Dispute Centre, Police and all Official and Governmental Departments.</p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="image-container">
          <img src="{{ asset('frontend/img/icon3.png') }}" alt="Icon Description">
      </div>
      <div class="description">
          <p>Translating, Drafting and Preparing all Legal Applications for Courts, Rental Dispute Centre, Police and all Official and Governmental Departments.
</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="image-container">
          <img src="{{ asset('frontend/img/icon4.png') }}" alt="Icon Description">
      </div>
      <div class="description">
          <p>Printing out, Copying and Scanning Services of Documents.</p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="image-container">
          <img src="{{ asset('frontend/img/icon5.png') }}" alt="Icon Description">
      </div>
      <div class="description">
          <p>Follow-up Services for attestation of Certificates and Documents in UAE MOFA and MOJ.</p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="image-container">
          <img src="{{ asset('frontend/img/icon6.png') }}" alt="Icon Description">
      </div>
      <div class="description">
          <p>24/7  Dedicated <br>Seller support</p>
      </div>
    </div>

  </div>
</div>
@endsection
