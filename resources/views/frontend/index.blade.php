@extends('frontend.layout.app')
@section('content')

<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
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

.loader {
    border: 4px solid #f3f3f3;
    border-radius: 50%;
    border-top: 4px solid #3498db;
    width: 12px;
    height: 12px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
<!-- Three columns of text below the carousel -->
    <div class="services-area" style="margin-top:-100px">
        <div class="container">
        <div class="row justify-content-sm-center">

            <div class="col-lg-4 col-md-6 col-sm-8" style="position:relative">
            <div class="single-services mb-30">
                <div class="features-icon">
                    <img src="{{ asset('frontend/img/b.png') }}" alt="">
                </div>
                <div class="features-caption">
                    <h3><a style="color: #5a5a5a; text-decoration: none;"  href="/profile">Our Profile</a></h3>
                    <p>The automated process all your legal tasks.</p>
                </div>
            </div>
            </div>

             <div class="col-lg-4 col-md-6 col-sm-8" style="position:relative">
                 <div class="single-services mb-30">
                     <div class="features-icon">
                         <img style="width: 62px; height: 69px" src="{{ asset('frontend/img/a.jpeg') }}" alt="">
                     </div>
                     <div class="features-caption">
                         <h3><a style="color: #5a5a5a; text-decoration: none;" href="/bio">BIO</a></h3>
                         <p>The automated process all your legal tasks.</p>
                     </div>
                 </div>
             </div>

             <div class="col-lg-4 col-md-6 col-sm-8" style="position:relative">
                 <div class="single-services mb-30">
                     <div class="features-icon">
                         <a href="https://maps.app.goo.gl/p5BqnAJmWiofrFjB9">
                         <img src="{{ asset('frontend/img/c.png') }}" alt="">
                         </a>
                     </div>
                     <div class="features-caption">
                         <h3><a style="color: #5a5a5a; text-decoration: none;"  href="https://maps.app.goo.gl/p5BqnAJmWiofrFjB9">Visit our office</a></h3>
                         <p>The automated process all your legal tasks.</p>
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
    <h2 class="d-none" id="note">Notary Public E-Services Attestation in collaboration with M/s. Mohammad Al Najjar Advocates and Legal Consultants.</h2>
    <h2>Starting from 25 AED/Page (250 words)</h2>
</div>
<form class="row g-3" action="<?=url('/upload')?>" method="post" id="mainForm" enctype="multipart/form-data">
  <div class="row" style="margin-bottom: 35px">
    <div class="col-md-4 text-center">
        <input type="radio" class="btn-check" name="category_type" id="success-outlined1" value="1" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="success-outlined1">Translating</label>
    </div>
    <div class="col-md-4 text-center">
        <input type="radio" class="btn-check" name="category_type" id="success-outlined2" value="2" autocomplete="off">
        <label class="btn btn-outline-success" for="success-outlined2">Drafting</label>
    </div>
    <div class="col-md-4 text-center">
        <input type="radio" class="btn-check" name="category_type" id="success-outlined3" value="3" autocomplete="off">
        <label class="btn btn-outline-success" for="success-outlined3">Notary</label>
    </div>
  </div>

  <div class="row d-none" id="drafting" style="margin-bottom: 30px;">
  <label style="margin-bottom: 15px; font-weight: bold">Select Category</label>
    @foreach(getDraftCategories() as $key => $category)
        <div class="col-md-3">
            <div class="form-check form-check-inline">
              <input class="form-check-input" name="draft[]" type="checkbox" id="inlineCheckbox{{$key}}" value="{{$key}}">
              <label class="form-check-label" for="inlineCheckbox{{$key}}">{{$category}}</label>
            </div>
        </div>
    @endforeach
  </div>

  <div class="row d-none" id="notary" style="margin-bottom: 30px;">
    <label style="margin-bottom: 15px; font-weight: bold">Select Category</label>
      @foreach(getNotaryCategories() as $key => $category)
          <div class="col-md-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" name="notary[]" type="checkbox" id="inlineCheckbox{{$key}}" value="{{$key}}">
                <label class="form-check-label" for="inlineCheckbox{{$key}}">{{$category}}</label>
              </div>
          </div>
      @endforeach
    </div>
    <div class="row" id="translate_type" style="margin-bottom: 30px;">
        <div class="col-md-3">
           <div class="form-check form-check-inline">
             <input class="form-check-input" name="translate_type" checked="true" type="radio" id="normal" value="normal">
             <label class="form-check-label" for="normal">Normal</label>
           </div>
         </div>
         <div class="col-md-3">
            <div class="form-check form-check-inline">
              <input class="form-check-input" name="translate_type" type="radio" id="legal" value="legal">
              <label class="form-check-label" for="legal">Legal</label>
            </div>
         </div>
    </div>
  <div class="row">
  <div class="col-md-6">
      <div class="form-floating mb-3">
        <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Name</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating">
        <input type="tel" name="mobile" class="form-control" id="floatingPassword" placeholder="mobile">
        <label for="floatingPassword">Email / WhatsApp Number</label>
      </div>
    </div>

  <!--begin::Input group-->
      <div class="form-group">
          <!--begin::Dropzone-->
          <input type="file"
                     class="filepond"
                     name="file"
                     multiple>
          @csrf
          <!--end::Dropzone-->
      </div>
      <!--end::Input group-->
  </div>

  <!-- From Radio Start -->
  <div id="countries">
  <div style="margin-top: 20px; margin-bottom: 20px; text-align: center">
      <h4>From</h3>
  </div>
<div class="row">
    <div class="col-md-12">
         <div class="cc-selector">
         @foreach (getCountries() as $key => $country)
            @if($key == 1)
                <input type="radio" class="btn-check" name="from" value="{{$key}}" id="fromRadio{{$key}}" autocomplete="off" checked>
                <label class="btn btn-outline-success" for="fromRadio{{$key}}"><?=$country?></label>
            @else
                <input type="radio" class="btn-check" name="from" value="{{$key}}" id="fromRadio{{$key}}" autocomplete="off">
                <label class="btn btn-outline-success" for="fromRadio{{$key}}"><?=$country?></label>
            @endif
         @endforeach
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
         <?php $reversedLanguages = array_reverse(getCountries(), true); ?>
         @foreach ($reversedLanguages as $key => $country)
             @if($key == 10)
                 <input type="radio" class="btn-check" name="to" value="{{$key}}" id="toRadio{{$key}}" autocomplete="off" checked>
                 <label class="btn btn-outline-success" for="toRadio{{$key}}"><?=$country?></label>
             @else
                 <input type="radio" class="btn-check" name="to" value="{{$key}}" id="toRadio{{$key}}" autocomplete="off">
                 <label class="btn btn-outline-success" for="toRadio{{$key}}"><?=$country?></label>
             @endif
          @endforeach
        </div>
    </div>
</div>
</div>
    <!-- To Radio End -->

  <div class="row d-none" id="id_check" style="margin-bottom: 30px; text-align: center;">
    <div class="form-check form-check-inline">
      <input style="float: none !important; top: 1px !important; position: relative;" class="form-check-input" name="id_check" type="checkbox" id="id_check" value="1">
      <label class="form-check-label" for="id_check">Upload IDs or Passport copies (Mandatory) <span class="text-danger text-bold">*</span></label>
    </div>
  </div>
  <div class="row" id="id_check1" style="margin-bottom: 30px; text-align: center;">
      <div class="form-check form-check-inline">
        <input style="float: none !important; top: 6px !important; position: relative;" class="form-check-input" name="urgent" type="checkbox" id="id_check1" value="1">
        <label class="form-check-label" for="id_check1" style="font-size:1.5rem; font-weight: 500">Urgent</label>
      </div>
    </div>
  <div class="col-12">
  <div class="d-grid gap-2 col-6 mx-auto">
    <button class="btn btn-primary btn-lg" id="submitForm" type="submit">Submit</button>
  </div>
  </div>
</form>
</div>
<!-- form end -->
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var pond = FilePond.create($('input[type="file"]')[0], {
        server: "<?=url('/upload_files')?>",
    });

    $('#mainForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $("#submitForm");
        btn.prop('disabled', true);
        btn.text('Processing...');

        // Get files from FilePond
        var files = pond.getFiles();
        // Create a new FormData object
        var formData = new FormData(this);

        // Append each file to the FormData object
        files.forEach(function(fileItem, index) {
            formData.append('files[]', fileItem.serverId);
        });

        // Now append other form fields and send via AJAX
        $.ajax({
            url: '<?=url('/upload')?>',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                window.location.href = "/success/"+response.data;
            },
            error: function(xhr, status, error) {
                btn.prop('disabled', false);
                btn.text('Submit');
                if (xhr.responseJSON) {
                    alert(xhr.responseJSON.message);
                }
            }
        });
    });
});

