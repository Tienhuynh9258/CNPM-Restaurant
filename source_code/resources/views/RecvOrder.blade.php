﻿<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhận đơn</title>
    <link type="text/css" rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <!-- Begin Nav -->
    <div class="row navHome">
        <div class="col-md-10 col-sm-10 col-6 listNav">
            <ul class="nav-justified">
                <li><a class="active">Nhận đơn</a></li>
                <li><a href="{{route('food.index')}}">Cập nhật</a></li>
                <li><a href="#">Tin nhắn </a></li>
            </ul>
        </div>

        <div class="col-md-2 col-6 cart">
            <button type="button" class="btn btn-light logOut">Đăng xuất <i class="fa fa-sign-out"></i></button>
        </div>
    </div>
    <!-- End Nav -->
    <div class="content container">

        <div class="second">
            @foreach($order as $order)

            <div class="card orderCard">

                <div class="cardHeader row">
                    <div class="col-6">
                        <h4>Mã đơn: {{$order->ID}}</h4>
                    </div>

                    <div class="col-6">
                        <button type="button" class="btn btn-danger detail" data-bs-toggle="modal"
                            data-bs-target="#myModal{{$order->ID}}">Chi tiết</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="info">
                            <i class="material-icons">remove_red_eye</i> <span class="boldText">Tình trạng:</span><br>

                            <form>
                                <input type="radio" class="new" name="status" value="new">
                                <label for="new">Chưa nấu</label><br>
                                <input type="radio" class="partFinished" name="status" value="partFinished">
                                <label for="partFinished">Đang nấu</label><br>
                                <input type="radio" class="finished" name="status" value="finished" checked>
                                <label for="finished">Đã nấu</label>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <p class="dishList">
                            @foreach($foodOrder as $food)
                            @if($order->ID == $food->ORDER_ID)
                            <i class="material-icons">restaurant</i> {{$food->FNAME}}<br>
                            @endif
                            @endforeach
                        </p>
                    </div>

                    <div class="col-lg-4 col-12">

                    </div>

                </div>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="myModal{{$order->ID}}">
                <div class="modal-dialog modal-dialog-scrollable modal-md">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title text-center">Mã đơn: {{$order->ID}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body dishes">
                            @foreach($foodOrder as $food)
                            @if($order->ID == $food->ORDER_ID)
                            <div class="card">

                                <div class="row">

                                    <div class="col-4">
                                        <div class="modalCol">
                                            <img class="mx-auto d-block" src="{{asset($food->IMAGE_URL)}}" alt="Food image"
                                                style="width:80%">
                                            <p class="dishName text-center">{{$food->FNAME}}</p>
                                        </div>
                                    </div>

                                    <div class="col-8">
                                        <p class="modalCol">
                                            <i class="material-icons">restaurant</i> <span class="boldText">Số
                                                lượng:</span> 1<br>
                                            <i class="fa fa-pencil-square-o" style="font-size:24px"></i>
                                            <span class="boldText">Ghi chú:</span> {{$food->DESCRIPT}}<br>
                                        </p>
                                    </div>

                                </div>

                            </div>
                            @endif
                            @endforeach

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">

                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div> <!-- second -->
    </div>

    <footer>

    </footer>
</body>

</html>