<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        div {
            margin-top: 10px;
            display: flex;
            justify-content: center;
        }

        table {
            border: 2px solid #000;
            text-align: center;
            width: 800px;
        }

        th {
            border: 2px solid #000;
            text-align: center;
            color: #fff;
            font: 20px;
            font-weight: bold;
            background-color: black;
        }

        td {
            border: 2px solid #BE5050FF;
            height: 50px;
        }

        img {
            width: 60px;
            height: 50px;
        }
    </style>
</head>

<body>
    @include('home.header')
    <div>
        <table>
            <tr>
                <th>Tên khách hàng</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
                <th>Địa chỉ</th>
            </tr>
            @foreach ($orders as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->product->title }}</td>
                    <td>
                        <image src="images/{{ $item->product->image }}">
                            </th>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->address }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
