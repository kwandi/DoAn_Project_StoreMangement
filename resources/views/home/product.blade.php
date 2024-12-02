<style>
    .container {}

    .shop_section .heading_container {
        margin-bottom: 0;
    }

    .layout_padding {
        padding-top: 20px;
    }

    input[type="search"] {
        width: 280px;
        outline: none;
    }

    .search_Condition {
        display: flex;

    }

    .search_Condition>div {
        font-size: 14px;
        margin: 10px 20px 0 0;
    }

    h6 {
        font-size: 14px;
    }
</style>
<section class="shop_section layout_padding">
    <div class="container">
        {{-- Search --}}
        <form action="{{ url('search_product') }}" method="get">
            <input type="search" name="search">
            <input type="submit" value="Search">
            <div class="search_Condition">
                <div>
                    <h6>Danh mục:</h6>
                    <label><input type="checkbox" name="category[]" value="Áo Thun"
                            {{ in_array('Áo Thun', request('category', [])) ? 'checked' : '' }}> Áo Thun</label><br>
                    <label><input type="checkbox" name="category[]" value="Áo Sơ Mi"
                            {{ in_array('Áo Sơ Mi', request('category', [])) ? 'checked' : '' }}> Áo Sơ Mi</label><br>
                    <label><input type="checkbox" name="category[]" value="Quần Dài"
                            {{ in_array('Quần Dài', request('category', [])) ? 'checked' : '' }}> Quần Dài</label><br>
                    <label><input type="checkbox" name="category[]" value="Quần Short"
                            {{ in_array('Quần Short', request('category', [])) ? 'checked' : '' }}> Quần
                        Short</label><br>
                </div>

                <div>
                    <h6>Màu săc:</h6>
                    <label><input type="checkbox" name="color[]" value="Trắng"
                            {{ in_array('Trắng', request('color', [])) ? 'checked' : '' }}> Trắng</label><br>
                    <label><input type="checkbox" name="color[]" value="Đen"
                            {{ in_array('Đen', request('color', [])) ? 'checked' : '' }}> Đen</label><br>
                    <label><input type="checkbox" name="color[]" value="Kem"
                            {{ in_array('Kem', request('color', [])) ? 'checked' : '' }}> Kem</label><br>
                    <label><input type="checkbox" name="color[]" value="Xanh"
                            {{ in_array('Xanh', request('color', [])) ? 'checked' : '' }}> Xanh</label><br>
                    <label><input type="checkbox" name="color[]" value="Nâu"
                            {{ in_array('Nâu', request('color', [])) ? 'checked' : '' }}> Nâu</label><br>
                </div>

                <div>
                    <h6>Giá:</h6>
                    <label><input type="radio" name="price" value="under_20000"
                            {{ request('price') == 'under_20000' ? 'checked' : '' }}> Dưới 20,000</label><br>
                    <label><input type="radio" name="price" value="between_20000_30000"
                            {{ request('price') == 'between_20000_30000' ? 'checked' : '' }}> 20,000 -
                        30,000</label><br>
                    <label><input type="radio" name="price" value="above_30000"
                            {{ request('price') == 'above_30000' ? 'checked' : '' }}> Trên 30,000</label><br>
                    <label><input type="radio" name="price" value="all"
                            {{ request('price') == 'all' ? 'checked' : '' }}> Tất cả</label><br>
                </div>
            </div>


        </form>

        <div class="heading_container heading_center">
            <h2>
                Sản phẩm
            </h2>
        </div>
        <div class="row">

            @foreach ($product as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <a href="">
                            <div class="img-box">
                                <img src="images/{{ $product->image }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>{{ $product->title }}</h6>
                                <h6>Giá
                                    <span style="color: red">{{ $product->price }}</span>
                                </h6>
                                <h6>Màu sắc
                                    <span style="color: rgb(91, 78, 231)">{{ $product->color }}</span>
                                </h6>
                            </div>

                            <div>
                                <a class="btn btn-primary" href="{{ url('add_cart', $product->id) }}">Thêm vào giỏ hàng</a>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

</section>
