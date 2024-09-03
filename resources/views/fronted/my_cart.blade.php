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
    <div class="container mt-5">
        {{-- Toastr Message --}}


        @if($message=Session::get('success'))
        <div class="alert alert-success alert-block">
          <strong>{{$message}}</strong>
        </div>
    
    
        @endif

    <div class="container">
        @if($cartitems->count()>0)
        <h3 class='mb-4'>My Carts </h3>
        
    
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Product Name</th>
              <th scope="col">Selling Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            @php
                $total=0;
            @endphp

      
    
             @foreach ($cartitems as $cart)
            <tr class="ml-2 p-2">
              <td>
                <img height="100" width="100" src="/pro/{{$cart->products->image}}" alt="image">
              </td>
              <td>
                <a>{{ $cart->products->name }}</a>
               </td>
              <td>
                <a>${{ $cart->products->selling_price }}</a>
               </td>
               <td>
                <input type="hidden" value="{{$cart->prod_id}}" class="prod_id">
                @if ($cart->products->quantity >= $cart->prod_qty)
                <div class="quantity-control mt-3 d-flex align-items-center">
                    <button class="btn btn-outline-secondary changeQuantity decrement">-</button>
                    <input type="text" class="quantity form-control text-center mx-2" value="{{$cart->prod_qty}}" readonly style="max-width: 60px;">
                    <button class="btn btn-outline-secondary changeQuantity increment">+</button>
                  </div>
                 
                  @php  $total+=$cart->products->selling_price*$cart->prod_qty @endphp
             
                @else
                    <h5>Out of Stock</h5>
                @endif
               
               </td>
               <td>
                  <a class='btn btn-danger mt-3 delete-cart-item'><i class='fa fa-trash mx-1'></i>Remove</a>
               </td>
            </tr>

            

            @endforeach 
           

          </tbody>
          
        </table>
        <div class="card-footer">
            <h4 class='mt-4'>Total Price : ${{$total}}</h4>
            <a href="checkout" class='btn btn-outline-success float-end mb-4'>Proceed to Checkout</a>
        </div>
        @else

        <div class='cart-body text-center m-4'>
            <h2>Your <i class="fa fa-shopping-cart"></i>Cart is Empty</h2>
            <a href="{{url('/front_category')}}" class="btn btn-outline-success ">Continue Shopping</a>
        </div>
        @endif
    </div>


    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- OwlCarousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            $('.increment').click(function() {
                let quantityInput = $(this).siblings('.quantity');
                let currentValue = parseInt(quantityInput.val());
                if (currentValue < 10) {
                    quantityInput.val(currentValue + 1);
                    updateQuantity(this, currentValue + 1);
                }
            });

            $('.decrement').click(function() {
                let quantityInput = $(this).siblings('.quantity');
                let currentValue = parseInt(quantityInput.val());
                if (currentValue > 1) {
                    quantityInput.val(currentValue - 1);
                    updateQuantity(this, currentValue - 1);
                }
            });

            function updateQuantity(button, newQuantity) {
                var prod_id = $(button).closest('tr').find('.prod_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "update_cart",
                    data: {
                        'prod_id': prod_id,
                        'prod_qty': newQuantity,
                    },
                    success: function(response) {
                        console.log("Success:", response); // Debugging
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", xhr.responseText); // Debugging
                    }
                });
            }

            // This is For Delete Cart
            $('.delete-cart-item').click(function() {
                var button = $(this);
                var productId = button.closest('tr').find('.prod_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
               
                $.ajax({
                    method: "POST",
                    url: "{{ route('cart.delete') }}",
                    data: {
                        'product_id': productId,
                    },
                    success: function(response) {
                        alert(response.status);
                        button.closest('tr').remove();
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
