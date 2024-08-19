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
        <div class="card-header bg-primary text-center text-white">Order View</div>
       
            <div class="row">
               
                <!-- Card 1: Basic Details Form -->
                <div class="col-md-6">
                    <div class="card mb-5">
                        <div class="card-body">
                            @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <label for="">First Name</label>
                                            <div class="border p-2">{{$order->fname}}</div>
                                        </td>
                                        <td>
                                            <label for="">Email</label>
                                            <div class="border p-2">{{$order->email}}</div>
                                        </td>
                                        <td>
                                            <label for="">First Phone</label>
                                            <div class="border p-2">{{$order->phone}}</div>
                                        </td>
                                        <td>
                                            <label for="">Shipping Address</label>
                                            <div class="border p-2">
                                                {{$order->address1}},
                                                {{$order->address2}},
                                                {{$order->state}},
                                                {{$order->country}},
                                            </div>
                                        </td>
                                        <td>
                                            <label for="">Zip Code</label>
                                            <div class="border p-2">{{$order->pincode}}</div>
                                        
                                    </tr>
                             
                                   
                    </div>
                </div>
            </div>
    
                <!-- Card 2: Product Details Table -->
                <div class="col-md-6">
                    <div class="card">
                        
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <img src="/pro/{{$item->products->image}}" style="height: 278px; width: auto;" alt="...">
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                    
                                </tbody>
                            </table>

                        </div>

                       
                    </div>
                    <div class="mt-5 px-2">
                        <label for="">Order Status</label>
                        <form action="{{url('update',$order->id)}}" method="POST">
                            @csrf
                            <select class="form-select" name="order-status">
                                <option {{$order->status == '0'? 'selected':''}} value="0">Pending</option>
                                <option {{$order->status == '1'? 'selected':''}} value="1">Completed</option>
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    @endforeach
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




