<main>
    <div class="container mt-5" style="margin-top:25px;">
          <h2 class="text-center">Contacts</h2>
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
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ucwords($contact->name)}}</td>
                                <td>{{ucwords($contact->email)}}</td>
                                <td>{{ucwords($contact->subject)}}</td>
                                <td> {{$contact->message}}</td>
                                <td>
                                    @if($contact->status == true)
                                        Read
                                    @else 
                                        Not Read
                                    @endif
                                </td>
                                <td>
                                    <a class="mx-2" wire:click.prevent="updateTestimonyStatus({{$contact->id}})">
                                        <i class="bx bx-edit"> Approve</i> 
                                    </a>
                                    <a href="#" onclick="confirm('Are you sure you want to delete this Testimony?') || event.stopImmediatePropagation()" wire:click.prevent="deleteContact({{$contact->id}})"><i class="bx bx-trash" style="color:red;"></i> </a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
            </div>   
          </div>
    </div>
</main>

