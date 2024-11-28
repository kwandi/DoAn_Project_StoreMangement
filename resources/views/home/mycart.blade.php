<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .div_cart{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }
        table {
            border: 2px solid #000;
            text-align: center;
            width: 500px;
        }
        th{
            border: 2px solid #000;
            text-align: center;
            color: #fff;
            font: 20px;
            font-weight: bold;
            background-color: black;
        }
        td {
            border: 2px solid #BE5050FF;
        }
        .totalPrice{
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
        }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

    <div class="div_cart" >

        <div>
            <form style="margin-right: 50px" action="{{url('comfirm_order')}}" method="post">
                @csrf
                <div>
                    <label >Receiver Name</label>
                <input type="text" name="name">
                </div>
                <div>
                    <label >Receiver Address</label>
                <textarea name="address"></textarea>
                </div>
                <div>
                    <label >Receiver Phone</label>
                <input type="text" name="phone">
                </div>

                <input class="btn btn-primary" type="submit" value="Place Order">
            </form>
        </div>

        <table>
        <tr>
            <th>Product Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Remove</th>
        </tr>

        <?php $s=0?>
        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td><img width="50px" height="50px" src="images/{{$cart->product->image}}"></td>
            <td><a href="{{url('delete_cart', $cart->id)}}" class="btn btn-danger">remove</a></td>
        </tr>
        <?php $s += $cart->product->price ?>
        @endforeach

    </table>

    </div>
    <h4 class="totalPrice">Total value of Cart is: {{$s}}</h4>


  <!-- end info section -->

  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>
