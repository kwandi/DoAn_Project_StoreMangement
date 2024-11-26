<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">

    input[type='text']
    {
        width: 400px;
        height: 45px;
    }

    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 30px;
    }

    .table_deg{
      text-align: center;
      margin: auto;
      border: 2px solid grey;
      margin-top: 50px;
      width: 600px;
    }

    th{
      background-color: #CC6666;
      padding: 15px;
      font-size: 20px;
      font-weight: bold;
      color: white;
    }
    td{
      color: white;
      padding: 10px;
      border: 1px solid grey;
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

          <h1>Category Management</h1>

          <div class="div_deg">
          <form action="{{url('add_category')}}" method="POST">

                <div>
                    <input type="text" name="category">

                    <input type="text" name="mota">

                    <input class="btn btn-primary" type="submit" value="Add">
                </div>

          </form>
          </div>

      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>