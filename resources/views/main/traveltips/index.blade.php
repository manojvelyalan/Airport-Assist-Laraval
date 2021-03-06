@extends('layouts.main')

@section('content')
<section class="blog-section">
  <section class="banner-header">

	<div id="home-slider-carousel" class="carousel slide" data-ride="carousel">

		<div class="carousel-inner" id="traveltips">
                    <div class="carousel-item active">
                        <div class="d-block w-100" ></div>
                    </div>

		</div>

	</div>
	<div id="MUA-Band-Banner">
		<div class="MUA-Band-one">
			<div class="MUA-Band-Panel">
        <p class="p1  text-white text-center lh-1 text-skewToNormal font-weight-bold ">{{$displayAirportName}} <span class="d-block mt-2 mb-2">by</span><img src="{{asset('main/images/brand/murgency-logo.png')}}" width="120" alt="MUrgency Logo" ></p>
			</div>
			<div class="MUA-band-content pt-4">
				<div class="row">
					<div class="col-md-6 pt-3">
						<p class="p1 text-white text-center font-weight-bold text-white float-right text-capitalize">World's Largest Airport <br>Assistance Network</p>
					</div>
					<div class="col-md-6 pt-3">
						<p class="p2 ml-3 font-weight-bold text-white text-skewToNormal">Serving 626 Airports <br>136 Countries</p>
					</div>
				</div>
				<div class="row pt-4">
					<div class="col-md-12">
						<hr class="w-90">
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<p class="text-uppercase ml-5 text-center text-white font-weight-bold text-skewToNormal fast-easy-hassle">Subscribe To Our <br>Newsletter</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-10">

						<div class="w-100 m-auto pt-1 subscribe-email text-skewToNormal">
              <form id="createSubscription" action="{{action('Main\SubscriptionController@subscription')}}" method="post">
                @csrf
                @if(session('success'))
      							<div class="alert alert-success mt-4">{{session('success')}}</div>
      					@endif
                @error('email')
                    <span class="text-white" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email Address" aria-label="Email Address" id="email" name="email"/>
                    <div class="input-group-append">
                            <button class="btn btn-outline-secondary text-uppercase bg-dark text-white border-less" type="submit" id="subscribe">Subscribe</button>
                    </div>
                </div>

              </form>

						</div>
          </div>
      </div>
		</div>



	</div>
</div>
</section>
<div class="blog-nav">
  <div class="container-fluid">
    <ul class="nav">
      @foreach($categories as $category)
      <li class="nav-item">
        <a class="nav-link" href="">{{$category->title }}</a>
      </li>
      @endforeach

    </ul>
  </div>
</div>

<!-- Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <div id="masonry-container">
          @foreach($blogs as $blog)
        <div class="item">
          <div class="card">
            @if($blog->image != "")
                  <a href="traveltips/{{$blog->id}}/{{str_replace(" ","-",$blog->title)}}"><img src="{{URL::asset('images/blog/'.$blog->image)}}" class="card-img-top" alt="{{$blog->tags}}"></a>
              @endif
            <h6 class="text-uppercase m-auto">{{$blog->category->title}}</h6>
            <div class="card-body">
              <h6 class="font-weight-bold te">
                                                                  <a href="traveltips/{{$blog->id}}/{{str_replace(" ","-",$blog->title)}}" class="text-black">{{$blog->title}}</a>
              </h6>
                                                          <p class="font-weight-light">
                                                                  {{substr(strip_tags($blog->content),0,300)}}
                                                              </p>
                                                              <small >Published on: <span class="font-weight-bold">{{date('d/M/Y',strtotime($blog->created_at))}}</span></small>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
    <!-- ////////////////////////////////////////////////// -->
    <!-- sidebar  -->
    <!-- ////////////////////////////////////////////////// -->
    <!-- Sidebar Widgets Column -->
    <div class="col-md-4 sidebar-panel">
      <div class="social-panel row">
        <div class="col-md-6">
          <h5 class="text-uppercase font-weight-bold">Social</h5>
        </div>
        <div class="col-md-6">
          <ul>
            <li>
              <a href="https://www.facebook.com/MUAirportAssist">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/MUAirportAssist">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/muairportassist/">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Categories Widget -->

      <div class="popular-posts-wrapper my-4">
        <h5 class="text-uppercase mb-5">Popular Posts</h5>
        @foreach($popularBlogs as $popularBlog)
        <div class="popular-posts">
          <div class="row">
            <div class="col-md-4">
          <a href="traveltips/{{$popularBlog->id}}/{{str_replace(" ","-",$popularBlog->title)}}"><div style="background: url('{{URL::asset('images/blog/'.$popularBlog->image)}}');height: 100px;width: 100%;background-size: cover;"></div></a>
            </div>
            <div class="col-md-8">
            <a href="traveltips/{{$popularBlog->id}}/{{str_replace(" ","-",$popularBlog->title)}}" class="text-black font-weight-bold"><h6>{{ucwords($popularBlog->title)}}</h6></a>
            <p class="font-weight-light">{{substr(strip_tags($popularBlog->content),0,100)}}</p>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
</section>
@endsection
