<main>
  
      <section>
        <div class="container mt-5">
            <h2 class="text-center">Admin News Dashboard</h2>
            <div class="row">
                {{-- Blog Category Session --}}
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-12">
                            
                            <!-- Button trigger modal -->
                            <button type="button" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#addNewCategory">
                                Add New Category
                            </button>
                            <h6 class="text-center mt-2"><b>All News Categories</b></h6>
                            <!-- Modal -->
                            <div class="modal fade" id="addNewCategory" tabindex="-1" aria-labelledby="addNewCategoryLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="addNewCategoryLabel">New Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form wire:submit.prevent="addNewCategory">
                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control" placeholder="Category Name" required wire:model="categoryName">
                                            </div>
                                            <div class="form-group mt-3">
                                                <button type="submit" class="btn-get-started">Save</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('cmessage'))
                        <div class="alert alert-success" role="alert">{{Session::get('cmessage')}}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($blogCategories as $category)
                                <tr>
                                    <td>{{$category->cat_name}}</td>
                                    <td>
                                        <a class="mx-2" wire:click="editBlogCategory({{$category->id}})"
                                            data-bs-toggle="modal" data-bs-target="#updateCategory">
                                            <i class="bx bx-edit"></i> </a>

                                        
                                        <a href="#" onclick="confirm('Are you sure you want to delete this Blog category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteBlogCategory({{$category->id}})"><i class="bx bx-trash" style="color:red;"></i> </a>
                                        <!-- Modal -->
                                        <div class="modal fade" wire:ignore id="updateCategory" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" >
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Blog Category</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="new-added-form" wire:submit.prevent="updateBlogCategory">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                                <input type="text" placeholder="Category name" class="form-control" wire:model="editcategoryName">
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <button type="submit" class="btn-get-started">Update</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
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

                {{-- Blog News session --}}
                <div class="col-md-9">
                    <div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#addNews">
                            Add New Blog News
                        </button>
                        <h6 class="text-center mt-2"><b>All Blog News</b></h6>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="addNews" tabindex="-1" aria-labelledby="addNewsLabel"    aria-hidden="true" wire:ignore>
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="addNewsLabel">Add News</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" wire:submit.prevent="addBlogNews">
                                        <div class="form-group mt-2">
                                            <select class="form-control" wire:model="category_id" >
                                                <option>Select News Category</option>
                                                @foreach($blogCategories as $category)
                                                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <p class="text-danger">{{$message}}</p>@enderror
                                        </div>
                                        <div class="form-group mt-2">
                                            <input type="text" class="form-control" placeholder="News Title" required wire:model="title">
                                            @error('title') <p class="text-danger">{{$message}}</p>@enderror
                                        </div>

                                        <div class="form-group mt-2" wire:ignore>
                                            <label>News Content</label>
                                            {{-- <textarea class="ckeditor form-control" id="newscontent" wire:model="newsContent"></textarea> --}}
                                            <textarea class="form-control" id="newscontent" wire:model="newsContent"></textarea>
                                            @error('newsContent') <p class="text-danger">{{$message}}</p>@enderror
                                        </div>
                                       
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" placeholder="Button Title" wire:model="buttonTitle">
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="text" class="form-control" placeholder="External Link" wire:model="externalLink">
                                        </div>
                                        <div class="form-group mt-3">
                                            <div class="col-md-12">
                                                <label class="control-label">Featured Image</label>
                                                <input type="file" class="form-control input-file" wire:model="image" />
                                                @if($image)
                                                    <img src="{{$image->temporaryUrl()}}" width="120px" />
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="checkbox" wire:model="isSlideChecked"> Show Post on Slider

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
                                <th>Image</th>
                                <th>Category</th>
                                <th>Content</th>
                                <th>View</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($blogNews as $news)
                                <tr>
                                    <td>{{ucwords($news->title)}}</td>
                                    <td>
                                        <div class="post-item">
                                            <a href="{{$news->image_path}}" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                <img src="{{$news->image_path}}" alt="Blog{{$news->id}}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{$news->blogcategory->cat_name}}</td>
                                    <td> {{ Str::limit($news->news_content, $limit = 150, $end = ' ...') }}</td>
                                    <td>
                                        <a href="{{route('adminsingleblognews',['blog_id'=>$news->blognews_id])}}">{{$news->button_title}}</a>
                                    </td>
                                    <td>
                                        <a class="mx-2" wire:click="editBlognews({{$news->id}})"
                                            data-bs-toggle="modal" data-bs-target="#updatenews">
                                            <i class="bx bx-edit"></i> </a>

                                        
                                        <a href="#" onclick="confirm('Are you sure you want to delete this News?') || event.stopImmediatePropagation()" wire:click.prevent="deleteBlognews({{$news->id}})"><i class="bx bx-trash" style="color:red;"></i> </a>
                                        <!-- Modal -->
                                        <div class="modal fade" wire:ignore id="updatenews" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content" >
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Blog news</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form enctype="multipart/form-data" wire:submit.prevent="updateBlogNews">
                                                            <div class="form-group mt-2">
                                                                <select class="form-control" wire:model="category_id" >
                                                                    <option>Change News Category</option>
                                                                    @foreach($blogCategories as $category)
                                                                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category_id') <p class="text-danger">{{$message}}</p>@enderror
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label>News Title</label>
                                                                <input type="text" class="form-control" placeholder="News Title" required wire:model="editTitle">
                                                            </div>
                    
                                                            <div class="form-group mt-2" wire:ignore>
                                                                {{-- <textarea class="ckeditor form-control" id="newscontent" wire:model="newsContent"></textarea> --}}
                                                                <label>News Content</label>
                                                                <textarea class="form-control" id="newscontent" wire:model="editnewsContent"></textarea>
                                                            </div>
                                                        
                                                            <div class="form-group mt-3">
                                                                <label>Button Title</label>
                                                                <input type="text" class="form-control" placeholder="Button Title" wire:model="editButtonTitle">
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label>External Link</label>
                                                                <input type="text" class="form-control" placeholder="External Link" wire:model="editExternalLink">
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Featured Image</label>
                                                                    <input type="file" class="form-control input-file" wire:model="new_image" />
                                                                        @if($new_image)
                                                                            <img src="{{$new_image->temporaryUrl()}}" width="120px" />
                                                                        @endif
                                                                </div>
                                                            </div>
                    
                                                            <div class="form-group mt-3">
                                                                <input type="checkbox" wire:model="editSlideFeatured"> Show Post on Slider
                    
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
@push('scripts')
    <script>
        $(document).ready(function () {
        $('.ckeditor').ckeditor();
        console.log(response);
        // var sd_data = $('#newscontent').val();
        // @this.set('newscontent',sd_data);
    });
    </script>
@endpush