$('input[type="radio"][name="category_type"]').change(function() {
        var selectedValue = $(this).val();
        if(selectedValue == 2){
            $("#drafting").removeClass("d-none");
            $("#id_check").removeClass("d-none");
            $("#notary").addClass("d-none");
            $("#note").addClass("d-none");
            $("#countries").hide();
            $("#translate_type").hide();
            $("#translate_type").hide();
        }else if(selectedValue == 3){
            $("#drafting").addClass("d-none");
            $("#countries").hide();
            $("#translate_type").hide();
            $("#notary").removeClass("d-none");
            $("#id_check").removeClass("d-none");
            $("#note").removeClass("d-none");
        }else{
            $("#countries").show();
            $("#translate_type").show();
            $("#drafting").addClass("d-none");
            $("#notary").addClass("d-none");
            $("#id_check").addClass("d-none");
            $("#note").addClass("d-none");
        }
    });

    var timeout;
    function checkInputsAndSendRequest() {
            var email = $('#floatingInput').val().trim();
            var name = $('#floatingPassword').val().trim();

            // Check if both fields are not empty
            if (name !== '' && email !== '') {
                // Send request to the server
                $.ajax({
                    url: '<?=url('/send_notification')?>',
                    type: 'POST',
                    data: {
                        mobile: name,
                        email: email,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
                        console.log('Server response:', response);
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            }
        }

        // Attach event listeners
        $('#floatingInput, #floatingPassword').on('input', function() {
           clearTimeout(timeout);
           timeout = setTimeout(checkInputsAndSendRequest, 1500); // Adjust the time (1500 ms) as needed
       });
</script>
@endsection
