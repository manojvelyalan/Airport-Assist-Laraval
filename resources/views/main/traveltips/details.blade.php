@extends('layouts.main')
@section('content')
<section class="blog-detailed-section">
	<!-- sect 1 banner image -->
	<div class="blog-detailed-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-text pt-10">
						<h1 class="text-white text-uppercase text-center m-auto font-weight-light">
						Subscribe To Our
						</h1>
						<div class="pt-1"></div>
						<h1 class="text-white text-uppercase text-center m-auto font-weight-bold">Newsletter</h1>
						<div class="w-40 m-auto pt-5 subscribe-email">
								<form id="createSubscription" action="{{action('Main\SubscriptionController@store')}}" method="post">
									@csrf
                                                    <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Email Address" aria-label="Email Address" id="email" name="email"/>
                                                            <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary text-uppercase" type="submit" id="subscribe">Subscribe<i class="fa fa-spinner d-none" id="subscribeFA"></i></button>
                                                            </div>

                                                    </div>
																										@error('email')
																												<span class="text-danger" role="alert">
																														<strong>{{ $message }}</strong>
																												</span>
																										@enderror
																										<input type="hidden" name="blog_id" value="{{$blog->id}}">
																										<input type="hidden" name="title" value="{{$blog->title}}">

              </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- blog content -->
@if($blog != "")



	<div class="blog-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@if(session('success'))
							<div class="alert alert-success mt-4">{{session('success')}}</div>
					@endif
					<hr>
                                        <h1>{{$blog->title}}</h1>
					<hr>
				</div>
			</div>
			<div class="row">
        @if($blog->image != "")
				<div class="col-md-12">
					<img src="{{URL::asset('images/blog/'.$blog->image)}}" alt="" class="img-fluid img-thumbnail" style="width: 100%;height: auto;">
				</div>
        @endif
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12 mt-5">
          {!! $blog->content !!}
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<h4>Leave Comment</h4>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">

					<form id="createComments" action="{{action('Main\MainBlogController@comments')}}" method="post">
							@csrf

						<div class="row">
							<div class="form-group col-md-6">
								<input type="text" class="form-control" placeholder="Enter Your Name" name="name" id="name"/>
								@error('name')
										<span class="text-danger" role="alert">
												<strong>{{ $message }}</strong>
										</span>
								@enderror
							</div>

							<div class="form-group col-md-6">
								<input type="text" class="form-control" placeholder="Enter Your Email" name="commentEmail"  id="commentEmail"/>
								@error('commentEmail')
										<span class="text-danger" role="alert">
												<strong>{{ $message }}</strong>
										</span>
								@enderror
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-12">
								<textarea name="message" rows="5" class="form-control" placeholder="Enter Comment Here" id="message"></textarea>
								@error('message')
										<span class="text-danger" role="alert">
												<strong>{{ $message }}</strong>
										</span>
								@enderror
							</div>
						</div>
						<input type="hidden" name="blog_id" value="{{$blog->id}}">
						<input type="hidden" name="title" value="{{$blog->title}}">
            <button name="comment" type="submit" class="btn btn-danger brand-bg-red no-radius-border text-uppercase float-right" id="comment">Submit<i class="fa fa-spinner d-none" id="commentFA"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>

@else
        <div class="alert alert-danger mt-5 mb-3 container ">Sorry.. No details available here.</div>
@endif
</section>
@endsection
