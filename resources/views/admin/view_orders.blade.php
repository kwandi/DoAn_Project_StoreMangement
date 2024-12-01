<!DOCTYPE html>
<html>
<head> 
  @include('admin.css')
  <style type="text/css">
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
        flex-wrap: wrap;
    }

    .table_deg {
        width: 80%; /* Thu nhỏ chiều rộng bảng */
        border: 2px solid grey;
        margin: 0 auto; /* Căn giữa bảng */
        margin-bottom: 20px; /* Khoảng cách giữa các bảng */
    }

    th {
        background-color: #CC6666;
        color: white;
        font-size: 16px; /* Giảm kích thước phông chữ */
        font-weight: bold;
        padding: 20px; /* Giảm padding */
        border: 1px solid white;
    }

    td {
        border: 1px solid grey;
        text-align: center;
        font-size: 14px; /* Giảm kích thước phông chữ */
        padding: 10px; /* Giảm padding */
    }

    input[type='search'] {
        width: 100%;
        max-width: 500px;
        height: 50px;
        margin-left: 0;
    }

    img.product-img {
        width: 50px; /* Giảm kích thước ảnh */
        height: 50px;
        object-fit: cover;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 10px; /* Khoảng cách giữa các nút */
    }

    @media (max-width: 768px) {
        .div_deg {
            flex-direction: column;
            align-items: flex-start;
        }

        .table_deg {
            width: 100%;
        }

        th, td {
            font-size: 14px;
            padding: 10px;
        }

        img.product-img {
            width: 40px;
            height: 40px;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
  </style>
</head>
<body>
  @include('admin.header')

  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

          <h1>Order List</h1>

          <!-- On The Way Orders -->
          <h2>On The Way</h2>
          <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>
                
                @foreach($data as $order)
                @if($order->status == 'On the way')
                <tr>
                  <td>{{$order->name}}</td>
                  <td>{{$order->address}}</td>
                  <td>{{$order->phone}}</td>
                  <td>{{$order->product->title}}</td>
                  <td>{{$order->product->price}}</td>
                  <td>
                    <img class="product-img" src="images/{{$order->product->image}}" alt="">
                  </td>
                  <td><span>{{$order->status}}</span></td>
                  <td class="action-buttons">
                    <a class="btn btn-primary" href="{{url('on_the_way',$order->id)}}">On The Way</a>
                    <a class="btn btn-success" href="{{url('delivered',$order->id)}}">Delivered</a>
                  </td>
                </tr>
                @endif
                @endforeach
                
            </table>
          </div>

          <!-- In Progress Orders -->
          <h2>In Progress</h2>
          <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>
                
                @foreach($data as $order)
                <!-- Nếu đơn hàng có status 'in progress' thì lôi ra bảng này -->
                @if($order->status == 'in progress')
                <tr>
                  <td>{{$order->name}}</td>
                  <td>{{$order->address}}</td>
                  <td>{{$order->phone}}</td>
                  <td>{{$order->product->title}}</td>
                  <td>{{$order->product->price}}</td>
                  <td>
                    <img class="product-img" src="images/{{$order->product->image}}" alt="">
                  </td>
                  <td><span style="color: red;">{{$order->status}}</span></td>
                  <td class="action-buttons">
                    <a class="btn btn-primary" href="{{url('on_the_way',$order->id)}}">On The Way</a>
                    <a class="btn btn-success" href="{{url('delivered',$order->id)}}">Delivered</a>
                  </td>
                </tr>
                @endif
                @endforeach
                
            </table>
          </div>

          <!-- Delivered Orders -->
          <h2>Delivered</h2>
          <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>
                
                @foreach($data as $order)
                @if($order->status == 'Delivered')
                <tr>
                  <td>{{$order->name}}</td>
                  <td>{{$order->address}}</td>
                  <td>{{$order->phone}}</td>
                  <td>{{$order->product->title}}</td>
                  <td>{{$order->product->price}}</td>
                  <td>
                    <img class="product-img" src="images/{{$order->product->image}}" alt="">
                  </td>
                  <td><span style="color: greenyellow;">{{$order->status}}</span></td>
                  <td class="action-buttons">
                    <a class="btn btn-primary" href="{{url('on_the_way',$order->id)}}">On The Way</a>
                    <a class="btn btn-success" href="{{url('delivered',$order->id)}}">Delivered</a>
                  </td>
                </tr>
                @endif
                @endforeach
                
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript files-->
  <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
  <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
  <script src="{{asset('admincss/js/charts-home.js')}}"></script>
  <script src="{{asset('admincss/js/front.js')}}"></script>
</body>
</html>
