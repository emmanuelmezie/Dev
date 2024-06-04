<main>
    <section id="pricing" class="pricing mt-5">
        <div class="container">
           
          <div class="row no-gutters">
  
        
            <div class="col-lg-4 offset-lg-4 box">
                <div class="logo">
                    <a href="{{route('index')}}"><img src="{{asset('assets/img/logo.png')}}" alt="Chime Emmanuel Image" class="img-fluid rounded-circle" style="width: 30%;"></a>
                </div>
                <div>
                    <form method="post" role="form" wire:submit.prevent="adminCreateAccount">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Get Started!!</h3>
                                @if(Session::has('errormessage'))
                                    <div class="alert alert-danger" role="alert">{{Session::get('errormessage')}}</div>
                                @endif
                                <div class="form-group mt-3 mt-md-0">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required wire:model="name">
                                </div>
                                <div class="form-group mt-3">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required wire:model="email">
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" class="form-control" name="subject" id="passowrd" placeholder="Password" required wire:model="password">
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn-get-started">Register</button>
                                </div>
                            </div>
                      </form>
                </div>
            
            </div>
  
  
          </div>
  
        </div>
    </section>
</main>
