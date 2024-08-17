<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap Demo</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- External OwlCarousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  @include('fronted.nav')
  <div class="container mt-5">
    <form action="{{ url('place-order') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Card 1: Basic Details Form -->
            <div class="col-md-6">
                <div class="card mb-5">
                    <div class="card-header">Basic Details</div>
                    <div class="card-body">
                        <div class="form-row d-flex gap-2">
                            <div class="form-group col-md-6">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->name}}" id="fname" name="fname" placeholder="First Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="{{Auth::user()->lname}}" id="lname" name="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-row d-flex gap-2">
                            <div class="form-group col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{Auth::user()->email}}" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" value="{{Auth::user()->phone}}" id="phone" name="phone" placeholder="Phone" required>
                            </div>
                        </div>
                        <div class="form-row d-flex gap-2">
                            <div class="form-group col-md-6">
                                <label for="address1" class="form-label">Address 1</label>
                                <input type="text" class="form-control" value="{{Auth::user()->address1}}" id="address1" name="address1" placeholder="Address 1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" value="{{Auth::user()->address2}}" id="address2" name="address2" placeholder="Address 2">
                            </div>
                        </div>
                        <div class="form-row d-flex gap-2">
                            <div class="form-group col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" value="{{Auth::user()->city}}" id="city" name="city" placeholder="City" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" value="{{Auth::user()->state}}" id="state" name="state" placeholder="State" required>
                            </div>
                        </div>
                        <div class="form-row d-flex gap-2">
                            <div class="form-group col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" value="{{Auth::user()->country}}" id="country" name="country" placeholder="Country" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pincode" class="form-label">Pin Code</label>
                                <input type="text" class="form-control" value="{{Auth::user()->pincode}}" id="pincode" name="pincode" placeholder="Pin Code" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Product Details Table -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Order Details</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{ $item->products->name }}</td>
                                    <td>{{ $item->prod_qty }}</td>
                                    <td>${{ $item->products->selling_price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


 

<!-- jQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <!-- OwlCarousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>
