@extends('layouts.front')

@section('content')
    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-heading text-left">Harmony Data Anonymisation</div>
        </div>
      </div>
    </header>
    
    <section id="services">
      <div class="container">
      
        <div class="row">
          <div class="col-lg-12">
            @includeWhen(Session::has('success'),'layouts.sucess')
			@includeWhen($errors->any(),'layouts.error')
		  </div>
		</div>
		@auth
    		@if(((Auth::user()->role->name == "Admin") || (Auth::user()->role->name == "Provider")) && (Auth::user()->is_active))                
                
                 <div class="row">
                  <div class="col-lg-12">
                      <h2 class="pb-3">Upload a .csv file.</h2>
                      <form method="POST" action="{{ route('home.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="form-group">
                            <input type="file" class="form-control-file" name="file" id="file" required>
                            <p class="help-block text-danger"></p>
                          </div>
                          
                          <div class="form-group">
                            <textarea class="form-control" name="file_message" id="file_message" placeholder="Include a Message (optional)"></textarea>
                            <p class="help-block text-danger"></p>
                          </div>
                            
                          <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="terms" value="terms" id="invalidCheck" required>
                              <label class="form-check-label" for="invalidCheck">
                                I acknowledge I've read the below Terms of Use and I understand that information might not be anonymised if submitted incorrectly.
                              </label>
                              <div class="invalid-feedback">
                                You must agree the Terms of Use before submitting.
                              </div>
                            </div>
                          </div>
                            
                          <div class="clearfix"></div>
                          <div class="text-left">
                            <div id="success"></div>
                            <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Upload File</button>
                          </div>
                      </form>
                  </div>
                </div>

                <div class="row pt-4 mt-5">
                  <div class="col-md-12">
                  	<h2>Terms of Use:</h2>
                  	<p>Read the below information before uploading your files. Documents might not be anonymised if not submitted under this terms:</p>
                    <ol>
                      <li class="text-muted li-specs">Files must be submitted in .csv format.</li>
                      <li class="text-muted li-specs">Cells must be delimited by a comma.</li>
                      <li class="text-muted li-specs">Maximum file size is 40000KB, if your file is bigger please split the information in different files.</li>
                      <li class="text-muted li-specs">Maximum upload time is 600 seconds.</li>
                      <li class="text-muted li-specs">Data to be anonymised must be placed in the first column of the file, information entered in any other column will not be modified.</li>
                      <li class="text-muted li-specs">File name of the anonymised file will be replaced.</li>
                      <li class="text-muted li-specs">Please note: Excel will remove all the information after the 8th digit in cell formatted as "General" when exporting a .csv file. To avoid losing information when exporting cells that contain float numbers please change their format to "Float" with 14 decimals.</li>
                      <li class="text-muted li-specs">Floating point precision: Our system uses the IEEE 754 double precision format, which will give a maximum relative error due to rounding in the order of 1.11e-16.</li>
                    </ol>
                  </div>
                </div>
                
              @elseif(((Auth::user()->role->name == "Admin") || (Auth::user()->role->name == "Provider")) && (!Auth::user()->is_active))
                <h2>Account is not active.</h2>
                <p>Please contact your project manager and request to activate your account, or contact us using the below contact form.</p>
              @endif
          @endauth
          
          @guest
          	<div class="row my-5 py-5">
          		<div class="col-lg-12">
          			<h2>Click <a href="{{ route('login') }}">here</a> to login and upload a file.</h2>
            		<p>Registration is only available to previously authorised users, if you haven't been authorised contact your project manager, or contact us using the below contact form.</p>
          		</div>
          	</div>
          @endguest
      </div>
    </section>
    
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h4 class="section-heading text-uppercase">Do you need help?</h4>
            <p class="email-text">If you need help, please send us a message using the below form or the email address: <a href="mailto:it@synapse-managers.com">it@synapse-managers.com</a></p>
            @if(Session::has('contact_message'))
              <p class="alert alert-success"><strong>Success!</strong> {{ session('contact_message') }}</p>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form method="POST" action="{{ route('messages.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" name="name" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="email" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="phone" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" name="message" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-left">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection