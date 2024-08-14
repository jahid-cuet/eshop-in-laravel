<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap Demo</title>
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- External OwlCarousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    @include('fronted.nav')

    <div class="container mt-4 d-flex justify-content-center">
        <div class="card" style="width: 66.67%; max-width: 600px;">
            <img src="/pro/{{$product->image}}" class="card-img-top" style="height: 278px; width: auto;" alt="...">
            <div class="card-body">
                <h2 class="card-title">{{$product->name}}</h2>
                <span class="float-start">Original Price : {{$product->original_price}}</span>
                <span class="float-end">Selling Price : <s>{{$product->selling_price}}</s></span>
                <br>
                <p class='mt-2'>{{$product->description}}</p>
                <label class='badge bg-danger trending_tag mb-2' style="font-size: 16px ">{{ $product->trending == '1' ? 'Trending' : '' }}</label>
                
                <input type="hidden" value="{{$product->id}}" class="prod_id">
                <p class="fw-bold">Quantity<br></p>
                <div class="quantity-control mt-3 d-flex align-items-center">
                    <button class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>
                    <input type="text" id="quantity" class="form-control text-center mx-2" value="{{$product->quantity}}" readonly style="max-width: 60px;">
                    <button class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>
                </div>

                <div class="d-flex justify-content-center">
                    <a class="btn btn-primary m-4 addToCartBtn">Add to cart<i class="fa-solid fa-cart-shopping mx-1"></i></a>
                    <a class="btn btn-secondary m-4">Add to Wishlist<i class="fas fa-heart mx-1"></i></a>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    {{-- jQuery Part start --}}
    <script>
        $(document).ready(function() {
           

            $('.addToCartBtn').click(function() {
                var productId = $('.prod_id').val();
                var quantity = $('#quantity').val();


                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                
                $.ajax({
                    method: "POST",
                    url: '/add-to-cart', // URL
                   
                    data: {
                        'product_id': productId,
                        'quantity': quantity,
                    },
                    success: function(response) {
                        alert('Product added to cart successfully.');
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                    }
                });
            });
        });





    function incrementQuantity() {
      let quantityInput = document.getElementById('quantity');
      let currentValue = parseInt(quantityInput.value);
      if (currentValue < 10) {
        quantityInput.value = currentValue + 1;
      }
    }

    function decrementQuantity() {
      let quantityInput = document.getElementById('quantity');
      let currentValue = parseInt(quantityInput.value);
      if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
      }
    }
  </script>
  {{-- jquery Part End--}}
 
</body>
</html>
