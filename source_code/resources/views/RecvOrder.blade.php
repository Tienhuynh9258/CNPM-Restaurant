<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nhận đơn</title>
    <link type="text/css" rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='{{ asset('js/logo.js') }}' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}">

    <script type="text/javascript">
        var refreshDetailID;

        function openModel(orderID)
        {
            clearInterval(refreshDetailID);
            $.ajax({
                url: "{{ route('get_requests') }}",
                method:"GET",
                data: {
                    orderID: orderID
                },
                dataType: "json",
                success: function(data){
                    if(data)
                    {
                        $("#myModal").modal('show');
                        $("#modal-content").html(getDetail(data, orderID));
                    }
                }
            });
            refreshDetailID = setInterval(function() {getData(orderID)}, 1000);
        }

        
        function finished_order(orderID)
        {
            console.log(orderID);
            $.ajax({
                url: "{{ route('finished_order') }}",
                method:"GET",
                data: {
                    orderID: orderID
                },
                dataType: "json",
                success: function(data){
                    if(data)
                    {
                    }
                }
            });
        }

        function doing_order(orderID)
        {
            console.log(orderID);
            $.ajax({
                url: "{{ route('doing_order') }}",
                method:"GET",
                data: {
                    orderID: orderID
                },
                dataType: "json",
                success: function(data){
                    if(data)
                    {
                    }
                }
            });
        }

        function getData(orderID)
        {
            $.ajax({
                    url: "{{ route('get_requests') }}",
                    method:"GET",
                    data: {
                        orderID: orderID
                    },
                    dataType: "json",
                    success: function(data){
                        if(data)
                        {
                            $("#modal-content").html(getDetail(data, orderID));
                        }
                    }
                });
        }

        function closeModal()
        {
            clearInterval(refreshDetailID);
            $("#myModal").modal('hide');
        }

        function getDetail(data, orderID)
        {
            let output = "";
            output +='<div class="modal-header"><h5 class="modal-title text-center">Mã đơn:'+orderID+'</h5><button type="button" class="btn-close" onclick=closeModal()></button></div><div class="modal-body dishes">';
            $.each(data, function(key,val){
                if(orderID == val.ORDER_ID)
                {
                    output +='<div class="card"><div class="row"><div class="col-4"><div class="modalCol"><img class="mx-auto d-block" src="'+val.IMAGE_URL+'" alt="Food image"style="width:80%"><p class="dishName text-center">'+val.FNAME+'</p></div></div><div class="col-8"><p class="modalCol"><i class="material-icons">restaurant</i> <span class="boldText">Sốlượng:</span> 1<br><i class="fa fa-pencil-square-o" style="font-size:24px"></i><span class="boldText">Ghi chú:</span>'+val.DESCRIPT+'<br></p></div></div></div>';
                }
            });
            output += '</div>';
            return output;
        }
    </script>
</head>

<body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
        <div class="modal-content" id="modal-content">
            <!-- Modal footer -->
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

    <!-- Begin Nav -->
    <div class="row navHome">
        <div class="col-md-10 col-sm-10 col-6 listNav">
            <ul class="nav-justified">
                <li><a class="active">Nhận đơn</a></li>
                <li><a href="{{route('food.index')}}">Cập nhật</a></li>
                <li><a href="{{ route('chat_box', [session()->get('cid'), session()->get('cus_name'), session()->get('staff_type')]) }}">Tin nhắn </a></li>
            </ul>
        </div>

        <div class="col-md-2 col-6 cart">
            <a type="button" href="javscript::void(0)" id="logout" class="btn btn-light logOut">Đăng xuất <i class="fa fa-sign-out"></i></a>
        </div>
    </div>
    <!-- End Nav -->
    <div class="content container" >
        <div class="second" id="order-section">
            {{-- @foreach($order as $order)
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
            @endforeach --}}
        </div> <!-- second -->
    </div>

    <footer>

    </footer>
