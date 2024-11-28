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
        width: 80px; /* Giảm kích thước ảnh */
        height: 80px;
        object-fit: cover;
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
            width: 60px;
            height: 60px;
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

          <h1>View Product</h1>

          <div class="div_deg">

            <table class="table_deg">
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th></th>
                    <th></th>
                </tr>

                @foreach($data as $data)
                <tr>
                  <td>{{$data->title}}</td>
                  <td>{!!Str::limit($data->description, 40)!!}</td>
                  <td>{{$data->category}}</td>
                  <td>{{$data->price}}</td>
                  <td>{{$data->quantity}}</td>
                  <td>
                      <img class="product-img" src="images/{{$data->image}}" alt="">
                  </td>
                  <td>
                    <a class="btn btn-success" href="">Update</a>
                  </td>
                  <td>
                      <a class="btn btn-danger" href="{{url('delete_product', $data->id)}}">Delete</a>
                  </td>
                </tr>
                @endforeach
            </table>

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
