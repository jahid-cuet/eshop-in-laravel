<!DOCTYPE html>
<html>

@include('admin.css')

<body>


<div class="d-flex align-items-stretch">
      @include('admin.slider')


<!-- Card 1: Basic Details Form -->
<div class="col-md-6">
    <h1>User View</h1>
    <div class="card mb-5">
        
        <div class="card-body">
                    <tr>
                        <td>
                            <label for="">First Name</label>
                            <div class="border p-2">{{$user->name}}</div>
                        </td>
                        <td>
                            <label for="">Email</label>
                            <div class="border p-2">{{$user->email}}</div>
                        </td>
                        <td>
                            <label for="">First Phone</label>
                            <div class="border p-2">{{$user->phone}}</div>
                        </td>
                        <td>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{$user->address1}},<br>
                                {{$user->address2}},<br>
                                {{$user->state}},<br>
                                {{$user->country}},
                            </div>
                        </td>
                        <td>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{$user->pincode}}</div>
                        
                    </tr>     
    </div>
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

           
           
           