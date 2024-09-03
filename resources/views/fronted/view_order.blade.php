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
                                        <img src="/pro/{{$item->products->image}}" style="height: 100px; width:100px;" alt="...">
                                        
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>


 

<!-- jQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <!-- OwlCarousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>
</html>
