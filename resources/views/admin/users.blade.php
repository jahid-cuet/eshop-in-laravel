<!DOCTYPE html>
<html>

@include('admin.css')

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

      <div class="ml-5">
        <h1>Users</h1>
    
        <table class="table">
          <thead>
            <tr>
    
              <th scope="col">Id</th>
              <th scope="col"> Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Action</th>
             
            </tr>
          </thead>
          <tbody>
             @foreach ($users as $user)
            <tr class="ml-2 p-2">
    
             <td> {{ $user->id }}</td>
             <td>{{ $user->name }}</td>
             <td>{{ $user->email }}</td>
             <td>{{ $user->phone }}</td>
             
             <td>
           
             <a href="{{url('user_view',$user->id)}}" class='btn btn-warning'> View</a> 
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
