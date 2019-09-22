@extends('layouts.common')

@section('content')

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> Update Blog</h1>
                </div>
            </div>

        <div class="row">
            <div class="container">
                <div class="tile pb-5">
                  <div class="tile-body">
                    <form id="updateBlogs" action="{{ action('BlogController@update', [$blog->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                          @method('PUT')
                        <div class="form-group row">
                        <label for="lblTitle" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>
                        <div class="col-md-9">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"  autocomplete="title" placeholder="Title" value="{{$blog->title}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="lblDetails" class="col-md-3 col-form-label text-md-right">{{ __('Details') }}</label>
                        <div class="col-md-9">
                          <textarea id="details" class="form-control @error('details') is-invalid @enderror" name="details" autocomplete="details" placeholder="Details">{{$blog->content}}</textarea>
                            @error('details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="lblTags" class="col-md-3 col-form-label text-md-right">{{ __('Tags') }}</label>
                        <div class="col-md-9">
                          <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags"  autocomplete="tags" placeholder="Tags" value="{{$blog->tags}}">
                            @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="lblCategory" class="col-md-3 col-form-label text-md-right">{{ __('Category') }}</label>
                        <div class="col-md-9">
                          <select id="blogCategory" name="blogCategory" class="form-control @error('blogCategory') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach ($blogCategories as $blogCategory)
                            <option value="{{$blogCategory->id}}" {{($blogCategory->id == $blog->blog_category_id)?"selected": ""}}>{{$blogCategory->title}}</option>
                            @endforeach
                          </select>
                          @error('blogCategory')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>

                        <div class="form-group row" id="imageDiv">
                            <label class="col-md-3 form-control-label text-md-right">Selected Image</label>
                            <div class="col-md-9" >
                                <img src="{{URL::asset('images/blog/'.$blog->image)}}" class="img-fluid" alt="Image Preview" id="imagePreview">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-3 form-control-label text-md-right">Main Image</label>
                            <div class="col-md-9">
                                 <input type="file" class=" form-control text-muted" id="postImage" name="postImage" aria-describedby="postHelp">
                                <small id="postHelp" class="form-text text-muted ">Please upload jpg, png files.</small>
                                @error('postImage')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <button name="updateBlog" type="submit" class="btn btn-danger float-right" id="updateBlog">Update Blog</button>

                    </form>
                  </div>
                </div>
            </div>
        </div>
      </main>
</section>
@endsection
@push('scripts')
<script src="{{ asset('js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  tinymce.init({
    selector: 'textarea#details',
    height: 300,
    menubar: false,
    branding: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount jbimages contextmenu'
    ],
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',


  });
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#imagePreview').attr('src', e.target.result);
              $("#imageDiv").removeClass("d-none");
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#postImage").change(function(){
      $("#postHelp").removeClass("text-danger").addClass("text-muted");
      var notificationImage = $("#postImage").val();
      var extension = notificationImage.split('.').pop().toUpperCase();
      if(extension === "PNG" || extension === "JPG"){
          readURL(this);
      }else{
          $("#postHelp").removeClass("text-muted").addClass("text-danger");
      }
  });
</script>
@endpush
