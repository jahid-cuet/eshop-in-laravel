<!DOCTYPE html>
<html>

@include('admin.css')

<body>

    <header class="header">
      @include('admin.header')
    </header>

<div class="d-flex align-items-stretch">
      @include('admin.slider')


      <div class="container">
        <div class="card-header bg-primary text-center text-white">New Orders
        <a href="{{'order-history'}}" class="btn btn-warning float-right">Order History</a>
      </div>
        <table class="table">
          <thead>

            <tr>
              <th scope="col">Order Date</th>
              <th scope="col">Tracking Number</th>
              <th scope="col">Total Price</th>
              <th scope="col">Status</th>
            
            </tr>
          </thead>
          <tbody>

    
             @foreach ($orders as $order)
            <tr class="ml-2 p-2">
              <td>
                <a>{{ date('d-m-Y',strtotime($order->created_at)) }}</a>
               </td>
              <td>
                <a>{{ $order->tracking_no }}</a>
               </td>
              <td>
                <a>{{ $order->total_price}}</a>
               </td>
              <td>
                <a>{{ $order->status == '0' ?'pending':'completed'}}</a>
               </td>
              <td>
                <a href="{{ url('admin_view_order', $order->id) }}" class="btn btn-warning">Action</a>
               </td>
               @endforeach
            </tr>
          </tbody>
          
        </table>
        
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




