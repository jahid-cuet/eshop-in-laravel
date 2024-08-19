<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('admin.css')
</head>

<body>
    <header class="header">
        @include('admin.header')
    </header>

    <div class="d-flex align-items-stretch">
        @include('admin.slider')

        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-primary text-center text-white">Order History</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($orders as $order)
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Order #{{ $order->id }}</h5>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tracking Number</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col"> Price</th>
                                                <th scope="col">Order Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->orderItems as $item)
                                            <tr>
                                                <td>{{ $order->tracking_no }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>${{ number_format($item->price, 2) }}</td>
                                                <td>
                                                    <div>
                                                        <form action="{{ url('update', $order->id) }}" method="POST">
                                                            @csrf
                                                            <select class="form-select" name="order-status">
                                                                <option {{ $order->status == '0' ? 'selected' : '' }} value="0">Pending</option>
                                                                <option {{ $order->status == '1' ? 'selected' : '' }} value="1">Completed</option>
                                                            </select>
                                                            <br>
                                                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
