<main>
    <div class="container mt-5" style="margin-top:25px;">
          <h2 class="text-center">My Portfolios</h2>
          <div class="row">
              {{-- Blog News session --}}
            <div class="col-md-12">
                  <div>
                      <!-- Button trigger modal -->
                      
                      <h6 class="text-center mt-2">
                        <button type="button" class="btn-get-started text-center " data-bs-toggle="modal" data-bs-target="#addPortfolio">
                            Add Portfolio
                        </button>
                      </h6>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="addPortfolio" tabindex="-1" aria-labelledby="addPortfolio" aria-hidden="true" wire:ignore>
                          <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="addNewsLabel">Add Portfolio</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <form enctype="multipart/form-data" wire:submit.prevent="addPortfolio">
                                        <div class="form-group mt-2">
                                          <input type="text" class="form-control" placeholder="Project Title" required wire:model="project_name">
                                          @error('project_name') <p class="text-danger">{{$message}}</p>@enderror
                                        </div>

                                        <div class="form-group mt-2">
                                            <select class="form-control" wire:model="portfolio_type" >
                                                <option>Portfolio Type</option>
                                                    <option value="design">Design</option>
                                                    <option value="development">Development</option>
                                            </select>
                                        </div>

                                        <div class="form-group mt-2">
                                          <input type="text" class="form-control" placeholder="Project URL" required wire:model="project_url">
                                          @error('project_url') <p class="text-danger">{{$message}}</p>@enderror
                                        </div>

                                        <div class="form-group mt-2" wire:ignore>
                                            <label>Description</label>
                                            <textarea class="form-control" id="description" wire:model="description"></textarea>
                                        </div>
                                     
                                        <div class="form-group mt-3">
                                            <div class="col-md-12">
                                                <label class="control-label">Portfolio Image</label>
                                                <input type="file" class="form-control input-file" wire:model="image" />
                                                @if($image)
                                                    <img src="{{$image->temporaryUrl()}}" width="120px" />
                                                @endif
                                            </div>
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
                                <th>Type</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($portfolios as $portfolio)
                            <tr>
                                <td>{{ucwords($portfolio->portfolio_type)}}</td>
                                <td>
                                    <div class="post-item">
                                        <a href="{{$portfolio->image_path}}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                            <img src="{{$portfolio->image_path}}" alt="Portfolio{{$portfolio->id}}">
                                        </a>
                                    </div>
                                </td>
                                <td>{{ucwords($portfolio->project_name)}}</td>
                                <td> {{ Str::limit($portfolio->description, $limit = 150, $end = ' ...') }}</td>
                                <td>
                                    <a class="mx-2" wire:click="editPortfolio({{$portfolio->id}})"
                                        data-bs-toggle="modal" data-bs-target="#updateportfolio">
                                        <i class="bx bx-edit"></i> </a>

                                    
                                    <a href="#" onclick="confirm('Are you sure you want to delete this Portfolio?') || event.stopImmediatePropagation()" wire:click.prevent="deletePortfolio({{$portfolio->id}})"><i class="bx bx-trash" style="color:red;"></i> </a>
                                    <!-- Modal -->
                                    <div class="modal fade" wire:ignore id="updateportfolio" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" >
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Portfolio</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form enctype="multipart/form-data" wire:submit.prevent="updatePortfolio">
                                                        <div class="form-group mt-2">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" placeholder="Project name" required wire:model="editproject_name">
                                                            @error('editproject_name') <p class="text-danger">{{$message}}</p>@enderror
                                                        </div>

                                                        <div class="form-group mt-2">
                                                            <select class="form-control" wire:model="editportfolio_type" >
                                                                <option>Portfolio Type</option>
                                                                    <option value="design">Design</option>
                                                                    <option value="development">Development</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group mt-2">
                                                            <label>Project URL</label>
                                                            <input type="text" class="form-control" placeholder="Project URL" required wire:model="editproject_url">
                                                            @error('editproject_url') <p class="text-danger">{{$message}}</p>@enderror
                                                        </div>

                                                        <div class="form-group mt-2" wire:ignore>
                                                            <label>Description</label>
                                                            <textarea class="form-control" id="description" wire:model="editdescription"></textarea>
                                                        </div>

                                                        <div class="form-group mt-3">
                                                            <div class="col-md-12">
                                                                <label class="control-label">Edit Portfolio Image</label>
                                                                <input type="file" class="form-control input-file" wire:model="editimage" />
                                                                @if($editimage)
                                                                    <img src="{{$editimage->temporaryUrl()}}" width="120px" />
                                                                @endif
                                                            </div>
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
</main>
