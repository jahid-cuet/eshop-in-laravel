

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
        <div class="container mt-5">
            <h2 class="mb-4">Product Information Form</h2>
            <form action="{{url('store_product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <!-- Category ID -->
                    <div class="form-group col-md-4">
                        <label for="cate_id">Category</label>
                        <select class="form-control @error('cate_id') is-invalid @enderror" id="cate_id" name="cate_id" required>
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Product Name -->
                    <div class="form-group col-md-4">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="slug">Slug:</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required>
                        @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="small_description">Small Description</label>
                    <textarea class="form-control @error('small_description') is-invalid @enderror" id="small_description" name="small_description" rows="2" required></textarea>
                    @error('small_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required></textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-row">
                    <!-- Original Price -->
                    <div class="form-group col-md-6">
                        <label for="original_price">Original Price</label>
                        <input type="number" class="form-control @error('original_price') is-invalid @enderror" id="original_price" name="original_price" required>
                        @error('original_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <!-- Selling Price -->
                    <div class="form-group col-md-6">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" class="form-control @error('selling_price') is-invalid @enderror" id="selling_price" name="selling_price" required>
                        @error('selling_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" required>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-row">
                    <!-- Quantity -->
                    <div class="form-group col-md-6">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" required>
                        @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <!-- Tax -->
                    <div class="form-group col-md-6">
                        <label for="tax">Tax</label>
                        <input type="number" class="form-control @error('tax') is-invalid @enderror" id="tax" name="tax" required>
                        @error('tax')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-row">
                    <!-- Status -->
                    <div class="form-group form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                        <label class="form-check-label" for="status">Status</label>
                      
                    </div>
                    <!-- Trending -->
                    <div class="form-group form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="trending" name="trending" value="1">
                        <label class="form-check-label" for="trending">Trending</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title:</label>
                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" required>
                    @error('meta_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description:</label>
                    <input type="text" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" required>
                    @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords:</label>
                    <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" name="meta_keywords" required>
                    @error('meta_keywords')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
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

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>