</body>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {


        $('#logout').click(function(){
            sessionStorage.clear();
            $.ajax({
                    url: "{{ route('logout') }}",
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        if(data.status==1){
                            console.log('Success');
                            window.location.href = "{{ route('home') }}";
                        }
                    }
            });
        });

    const order_section = $("#order-section")[0];

    setInterval(() => {
        $.ajax({
            url: "{{ route('get_order') }}",
            method:"GET",
            data: {},
            dataType: "json",
            success: function(data){
                if(data)
                {
                    $("#order-section").html(getOrder(data));
                }
            }
        });
    }, 2000);


    function getOrder(data) {
        foodOrder = data.foodOrder;
        order = data.order;
        let output = "";
        
        $.each(order, function(key,val){
            //console.log(val);
            if(val.STATUS == "Đang nấu" || val.STATUS =="Đã nấu" || val.STATUS=="Chưa nấu")
            {
                output += '<div class="card orderCard"><div class="cardHeader row"><div class="col-6"><h4>Mã đơn:'+val.ID+'</h4></div><div class="col-6"><button type="button" class="btn btn-danger detail" onclick=openModel('+val.ID+')>Chi tiết</button></div></div><div class="row"><div class="col-lg-4 col-12"><div class="info"><i class="material-icons">remove_red_eye</i> <span class="boldText">Tình trạng:</span><br>';
            }
            if(val.STATUS == "Đã nấu")
            {
                output += '<div class="btn-group" role="group"><input type="radio" class="btn-check" name="btnradio'+val.ID+'" id="btnradio1'+val.ID+'" autocomplete="off"><label class="btn btn-outline-primary" for="btnradio1'+val.ID+'">Chưa nấu</label><input onclick=doing_order('+val.ID+') type="radio" class="btn-check" name="btnradio'+val.ID+'" id="btnradio2'+val.ID+'" autocomplete="off"><label class="btn btn-outline-primary" for="btnradio2'+val.ID+'">Đang nấu</label><input onclick=finished_order('+val.ID+') type="radio" class="btn-check" name="btnradio'+val.ID+'" id="btnradio3'+val.ID+'" autocomplete="off" checked><label class="btn btn-outline-primary" for="btnradio3'+val.ID+'">Đã nấu</label></div>';
            }
            else if(val.STATUS == "Đang nấu")
            {
                output += '<div class="btn-group" role="group"><input type="radio" class="btn-check" name="btnradio'+val.ID+'" id="btnradio1'+val.ID+'" autocomplete="off"><label class="btn btn-outline-primary" for="btnradio1'+val.ID+'">Chưa nấu</label><input onclick=doing_order('+val.ID+') type="radio" class="btn-check" name="btnradio'+val.ID+'" id="btnradio2'+val.ID+'" autocomplete="off" checked><label class="btn btn-outline-primary" for="btnradio2'+val.ID+'">Đang nấu</label><input onclick=finished_order('+val.ID+') type="radio" class="btn-check" name="btnradio'+val.ID+'" id="btnradio3'+val.ID+'" autocomplete="off"><label class="btn btn-outline-primary" for="btnradio3'+val.ID+'">Đã nấu</label></div>';
            }
            else if(val.STATUS == "Chưa nấu")
            {
                output += '<div class="btn-group" role="group"><input type="radio" class="btn-check" name="btnradio'+val.ID+'" id="btnradio1'+val.ID+'" autocomplete="off" checked><label class="btn btn-outline-primary" for="btnradio1'+val.ID+'">Chưa nấu</label><input onclick=doing_order('+val.ID+') type="radio" class="btn-check" name="btnradio'+val.ID+'" id="btnradio2'+val.ID+'" autocomplete="off"><label class="btn btn-outline-primary" for="btnradio2'+val.ID+'">Đang nấu</label><input onclick=finished_order('+val.ID+') type="radio" class="btn-check" name="btnradio'+val.ID+'" id="btnradio3'+val.ID+'" autocomplete="off"><label class="btn btn-outline-primary" for="btnradio3'+val.ID+'">Đã nấu</label></div>';
            }
            
            if(val.STATUS == "Đang nấu" || val.STATUS == "Đã nấu" || val.STATUS=="Chưa nấu")
            {
                output += '</div></div><div class="col-lg-4 col-12"><p class="dishList">';
                $.each(foodOrder, function(key, value){
                    if(val.ID == value.ORDER_ID)
                    {
                        output += '<i class="material-icons">restaurant</i> '+value.FNAME+'<br>'
                    }
                });
            output += '</p></div><div class="col-lg-4 col-12"></div></div></div>';
            }
        });
        return output;
    }
    
});
</script>


</html>