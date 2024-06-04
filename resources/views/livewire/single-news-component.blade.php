<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{route('index')}}">Home</a></li>
          <li><a href="#">Recent News</a></li>
        </ol>
        <h2>{{ucwords($blog->title)}}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{$blog->image_path}}" alt="{{$blog->title}}" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#">{{ucwords($blog->title)}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ucwords($blog->blogeditor->name)}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{$blog->created_at}}">{{Carbon\Carbon::parse($blog->created_at)->format('d F Y')}}</time></a></li>
                  {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> --}}
                </ul>
              </div>

              <div class="entry-content">
                
                <p style="text-align: justify;">
                 {{$blog->news_content}}
                </p>
                
                <p class="mt-5 mb-5">
                    @if($blog->external_link)
                      <a class="" href="{{$blog->external_link}}" target="_blank" >{{$blog->button_title}}</a>
                    @endif
                </p>

              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li>{{ucwords($blog->blogcategory->cat_name)}}</li>
                </ul>
              </div>

            </article><!-- End blog entry -->
            
            <!-- End blog comments -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                    @foreach ($blogCategories as $category)
                        <li><a href="#">{{$category->cat_name}} <span>(0)</span></a></li>
                    @endforeach
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                @foreach ($otherBlogsNews as $recentblog)
                    <div class="post-item clearfix">
                        <img src="{{$recentblog->image_path}}" alt="Oluebube A. Chukwu Image Blog{{$recentblog->id}}">
                        <h4><a href="{{route('singlenews',['category_name'=>$recentblog->blogcategory->cat_name,'blog_id'=>$recentblog->blognews_id])}}">{{ucwords($recentblog->title)}}</a></h4>
                        <time datetime="{{$recentblog->created_at}}">{{Carbon\Carbon::parse($recentblog->created_at)->format('d F Y')}}</time>
                    </div>
                @endforeach
              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div>
          <!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->