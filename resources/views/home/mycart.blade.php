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
        .form_order{
           margin-right: 150px;
           width: 400px;
        }
        .form_order--input{
            width: 350px;
            display: flex;
        }
        .form_order--input label{
            flex: 1;
        }
        .form_order--input input{
            flex: 2;
            height: 40px;
        }
        .form_order--input textarea{
            margin-top: 15px;
            flex: 2;
            height: 60px;
        }

    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

    <div class="div_cart" >

        <div class="form_order">
            <form style="margin-right: 50px" action="{{url('comfirm_order')}}" method="post">
                @csrf
                <div class="form_order--input">
                    <label>Tên khách hàng</label>
                    <input type="text" name="name">
                </div>
                <div class="form_order--input">
                    <label >Số điện thoại</label>
                    <input type="text" name="phone">
                </div>
                <div class="form_order--input">
                    <label >Địa chỉ giao hàng</label>
                    <textarea name="address"></textarea>
                </div>


                <input class="btn btn-primary" type="submit" value="Đặt hàng">
            </form>
        </div>

        <table>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Xóa</th>
        </tr>

        <?php $s=0?>
        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td><img width="50px" height="50px" src="images/{{$cart->product->image}}"></td>
            <td><a href="{{url('delete_cart', $cart->id)}}" class="btn btn-danger">xóa</a></td>
        </tr>
        <?php $s += $cart->product->price ?>
        @endforeach

    </table>

</div>
<h5 class="totalPrice">Tổng giá trị của Giỏ hàng là: {{$s}} VNĐ</h5>


  <!-- end info section -->

  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>
