  @extends('frontend.layout.app')
  @section('content')
  <style>
  .img-radio {
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
  }

  .img-radio:hover {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  }

  input[type=radio]:checked + .img-radio {
      transform: scale(0.95);
      box-shadow: 0 0 20px rgba(0, 255, 0, 0.5);
  }
  .img-radio {
      cursor: pointer;
      transition: transform 0.2s;
  }
  .img-radio:active {
      transform: scale(0.95);
  }
  .img-radio.selected {
      border: 2px solid #00f;
  }
#myDropzone {
    border: 2px dashed #0087F7;
    border-radius: 5px;
    background: #f6f8fa;
    text-align: center;
    padding: 60px;
    font-family: Arial, sans-serif;
    position: relative;
  }
  #myDropzone .dz-message {
    font-size: 1.0em;
    color: #92b0b3;
    width: 150px;
    margin-top: 50%;
    margin-left: 23%;
  }
  </style>
  <div class="container" style="max-width: 95%;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="max-height: 550px">
        <div class="carousel-item active">
          <img src="{{ asset('frontend/img/slider.jpeg') }}" class="d-block w-100" alt="Image 1">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('frontend/img/slider.jpeg') }}" class="d-block w-100" alt="Image 2">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('frontend/img/slider.jpeg') }}" class="d-block w-100" alt="Image 3">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>


  <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="box">
            <div class="box-item">
              <div class="roo">
                <img class="" src="{{ asset('frontend/img/1.png') }}" alt="">
                <h3 class="text">72 Years <br> Experience  </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <div class="box-item">
              <div class="roo">
                <img class="" src="{{ asset('frontend/img/2.png') }}" alt="">
                <h3 class="text">8 Million<br>Documents</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box">
            <div class="box-item">
              <div class="roo">
                <img class="" src="{{ asset('frontend/img/3.png') }}" alt="">
                <h3 class="text">5 Offices<br>Worldwide</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="md-12">
                <section id="service">
                  <div class="container">
                    <h6 class="section-title text-center">Translate Your Docs</h6>
                    <h5 class="section-subtitle text-center mb-6">Drag and drop your files</h5>
                    <div class="frame">
                                <div class="center">
                                  <div class="dropzone" id="myDropzone" style="width: 100%; height:100%">
                                    <div class="dz-message">
                                      <span>Drop & Drop File or browse</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                  </div>
                </section>
            <div>
            <div class="lg-12">
                <form>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <div>
        </div>
    </div>
    <!-- Service Section -->
    <div class="container" style="margin-bottom:200px">
      <div class="row">
        <div class="col-md-12">

        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="frame">
            <div class="center">
              <div class="dropzone" id="myDropzone" style="width: 100%; height:100%">
                <div class="dz-message">
                  <span>Drop & Drop File or browse</span>
                </div>
              </div>
            </div>
          </div>



          <section id="service">
            <div class="container">
              <h5 class="radio text-center mb-6">Choose Document Language</h5>
            </div>
            <div class="container">
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label>
                            <input type="radio" name="frameRadio" value="1" class="d-none" checked>
                            <img src="{{ asset('frontend/img/Frame.svg') }}" alt="" class="img-radio">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label>
                            <input type="radio" name="frameRadio" value="2" class="d-none">
                            <img src="{{ asset('frontend/img/Frame(1).png') }}" alt="" class="img-radio">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label>
                            <input type="radio" name="frameRadio" value="3" class="d-none">
                            <img src="{{ asset('frontend/img/Frame(2).png') }}" alt="" class="img-radio">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label>
                            <input type="radio" name="frameRadio" value="4" class="d-none">
                            <img src="{{ asset('frontend/img/Frame(3).png') }}" alt="" class="img-radio">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label>
                            <input type="radio" name="frameRadio" value="5" class="d-none">
                            <img src="{{ asset('frontend/img/Frame(4).png') }}" alt="" class="img-radio">
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label>
                            <input type="radio" name="frameRadio" value="6" class="d-none">
                            <img src="{{ asset('frontend/img/Frame(5).png') }}" alt="" class="img-radio">
                        </label>
                    </div>
                </div>

              </div>
            </div>
          </section>
          <section id="service">
            <div class="container">
              <h5 class="radioo text-center mb-6">Translate to</h5>
              <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-2">
                          <label>
                              <input type="radio" name="imageRadio" value="1" class="d-none">
                              <img src="{{ asset('frontend/img/4.png') }}" alt="" class="img-radio" checked>
                          </label>
                      </div>
                      <div class="col-md-2">
                          <label>
                              <input type="radio" name="imageRadio" value="2" class="d-none">
                              <img src="{{ asset('frontend/img/5.png') }}" alt="" class="img-radio">
                          </label>
                      </div>
                      <div class="col-md-2">
                          <label>
                              <input type="radio" name="imageRadio" value="3" class="d-none">
                              <img src="{{ asset('frontend/img/6.png') }}" alt="" class="img-radio">
                          </label>
                      </div>
                      <div class="col-md-2">
                          <label>
                              <input type="radio" name="imageRadio" value="4" class="d-none">
                              <img src="{{ asset('frontend/img/7.png') }}" alt="" class="img-radio">
                          </label>
                      </div>
                      <div class="col-md-2">
                          <label>
                              <input type="radio" name="imageRadio" value="5" class="d-none">
                              <img src="{{ asset('frontend/img/8.png') }}" alt="" class="img-radio">
                          </label>
                      </div>
                      <div class="col-md-2">
                          <label>
                              <input type="radio" name="imageRadio" value="6" class="d-none">
                              <img src="{{ asset('frontend/img/9.png') }}" alt="" class="img-radio">
                          </label>
                      </div>
                  </div>
                  <div class="row" style="margin-top:60px">
                      <div class="col">
                        <input type="text" class="form-control" placeholder="First name">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Last name">
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                      </div>
              </div>

              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
@endsection
