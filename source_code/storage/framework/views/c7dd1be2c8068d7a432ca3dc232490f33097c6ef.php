
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Managing</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo e(asset('css/clerk.css')); ?>">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/sidebar.css')); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script type="text/javascript">

    if ($(window).width() < 960) {
        function openBar() {
        document.getElementById("mySidebar").style.width = "300px";
        document.getElementById("main").style.marginLeft = "300px";
        }
    }
    else {
        function openBar() {
        document.getElementById("mySidebar").style.width = "400px";
        document.getElementById("main").style.marginLeft = "400px";
        }
    }
    

    function closeBar() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        clearInterval(refreshDetailID);
    }

    function finish_order(orderID)
    {
        closeBar();
        $.ajax({
                url: "<?php echo e(route('finish_order')); ?>",
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

    function delete_order(orderID)
    {
        closeBar();
        $.ajax({
                url: "<?php echo e(route('delete_order')); ?>",
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


    function confirm_order(orderID)
    {
        closeBar();
        $.ajax({
                url: "<?php echo e(route('confirm_order')); ?>",
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

    var refreshDetailID;

    function openDetail(orderID){
        clearInterval(refreshDetailID);
        openBar();
        $.ajax({
                url: "<?php echo e(route('get_order_detail')); ?>",
                method:"GET",
                data: {
                    orderID: orderID
                },
                dataType: "json",
                success: function(data){
                    if(data)
                    {
                        $("#mySidebar").html(getDetail(data));
                    }
                }
            });
        refreshDetailID = setInterval(function() {getData(orderID)}, 2000);
    }

    function getData(orderID)
    {
        $.ajax({
                url: "<?php echo e(route('get_order_detail')); ?>",
                method:"GET",
                data: {
                    orderID: orderID
                },
                dataType: "json",
                success: function(data){
                    if(data)
                    {
                        $("#mySidebar").html(getDetail(data));
                    }
                }
            });
    }
    
    function getDetail(data)
    {
        var food_order = data.foodOrder;
        var order = data.order;
        let output = "";
        output += '<button type="button" class = "btn-close closebtn" onclick="closeBar()"></button>';
        output += '<div class ="row order-details bg-light"><h5 class ="text-center" style="color: black;">Chi tiết đơn hàng</h5><div class = "order"><div class="order-desc"><h6 class = "order-table">Order: '+order[0].ID+'</h6><p class = "order-date">Order Date: '+order[0].created_at+'</p><p class="confirm-date">Confirm Date: '+order[0].updated_at+'</p><p class = "order-status">Tình trạng đơn hàng: '+order[0].STATUS+'</p></div></div></div><div class ="row order-bill"><div class = "col-md-12"><div class="panel panel-default"><div class="panel-heading"><h5 class ="panel-title"><strong>Hoá đơn</strong></h5></div><div class="panel-body"><div class="table-responsive"><table class= "table table-condensed"><thread><tr><td class ="order-status"><strong>Tên món ăn</strong></td><td class = "text-center order-status"><strong>Đơn giá</strong></td><td class = "text-center order-status"><strong>Số lượng</strong></td><td class = "text-right order-status"><strong>Tổng tiền</strong></td></tr></thread><tbody>';
        
        $.each(food_order, function(key, val){
            output += '<tr><td class="order-status">'+val.FNAME+'</td><td class = "text-center order-status">'+
            val.PRICE+'</td><td class = "text-center order-status">'+val.QUANTITY+'</td><td class = "text-right order-status">'+val.PRICE*val.QUANTITY+'</td></tr>';
            if(val.DESCRIPT != "No description")
            {
                output += '<tr><td class="order-status"><strong>Desc: '+val.DESCRIPT+'</strong></td> <td></td><td></td><td></td></tr>';
            }
        });

        output += '<tr><td class= "thick-line"></td><td  class = "thick-line"></td><td class = "text-center order-status thick-line"><strong>Tips</strong></td><td class = "text-right order-status thick-line">'+order[0].TIPS+'</td></tr>';

        output += '<tr><td></td><td></td><td class = "text-center order-status"><strong>Tổng</strong></td><td class = "text-right order-status">'+order[0].TOTAL+'</td></tr></tbody></table></div></div></div></div></div>';
        
        if(order[0].STATUS =="Đã thanh toán" || order[0].STATUS =="Chưa thanh toán" || order[0].STATUS =="Chua thanh toan")
        {
            output += '<div class="col btn-group" role ="group" arial-label="Basic example"><button type="button" onclick="confirm_order('+order[0].ID+')" class = "btn btn-success btn-dec">Xác nhận</button> <button type="button" onclick="delete_order('+order[0].ID+')" class = "btn btn-danger btn-dec">Huỷ đơn</button> </div></div>';
        }
        else if(order[0].STATUS == "Đã nấu")
        {
            output += '<div class="col btn-group" role ="group" arial-label="Basic example"><button type="button" onclick="finish_order('+order[0].ID+')" class = "btn btn-success btn-dec">Checkout</button> <button type="button" onclick="closeNav()" class = "btn btn-info btn-dec">In hoá đơn</button></div></div>';
        }
        else
        {
            output += '<div class="col btn-group" role ="group" arial-label="Basic example"><button type="button" onclick="delete_order('+order[0].ID+')" class = "btn btn-danger btn-dec">Huỷ đơn</button> </div></div>';
        }
        return output;
    }



    </script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="bootstrap" viewBox="0 0 118 94">
        <title>Bootstrap</title>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
    </symbol>
    <symbol id="home" viewBox="0 0 16 16">
        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
    </symbol>
    <symbol id="chat-quote-fill" viewBox="0 0 16 16">
        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM7.194 6.766a1.688 1.688 0 0 0-.227-.272 1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 6C4.776 6 4 6.746 4 7.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 9.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4 1.686 1.686 0 0 0-.227-.273 1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 6c-.957 0-1.734.746-1.734 1.667 0 .92.777 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/>
    </symbol>
</svg>

<!-- ORDER DETAIL -->
<div class = "d-flex flex-column flex-shrink-0 sidebar" id = "mySidebar">
    
</div>


<main id = 'main'>

    <!-- Order Section Starts Here -->
    <div class = "container-fluid d-flex flex-column order-section"> 
        <!-- Alert Section -->
        <div id="alert-div">
            
        </div>

        <!-- Waiting order -->
        <h4 class ="text-center" style="color:#ff4757;">Đơn hàng chưa được xác nhận</h4>
        <div class ="container-fluid pending-order d-flex flex-row flex-wrap" id="waiting-order">

        </div>

        <!-- Serving order -->
        <h4 class ="text-center" style="color:#cd84f1;" >Đơn hàng đang phục vụ</h4>
        <div class ="container-fluid serving-order d-flex flex-row flex-wrap" id="serving-order">
            
        </div>
    </div>
    <div class="b-example-divider"></div>
    <!-- Order Section Ends Here -->


    <!-- Sidebar section starts here -->
    
    <div class="d-flex flex-column flex-shrink-0 bg-dark fixed-bar">
        <button class="d-block p-3 link-light text-decoration-none text-center bg-dark" title="Toggle Dark Mode" data-bs-toggle="tooltip" data-bs-placement="right" style="color:#ff4757">
            <i class="fas fa-adjust" width="50" height="40"></i>
        </button>
        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            <li class="nav-item">
            <a href="#" class="nav-link active py-3 border-bottom" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right" style="background-color: #ff4757;">
                <svg class="bi" width="30" height="30" role="img" aria-label="Home"><use xlink:href="#home"/></svg>
            </a>
            </li>
            <li>
            <a href="<?php echo e(route('chat_box', [session()->get('cid'), session()->get('cus_name'), session()->get('staff_type')])); ?>" class="nav-link py-3 border-bottom" title="Message" data-bs-toggle="tooltip" data-bs-placement="right" style="color:#ff4757">
            <svg class="bi" width="30" height="30" role="img" aria-label="Message"><use xlink:href="#chat-quote-fill"/></svg>
            </a>
            </li>
        </ul>
        <div class="dropdown border-top">
            <a href="#" class="d-flex align-items-center justify-content-center p-3 link-light text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false" style="color:#ff4757">
                <img src="<?php echo e(asset('images/logo.jpg')); ?>" alt="mdo" width="24" height="24" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
            <li><a class="dropdown-item" href="javascript:void(0)" id ="logout">Sign out</a></li>
            </ul>
        </div>
    </div>
    <!-- Sidebar section ends here -->
</main>


<!-- Scripts -->
<script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>" defer></script>
<script src="<?php echo e(asset('js/alert.js')); ?>"></script>
<script src="<?php echo e(asset('js/sidebar.js')); ?>"></script> 
<script src='<?php echo e(asset('js/logo.js')); ?>' crossorigin='anonymous'></script>

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
                    url: "<?php echo e(route('logout')); ?>",
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        if(data.status==1){
                            console.log('Success');
                            window.location.href = "<?php echo e(route('home')); ?>";
                        }
                    }
            });
        });

        setInterval(()=>{
            $.ajax({
                url: "<?php echo e(route('get_pending_order')); ?>",
                method:"GET",
                data: {},
                dataType: "json",
                success: function(data){
                    if(data)
                    {
                        $("#serving-order").html(getOrder(data));
                    }
                }
            });

        }, 500);    // this function will run frequently after 500ms

        setInterval(()=>{
            $.ajax({
                url: "<?php echo e(route('get_waiting_order')); ?>",
                method:"GET",
                data: {},
                dataType: "json",
                success: function(data){
                    if(data)
                    {
                        $("#waiting-order").html(getOrder(data));
                    }
                }
            });

        }, 500);    // this function will run frequently after 500ms

        function getOrder(msg) {
        let output = "";
        $.each(msg, function(key, val){
            if(val.STATUS =="Chưa thanh toán" || val.STATUS =="Chua thanh toan")
            {
                output += '<div class = "order-board"><div class="text-center"><button onclick="openDetail('+val.ID+')" class="openbtn btn btn-primary w-100" style="background-color: #747d8c; border-radius: 15px;">'+val.STATUS+'</button><h6>Order số</h6><h5>'+val.ID+'</h5></div></div>';
            }
            else if(val.STATUS == "Đã thanh toán")
            {
                output += '<div class = "order-board"><div class="text-center"><button id="btn-open-detail" class="openbtn btn btn-primary w-100" style="background-color: #7bed9f;border-radius: 15px;" onclick="openDetail('+val.ID+')">'+val.STATUS+'</button><h6>Order số</h6><h5>'+val.ID+'</h5></div></div>';
            }
            else if(val.STATUS == "Chưa nấu")
            {
                output += '<div class = "order-board"><div class="text-center"><button class="openbtn btn btn-primary w-100" style="background-color: #3742fa; border-radius: 15px;" onclick="openDetail('+val.ID+')">'+val.STATUS+'</button><h6>Order số</h6><h5>'+val.ID+'</h5></div></div>';
            }
            else if(val.STATUS == "Đang nấu")
            {
                output += '<div class = "order-board"><div class="text-center"><button class="openbtn btn btn-primary w-100" style="background-color: #ffa502; border-radius: 15px;" onclick="openDetail('+val.ID+')">'+val.STATUS+'</button><h6>Order số</h6><h5>'+val.ID+'</h5></div></div>';
            }
            else
            {
                output += '<div class = "order-board"><div class="text-center"><button class="openbtn btn btn-primary w-100" style="background-color: #7bed9f; border-radius: 15px;" onclick="openDetail('+val.ID+')">'+val.STATUS+'</button><h6>Order số</h6><h5>'+val.ID+'</h5></div></div>';
            }
        });
        return output;
    }

});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


</body>
</html><?php /**PATH D:\Programs\New folder\htdocs\new\CNPM-Restaurant\source_code\resources\views/clerk.blade.php ENDPATH**/ ?>