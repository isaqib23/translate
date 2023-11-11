@extends('frontend.layout.app')
@section('content')

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="{{ asset('frontend/bootstrap-image-checkbox.css') }}" type="text/css" />
<style>
 .single-services {
    display: flex;
        box-shadow: 0px 25px 60px rgba(66,85,164,0.06);
        padding: 29px 24px;
        border-radius: 20px;
        background: #fff;
 }
 .dropzones {
    border: 1px dashed #0d6efd;
    background-color: #f1faff;
    border-radius: 0.475rem!important;
    width: 445px;
    margin: 0 auto;
 }

 .flag1{background-image:url({{ asset('frontend/img/1.png') }});}
 .flag2{background-image:url({{ asset('frontend/img/2.png') }});}
 .flag3{background-image:url({{ asset('frontend/img/3.png') }});}
 .flag4{background-image:url({{ asset('frontend/img/4.png') }});}
 .flag5{background-image:url({{ asset('frontend/img/5.png') }});}
 .flag6{background-image:url({{ asset('frontend/img/6.png') }});}
 .flag7{background-image:url({{ asset('frontend/img/7.png') }});}
 .flag8{background-image:url({{ asset('frontend/img/8.png') }});}
 .flag9{background-image:url({{ asset('frontend/img/9.png') }});}

  .cc-selector {
    text-align: center
  }
  .cc-selector input {
      margin:0;padding:0;
          -webkit-appearance:none;
             -moz-appearance:none;
                  appearance:none;
  }

 .cc-selector-2 input:active +.drinkcard-cc, .cc-selector input:active +.drinkcard-cc{opacity: .9;}
 .cc-selector-2 input:checked +.drinkcard-cc, .cc-selector input:checked +.drinkcard-cc{
     -webkit-filter: none;
        -moz-filter: none;
             filter: none;
 }
 .drinkcard-cc{
     cursor:pointer;
     background-size:contain;
     background-repeat:no-repeat;
     display:inline-block;
     width:100px;height:70px;
     -webkit-transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
             transition: all 100ms ease-in;
     -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
        -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
             filter: brightness(1.8) grayscale(1) opacity(.7);
 }
 .drinkcard-cc:hover{
     -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
        -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
             filter: brightness(1.2) grayscale(.5) opacity(.9);
 }

 /* Extras */
 .cc-selector-2 input{ margin: 5px 0 0 12px; }
 .cc-selector-2 label{ margin-left: 7px; }
 span.cc{ color:#6d84b4 }
.dropzone .dz-preview .dz-progress {
    background: linear-gradient(to bottom, #666, #444) !important
}
.dropzone .dz-preview .dz-progress .dz-upload {
    background: green !important
}
</style>
<!-- Three columns of text below the carousel -->
    <div class="services-area" style="margin-top:-100px">
        <div class="container">
        <div class="row justify-content-sm-center">

            <div class="col-lg-4 col-md-6 col-sm-8" style="position:relative">
            <div class="single-services mb-30">
                <div class="features-icon">
                    <img src="{{ asset('frontend/img/a.png') }}" alt="">
                </div>
                <div class="features-caption">
                    <h3>60+ UX courses</h3>
                    <p>The automated process all your website tasks.</p>
                </div>
            </div>
            </div>

             <div class="col-lg-4 col-md-6 col-sm-8" style="position:relative">
                 <div class="single-services mb-30">
                     <div class="features-icon">
                         <img src="{{ asset('frontend/img/b.png') }}" alt="">
                     </div>
                     <div class="features-caption">
                         <h3>60+ UX courses</h3>
                         <p>The automated process all your website tasks.</p>
                     </div>
                 </div>
             </div>

             <div class="col-lg-4 col-md-6 col-sm-8" style="position:relative">
                 <div class="single-services mb-30">
                     <div class="features-icon">
                         <img src="{{ asset('frontend/img/c.png') }}" alt="">
                     </div>
                     <div class="features-caption">
                         <h3>60+ UX courses</h3>
                         <p>The automated process all your website tasks.</p>
                     </div>
                 </div>
             </div>
        </div>
        </div>
    </div>
<!-- Three columns of text below the carousel end -->

<!-- form start -->
<div class="row featurette">
<div style="margin: 0 auto; text-align: center">
    <h2>Translate your Docs</h2>
</div>
<form class="row g-3" action="http://test.com" method="post" id="mainForm" data-ajax-method="POST" data-ajax="true">
  <div class="row">
  <div class="col-md-6">
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Name</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating">
        <input type="tel" class="form-control" id="floatingPassword" placeholder="mobile">
        <label for="floatingPassword">Email / WhatsApp Number</label>
      </div>
    </div>
  <!--begin::Input group-->
      <div class="form-group">
          <!--begin::Dropzone-->
          <div class="dropzone dropzones dropzone-previews" id="file-upload">
              <!--begin::Message-->
              <div class="dz-message needsclick">
                  <!--begin::Info-->
                  <div class="ms-4">
                      <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                  </div>
                  <!--end::Info-->
              </div>
          </div>
          <!--end::Dropzone-->
      </div>
      <!--end::Input group-->
  </div>

  <!-- From Radio Start -->
  <div style="margin-top: 20px; margin-bottom: 20px; text-align: center">
      <h4>From</h3>
  </div>
<div class="row">
    <div class="col-md-12">
         <div class="cc-selector">
         @for ($i = 9; $i> 0; $i--)
            @if($i == 9)
                <input checked id="from_flag{{$i}}" type="radio" name="from" value="{{$i}}" />
                <label class="drinkcard-cc flag{{$i}}" for="from_flag{{$i}}"></label>
            @else
                <input id="from_flag{{$i}}" type="radio" name="from" value="{{$i}}" />
                <label class="drinkcard-cc flag{{$i}}" for="from_flag{{$i}}"></label>
            @endif
         @endfor
        </div>
    </div>
</div>
  <!-- From Radio End -->

  <!-- To Radio Start -->
  <div style="margin-top: 20px; margin-bottom: 20px; text-align: center">
      <h4>To</h3>
  </div>
<div class="row" style="margin-bottom: 20px;">
    <div class="col-md-12">
         <div class="cc-selector">
         @for ($i = 1; $i <= 9; $i++)
            @if($i == 1)
                <input checked id="to_flag{{$i}}" type="radio" name="to" value="{{$i}}" />
                <label class="drinkcard-cc flag{{$i}}" for="to_flag{{$i}}"></label>
            @else
                <input id="to_flag{{$i}}" type="radio" name="to" value="{{$i}}" />
                <label class="drinkcard-cc flag{{$i}}" for="to_flag{{$i}}"></label>
            @endif
         @endfor
        </div>
    </div>
</div>
    <!-- To Radio End -->


  <div class="col-12">
  <div class="d-grid gap-2 col-6 mx-auto">
    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
  </div>
  </div>
</form>
</div>
<!-- form end -->
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script type="text/javascript">
Dropzone.autoDiscover = false;
$(function() {
    var myDropzone = new Dropzone("#file-upload", {
    autoProcessQueue: false,
    paramName: "files",
    maxFiles: 10,
    maxFilesize: 10240, // in MB
    uploadMultiple: true,
    addRemoveLinks: true,
    parallelUploads: 10000,
    url: "/upload",
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
});

    $("#mainForm").on("submit", function(e) {
        e.preventDefault();
        e.stopPropagation();
        if (myDropzone.getQueuedFiles().length > 0) {
            myDropzone.processQueue();
        } else {
            this.submit();
        }
    });

    myDropzone.on("sendingmultiple", function(data, xhr, formData) {
        formData.append("mobile", $("#floatingPassword").val());
        formData.append("email", $("#floatingInput").val());
        formData.append("fromLanguage", $("input[name='from']:checked").val());
        formData.append("toLanguage", $("input[name='to']:checked").val());
    });

    myDropzone.on("success", function(file, response) {
        console.log(response);
        if (response.success) {
            //window.location.href = "/success/"+response.data;
        } else {
            //alert(response.message);
            //location.reload();
        }
    });
});

</script>
@endsection
