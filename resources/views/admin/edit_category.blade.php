

<!DOCTYPE html>
<html>

@include('admin.css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


<body>
   

<div class="d-flex align-items-stretch">
      @include('admin.slider')

    
<div class="container mt-5">
        {{-- Toastr Message --}}


        @if($message=Session::get('success'))
        <div class="alert alert-success alert-block">
          <strong>{{$message}}</strong>
        </div>
    
    
        @endif
    
        {{-- end --}}
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{url('update_category',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$category->name }}" required>
                 @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{$category->slug}}" required>
                    @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{$category->description}}" required></textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                    <label class="form-check-label" for="status">Status</label>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="popular" name="popular" value="1">
                    <label class="form-check-label" for="popular">Popular</label>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" value="{{$category->image}}"required>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title:</label>
                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" value="{{$category->meta_title}}" required>
                    @error('meta_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="meta_descrip">Meta Description:</label>
                    <input type="text" class="form-control @error('meta_descrip') is-invalid @enderror" id="meta_descrip" name="meta_descrip" value="{{$category->meta_descrip}}" required>
                    @error('meta_descrip')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords:</label>
                    <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" name="meta_keywords" value="{{$category->meta_keywords}}" required>
                    @error('meta_keywords')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
    
  </body>






    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>


