<main>
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts mt-5" style="margin-top:20px;">
        <div class="container">
            <h2 class="text-center">Admin Dashboard</h2>
          <div class="row no-gutters mt-3">
  
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="bi bi-emoji-smile"></i>
                <span data-purecounter-start="0" data-purecounter-end="{{$blogNews->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>News Blog</strong></p>
              </div>
            </div>
  
  
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="bi bi-headset"></i>
                <span data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>Portfolios</strong></p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-md-flex align-items-md-stretch">
              <div class="count-box">
                <i class="bi bi-people"></i>
                <span data-purecounter-start="0" data-purecounter-end="{{$experiences->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                <p><strong>My Experiences</strong> </p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Counts Section -->

      <section>
        <div class="container">
           
            <div class="row">
                <div class="col-md-9">
                    <h5>Recent News</h5>
                    <div class="table-responsive">
                      <table class="table table-striped">
                          <tr>
                              <th>Title</th>
                              <th>Category</th>
                              <th>Content</th>
                              <th>Image</th>
                          </tr>
                          @foreach ($blogNews->take(10) as $news)
                              <tr>
                                  <td>{{$news->title}}</td>
                                  <td>{{$news->blogcategory->cat_name}}</td>
                                  <td>{{ Str::limit($news->news_content, $limit = 150, $end = ' ...') }}</td>
                                  <td>
                                      <a href="{{$news->image_path}}" data-gallery="portfolioGallery" 
                                      class="portfolio-lightbox" 
                                      title="{{$news->news_content}}">View Image</a>
                                  </td>
                              </tr>
                          @endforeach
                      </table>
                    </div>
                    <div>
                      <a href="{{route('adminnews')}}" class="btn-get-started">View all</a>
                    </div>
                </div>
                <div class="col-md-3 table-responsive">
                    <h5> News Categories</h5>
                    <table class="table table-striped">
                        <tr>
                            <th>Category Name</th>
                        </tr>
                        @foreach ($blogCategories->take(5) as $category)
                            <tr>
                                <td>{{$category->cat_name}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div>
                      <a href="{{route('adminnews')}}" class="btn-get-started">View all</a>
                    </div>
                </div>
            </div>
        </div>
      </section>
</main>
