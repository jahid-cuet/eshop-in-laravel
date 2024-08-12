<!DOCTYPE html>
<html>

@include('admin.css')

<body>

    <header class="header">
      @include('admin.header')
    </header>

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

      <div class="ml-5">
        <h1>Category</h1>
    
        <table class="table">
          <thead>
            <tr>
    
              <th scope="col">Id</th>
              <th scope="col">Product Name</th>
              <th scope="col">Category</th>
              <th scope="col">Description</th>
              <th scope="col">Selling Price</th>
              <th scope="description">Image</th>
              <th scope="col" class="">Action</th>
             
            </tr>
          </thead>
          <tbody>
             @foreach ($products as $product)
            <tr class="ml-2 p-2">
    
             <td> {{ $product->id }}</td>
             <td>{{ $product->name }}</td>
             <td>{{ $product->category->name }}</td>
             <td>{{ $product->description }}</td>
             <td>{{ $product->selling_price }}</td>
             <td><img height="100" width="100" src="/pro/{{$product->image}}" alt="image"></td>
    
              <td> 
                <a href="{{ url('edit_product', $product->id) }}" class="btn btn-warning">Edit</a>
              </td>
              <td>
            <a href="{{url('delete_product',$product->id)}}" class="btn btn-danger">Delete</a>
              </td>
              
    
            </tr>
            @endforeach 
    
    
    
          </tbody>
        </table>
      </div>
    
    </div>

        



    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>


</body>

</html>
