<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>

    @include('fronted.nav')

    <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Tracking Number</th>
              <th scope="col">Total Price</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

    
             @foreach ($orders as $order)
            <tr class="ml-2 p-2">
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
                <a href="{{ url('view_order', $order->id) }}" class="btn btn-warning">Action</a>
               </td>
               @endforeach
            </tr>
          </tbody>
          
        </table>
        
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    
</body>
</html>
