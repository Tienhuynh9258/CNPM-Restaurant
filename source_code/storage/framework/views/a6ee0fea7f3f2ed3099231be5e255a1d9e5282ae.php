<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Cập nhật</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="row navHome">
        <div class="col-auto me-auto listNav">
          <ul class="nav-justified">
            <li><a href="<?php echo e(route('food-order.index')); ?>">Nhận đơn</a></li>
            <li><a class="active" href="#shop">Cập nhật</a></li>
            <li><a href="<?php echo e(route('chat_box', [session()->get('cid'), session()->get('cus_name'), session()->get('staff_type')])); ?>">Tin nhắn </a></li>
          </ul>
        </div>

        <div class="col-auto cart">
            <a type="button" href="javscript::void(0)" id="logout" class="btn btn-light logOut">Đăng xuất <i class="fa fa-sign-out"></i></a>
        </div>
    </div>
    <div class="row content" style="margin-top: 10px">
        <div class="col-md-3 col-sm-4 col-12 first">
            <div class='w-100' style="margin-left: 5px;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search foods" id='keyword' autocomplete="off">
                    <div class="input-group-append">
                        <span class="input-group-text" id='search-bar' style='cursor: pointer; height: 100%;'>
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="dropdown mr-4" style="margin-top: 10px; margin-left: 5px; margin-bottom: 10px;">
                <button type="button" class="w-100 btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownButton">
                    Category
                </button>
                <div class="dropdown-menu mt-2 w-100" id='filter-by-cate' aria-labelledby="dropdownButton">
                    <a class="dropdown-item" href="javascript:void(0)">TAT CA</a>
                    <a class="dropdown-item" href="javascript:void(0)">KHAI VI</a>
                    <a class="dropdown-item" href="javascript:void(0)">MON CHINH</a>
                    <a class="dropdown-item" href="javascript:void(0)">TRANG MIENG</a>
                    <a class="dropdown-item" href="javascript:void(0)">MON SUP</a>
                    <a class="dropdown-item" href="javascript:void(0)">NUOC UONG</a>
                    <a class="dropdown-item" href="javascript:void(0)">MON THIT</a>
                    <a class="dropdown-item" href="javascript:void(0)">DO AN NHANH</a>
                    <a class="dropdown-item" href="javascript:void(0)">AN CHAY</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 col-12 second">
            <div class="row" id='list-foods'>
                <?php $__currentLoopData = $food; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-sm-6 col-lg-offset-1 col-6 products">
                    <div class="main-product">
                        <div class="img-product">
                            <img class="img-prd" src="<?php echo e(asset($food->IMAGE_URL)); ?>" alt="Large image" style="width:100%" width="350" height="250">
                        </div>
                        <div class="content-product">
                            <h3 class="content-product-h3"><strong><?php echo e($food->FNAME); ?></strong></h3>
                            <form action="<?php echo e(route('food.update',$food->ID)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col p-3" >
                                        <h5>Số lượng</h5>
                                    </div>
                                    <div class="col p-3">
                                        <div class="buttons_added">
                                            <input aria-label="quantity" class="input-qty" name="STOCK_QUANTITY" type="number" value="<?php echo e($food->STOCK_QUANTITY); ?>" style="background-color: #dfe4ea">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </div>
            
        </div>    
    </div>
    <footer>

    </footer>
</body>

<script>
    $(document).ready(function(){
        function renderFilterResult(data){
            let output = '';
            $.each(data, function(key, val){
                var url = '<?php echo e(route("food.update", ":id")); ?>';
                url = url.replace(':id', val.ID);
                output += '<div class="col-md-4 col-sm-6 col-lg-offset-1 col-6 products"><div class="main-product"><div class="img-product"><img class="img-prd" src="'+val.IMAGE_URL+'" alt="Large image" style="width:100%" width="350" height="250"></div><div class="content-product"><h3 class="content-product-h3"><strong>'+val.FNAME+'</strong></h3><form action="'+url+'" method="POST"><?php echo csrf_field(); ?><div class="row"><div class="col p-3" ><h5>Số lượng</h5></div><div class="col p-3"><div class="buttons_added"><input aria-label="quantity" class="input-qty" name="STOCK_QUANTITY" type="number" value="'+val.STOCK_QUANTITY+'" style="background-color: #dfe4ea"></div></div><div class="col p-3"><button type="submit" class="btn btn-danger">Lưu</button></div></div> </form></div></div></div>';
            });
            return output;
        }

        $('#search-bar').click(function(){
            const keyword = $('#keyword').val();;
            $.ajax({
                url: "<?php echo e(route('getAllByKey')); ?>",
                method: "GET",
                data: {
                    keyword
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#list-foods').html(renderFilterResult(data));
                }
            });
        });
        $('#filter-by-cate a').click(function(){
            const category = $(this).text();
            $.ajax({
                url: "<?php echo e(route('getAllByCategory')); ?>",
                method: "GET",
                data: {
                    category
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#list-foods').html(renderFilterResult(data));
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script type="text/javascript">

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
</script>
</html><?php /**PATH C:\Users\loc_m\Documents\GitHub\CNPM-Restaurant\source_code\resources\views/updatefood.blade.php ENDPATH**/ ?>