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
              <th scope="col">Category Name</th>
              <th scope="col">Description</th>
              <th scope="col">status</th>
              <th scope="description">Image</th>
              <th scope="col" class="">Action</th>
             
            </tr>
          </thead>
          <tbody>
             @foreach ($categories as $category)
            <tr class="ml-2 p-2">
    
             <td>
              <a href="" class="btn btn-primary">{{ $category->id }}</a>
             </td>
             <td>
              <a href="" class="btn btn-primary">{{ $category->name }}</a>
             </td>
             <td>
              <a href="" class="btn btn-primary">{{ $category->description }}</a>
             </td>
             <td>
              <a href="" class="btn btn-primary">{{ $category->status }}</a>
             </td>
             <td>
                <img height="100" width="100" src="/pro/{{$category->image}}" alt="image">
              </td>
    
              <td> 
                <a href="{{ url('edit_category', $category->id) }}" class="btn btn-warning">Edit</a>
              </td>
              <td>
                <a href="{{url('delete_category',$category->id)}}" class="btn btn-danger">Delete</a>
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
