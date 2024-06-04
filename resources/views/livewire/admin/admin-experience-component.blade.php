<main>
  
    <section>
      <div class="container mt-5">
          <h2 class="text-center">Admin Announcement Dashboard</h2>
          <div class="row">
              {{-- Blog News session --}}
            <div class="col-md-12">
                  <div>
                      <!-- Button trigger modal -->
                      
                      <h6 class="text-center mt-2">
                        <button type="button" class="btn-get-started text-center " data-bs-toggle="modal" data-bs-target="#addExperiences">
                            Add New Experience
                        </button>
                      </h6>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="addExperiences" tabindex="-1" aria-labelledby="addExperience"  aria-hidden="true" wire:ignore>
                          <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="addNewsLabel">Add Experience</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <form enctype="multipart/form-data" wire:submit.prevent="addExperience">
                                      <div class="form-group mt-2">
                                          <input type="text" class="form-control" placeholder="Title" required wire:model="title">
                                          @error('title') <p class="text-danger">{{$message}}</p>@enderror
                                      </div>

                                      <div class="form-group mt-2">
                                          <input type="text" class="form-control" placeholder="Company Name" required wire:model="company_name">
                                          @error('company_name') <p class="text-danger">{{$message}}</p>@enderror
                                      </div>

                                      <div class="form-group mt-2" wire:ignore>
                                          <label>Description</label>
                                          <textarea class="form-control" id="description" wire:model="description"></textarea>
                                          @error('description') <p class="text-danger">{{$message}}</p>@enderror
                                      </div>
                                     
                                      <div class="form-group mt-3">
                                          <input type="date" class="form-control" placeholder="Start Date" wire:model="start_year">
                                      </div>

                                      <div class="form-group mt-3">
                                          <input type="date" class="form-control" placeholder="End Date" wire:model="end_year">
                                      </div>

                                      <div class="form-group mt-3">
                                        <div class="progress" wire:loading.class="d-flex" wire:loading>
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                        </div>
                                        <button wire:click="showLoader" type="submit" class="btn-get-started">Save</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                          </div>
                      </div>
                  </div>

                  @if(Session::has('bnmessage'))
                        <div class="alert alert-success" role="alert">{{Session::get('bnmessage')}}</div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <td>Company Name</td>
                            <th>Description</th>
                            <th>Start Year</th>
                            <th>End Year</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($experiences as $experience)
                        <tr>
                            <td>{{ucwords($experience->title)}}</td>
                            <td>{{ucwords($experience->company_name)}}</td>
                            <td>{{ Str::limit($experience->description, $limit = 150, $end = ' ...') }}</td>
                            <td>{{$experience->start_year}}</td>
                            <td>{{$experience->end_year}}</td>
                            <td>
                                <a class="mx-2" wire:click="editExperience({{$experience->id}})"
                                    data-bs-toggle="modal" data-bs-target="#updatenews">
                                    <i class="bx bx-edit"></i> </a>

                                   
                                <a href="#" onclick="confirm('Are you sure you want to delete this Experience?') || event.stopImmediatePropagation()" wire:click.prevent="deleteExperience({{$experience->id}})"><i class="bx bx-trash" style="color:red;"></i> </a>
                                <!-- Modal -->
                                <div class="modal fade" wire:ignore id="updatenews" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" >
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Experience</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form enctype="multipart/form-data" wire:submit.prevent="updateExperience">
                                                    <div class="form-group mt-2">
                                                        <input type="text" class="form-control" placeholder="Title" required wire:model="edittitle">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <input type="text" class="form-control" placeholder="Company Name" required wire:model="editcompany_name">
                                                    </div>
              
                                                    <div class="form-group mt-2" wire:ignore>
                                                        <label>Description</label>
                                                        <textarea class="form-control" id="description" wire:model="editdescription"></textarea>
                                                    </div>
                                                   
                                                    <div class="form-group mt-3">
                                                        <input type="text" class="form-control" placeholder="Start Date" wire:model="editstart_year">
                                                    </div>

                                                    <div class="form-group mt-3">
                                                        <input type="text" class="form-control" placeholder="End Date" wire:model="editend_year">
                                                    </div>
              
                                                    <div class="form-group mt-3">
                                                        <div class="progress" wire:loading.class="d-flex" wire:loading>
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                                        </div>
                                                        <button wire:click="showLoader" type="submit" class="btn-get-started">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                  
                  
            </div>   
          </div>
      </div>
    </section>
</main>
