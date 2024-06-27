<div class="container">
            <div class="row g-5">
                <div class="col-lg-4 sticky-lg-top vh-100">
                    <div class="d-flex flex-column h-100 text-center overflow-auto shadow">
                        <img class="w-100 img-fluid mb-4" src="https://res.cloudinary.com/dxw06ktju/image/upload/v1716981553/DMA_9738_iukxtv.jpg" alt="Image">
                        <h1 class="text-primary mt-2">Chime Emmanuel</h1>
                        <div class="mb-4" style="height: 22px;">
                            <h4 class="typed-text-output d-inline-block text-light"></h4>
                            <div class="typed-text d-none">Full Stack Web Developer, System Consultant, Technical Customer Support Specialist </div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto mb-3">
                            <a class="btn btn-secondary btn-square mx-1" href="https://x.com/i_mezie" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-secondary btn-square mx-1" href="https://www.facebook.com/chimeemanuel" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-secondary btn-square mx-1" href="https://www.linkedin.com/in/irozuru-emmanuel-chimezerem-09383bab/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-secondary btn-square mx-1" href="https://www.instagram.com/mezie11/" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="d-flex align-items-end justify-content-between border-top">
                            <a href="https://github.com/emmanuelmezie" target="_blank" class="btn w-50 border-end">GitHub</a>
                            <a href="#contact" class="btn w-50 btn-scroll">Contact Me</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    <!-- Contact Start -->
                    <section class="py-5 wow fadeInUp" data-wow-delay="0.1s" id="contact">
                        <h1 class="title pb-3 mb-5">Testimony Form</h1>
                        
						<form enctype="multipart/form-data" wire:submit.prevent="addTestimony">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 bg-secondary" id="name" placeholder="Your Name" wire:model="name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 bg-secondary" id="subject" placeholder="Subject" wire:model="profession" required>
                                        <label for="subject">Profession</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0 bg-secondary" placeholder="Leave a message here" id="message" style="height: 200px" wire:model="testimony" required></textarea>
                                        <label for="message">Testimony</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="file" class="form-control border-0 bg-secondary" wire:model="image" />
                                        @if($image)
                                            <img src="{{$image->temporaryUrl()}}" width="120px" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                        <div class="progress" wire:loading.class="d-flex" wire:loading>
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                        </div>
                                        <button wire:click="showLoader" type="submit" class="btn btn-primary w-100 py-3">Send Testimony</button>  
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- Contact End -->

                    <!-- Footer Start -->
                    <section class="wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-secondary text-light text-center p-5">
                            <div class="d-flex justify-content-center mb-4">
                                <a class="btn btn-secondary btn-square mx-1" href="https://x.com/i_mezie" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-square mx-1" href="https://www.facebook.com/chimeemanuel" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-square mx-1" href="https://www.linkedin.com/in/irozuru-emmanuel-chimezerem-09383bab/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-square mx-1" href="https://www.instagram.com/mezie11/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <a class="text-light px-3 border-end" href="{{route('index')}}">Home</a>
                                <a class="text-light px-3 border-end" href="{{route('testimony')}}">Drop a Testimonial</a>
                                <a class="text-light px-3" href="#">Help</a>
                            </div>
							
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							<p class="m-0">&copy; All Rights Reserved. Developed by <a href="#">Chime Emmanuel</a></p>
                        </div>
                    </section>
                    <!-- Footer End -->
                </div>
            </div>
        </div>