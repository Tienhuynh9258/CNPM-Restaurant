<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập nhật</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="row navHome">
        <div class="col-md-10 col-sm-10 col-10 listNav">
          <ul class="nav-justified">
            <li><a href="{{route('food-order.index')}}">Nhận đơn</a></li>
            <li><a class="active" href="#shop">Cập nhật</a></li>
          </ul>
        </div>

        <div class="col-md-2 col-2 cart">
            <button type="button" class="btn btn-light logOut">Đăng xuất <i class="fa fa-sign-out"></i></button>
        </div>
    </div>
    <div class="row content">
        <div class="col-md-3 col-sm-4 col-12 first">
            <div class="category">
                <h4>Danh mục sản phẩm</h4>
                <ul>
                    <li><a href="#">A</a></li>
                    <li><a href="#">B</a></li>
                    <li><a href="#">C</a></li>
                    <li><a href="#">D</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 col-12 second">
            <div class="row">
                <div class="col-6 search content-nav">
                <form>
                    <input type="text" name="search" placeholder="Tìm kiếm món ăn..." />
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
                </div>
            </div>    
            <div class="row">
                @foreach($food as $food)
                <div class="col-md-4 col-sm-6 col-lg-offset-1 col-6 products">
                    <div class="main-product">
                        <div class="img-product">
                            <img class="img-prd" src="{{asset($food->IMAGE_URL)}}" alt="Large image" style="width:100%" width="350" height="250">
                        </div>
                        <div class="content-product">
                            <h3 class="content-product-h3">{{$food->FNAME}}</h3>
                            <form action="{{route('food.update',$food->ID)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col p-3">
                                        <h5>Số lượng</h5>
                                    </div>
                                    <div class="col p-3">
                                        <div class="buttons_added">
                                            <input aria-label="quantity" class="input-qty" name="STOCK_QUANTITY" type="number" value="{{$food->STOCK_QUANTITY}}">
                                        </div>
                                    </div>
                                    <div class="col p-3">
                                        <button type="submit" class="btn btn-danger">Lưu</button>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div> 
                @endforeach  
            </div>
            <div class="center">
            <div class="pagination justify-content-end">
                <a href="#">Trang trước</a>
                <a href="#">1</a>
                <a class="active" href="#">2</a>
                <a href="#">3</a>
                <a href="#">Trang sau</a>
            </div>
        </div>    
        </div>    
    </div>
    <footer>

    </footer>
</body>
</html>