<main>
    <div class="container mt-5" style="margin-top:25px;">
          <h2 class="text-center">My Testimonies</h2>
          <div class="row">
              {{-- Blog News session --}}
            <div class="col-md-12">

                    @if(Session::has('bnmessage'))
                        <div class="alert alert-success" role="alert">{{Session::get('bnmessage')}}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Profession</th>
                                <th>Testimony</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($testimonies as $testimony)
                            <tr>
                                <td>{{ucwords($testimony->name)}}</td>
                                <td>
                                    <div class="post-item">
                                        <a href="{{$testimony->image_path}}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                            <img src="{{$testimony->image_path}}" alt="testimony{{$testimony->id}}">
                                        </a>
                                    </div>
                                </td>
                                <td>{{ucwords($testimony->profession)}}</td>
                                <td> {{ Str::limit($testimony->testimony, $limit = 150, $end = ' ...') }}</td>
                                <td>
                                    @if($testimony->status == true)
                                        Active
                                    @else 
                                        Not Active
                                    @endif
                                </td>
                                <td>
                                    <a class="mx-2" wire:click.prevent="updateTestimonyStatus({{$testimony->id}})">
                                        <i class="bx bx-edit"> Approve</i> 
                                    </a>
                                    <a href="#" onclick="confirm('Are you sure you want to delete this Testimony?') || event.stopImmediatePropagation()" wire:click.prevent="deleteTestimony({{$testimony->id}})"><i class="bx bx-trash" style="color:red;"></i> </a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
            </div>   
          </div>
    </div>
</main>
