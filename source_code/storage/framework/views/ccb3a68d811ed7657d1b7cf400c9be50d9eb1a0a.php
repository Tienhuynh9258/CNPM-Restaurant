<?php $__env->startPush('styles'); ?>
<style>

</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title', 'Restaurant 2.0'); ?>
<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('slider'); ?>
    <?php echo $__env->make('layouts.partials.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container mt-4" style='min-height:500px'>
        <h3 style='border-bottom:2px solid #636b6f' id='books-header'>All foods</h3>
        <div class='d-flex align-items-center mt-4'>
            <span style='width:200px'><i class="fas fa-filter"></i> Filter by:</span>
            
            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Category
                </button>
                <div class="dropdown-menu mt-2" id='filter-by-cate'>
                    <a class="dropdown-item" href="javascript:void(0)">KHAI VI</a>
                    <a class="dropdown-item" href="javascript:void(0)">MON CHINH</a>
                    <a class="dropdown-item" href="javascript:void(0)">TRANG MIENG</a>
                    <a class="dropdown-item" href="javascript:void(0)">MON SUP</a>
                    <a class="dropdown-item" href="javascript:void(0)">NUOC UONG</a>
                    <a class="dropdown-item" href="javascript:void(0)">MON THIT</a>
                    <a class="dropdown-item" href="javascript:void(0)">ĐO AN NHANH</a>
                    <a class="dropdown-item" href="javascript:void(0)">AN CHAY</a>
                </div>
            </div>

            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Price
                </button>
                <div class="dropdown-menu mt-2" id='filter-by-price'>
                    <a class="dropdown-item" href="javascript:void(0)">Thap</a>
                    <a class="dropdown-item" href="javascript:void(0)">Trung binh</a>
                    <a class="dropdown-item" href="javascript:void(0)">Cao</a>
                    <a class="dropdown-item" href="javascript:void(0)">Dac biet</a>
                </div>
            </div>
            
            <div class='w-100'>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search foods" id='keyword'>
                    <div class="input-group-append">
                        <span class="input-group-text" id='search-bar' style='cursor: pointer'>
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div id='list-foods'>
            <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key%2==0): ?>
                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <div class="card shadow">
                                <div class="card-body" data-id="<?php echo e($food->ID); ?>">
                                    <img class="card-img-top" src="<?php echo e($food->IMAGE_URL); ?>" alt="Food" height='400' width='400'>
                                    <h5 class="card-title mt-3"><strong><?php echo e($food->FNAME); ?></strong></h5>
                                    <p class="card-text">Description: <?php echo e($food->INGREDIENTS); ?></p>
                                    <p class="card-text">Price: <strong><?php echo e($food->PRICE); ?></strong> VND</p>
                                    <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </div>
                <?php else: ?>
                        <div class="col-sm-6">
                            <div class="card shadow">
                            <div class="card-body" data-id="<?php echo e($food->ID); ?>">
                                    <img class="card-img-top" src="<?php echo e($food->IMAGE_URL); ?>" alt="Food" height='400' width='400'>
                                    <h5 class="card-title mt-3"><strong><?php echo e($food->FNAME); ?></strong></h5>
                                    <p class="card-text">Description: <?php echo e($food->INGREDIENTS); ?></p>
                                    <p class="card-text">Price: <strong><?php echo e($food->PRICE); ?></strong> VND</p>
                                    <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class='float-right mt-5 pagination'>
            <?php echo e($foods->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    function renderFilterResult(data){
        let e = `<h4 class='mt-4'>Found ${data.length} result.</h4>`;
        if(data.length==1){
            e += `<div class="row mt-5">
                    <div class="col-sm-6">
                        <div class="card shadow">fn
                            <div class="card-body" data-id=${data[0].ID}>
                                <img class="card-img-top" src="${data[0].IMAGE_URL}" alt="Food" style ={height:400; width:400;}>
                                <h5 class="card-title mt-3"><strong>${data[0].FNAME}</strong></h5>
                                <p class="card-text">Description: ${data[0].INGREDIENTS}</p>
                                <p class="card-text">Price: <strong>${data[0].PRICE}</strong> VND</p>
                                <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>`;
        }
        else{
            $.each(data, function(key, val){
                if(key%2==0)
                    e += `<div class="row mt-5">
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="card-body" data-id=${val.ID}>
                                       <img class="card-img-top" src="${val.IMAGE_URL}" alt="Food" style ={height:400; width:400;}>
                                       <h5 class="card-title mt-3"><strong>${val.FNAME}</strong></h5>
                                       <p class="card-text">Description: ${val.INGREDIENTS}</p>
                                       <p class="card-text">Price: <strong>${val.PRICE}</strong> VND</p>
                                       <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>`;
                else
                    e += `<div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="card-body" data-id=${val.ID}>
                                        <img class="card-img-top" src="${val.IMAGE_URL}" alt="Food" style ={height:400; width:400;}>
                                        <h5 class="card-title mt-3"><strong>${val.FNAME}</strong></h5>
                                        <p class="card-text">Description: ${val.INGREDIENTS}</p>
                                        <p class="card-text">Price: <strong>${val.PRICE}</strong> VND</p>
                                        <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            });
        }
        $('.pagination').remove();
        return e;
    }

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
                $('#list-foods').html(renderFilterResult(data));
            }
        });
    });

    $('#filter-by-price a').click(function(){
        const price = $(this).text();
        $.ajax({
            url: "<?php echo e(route('getAllByPrice')); ?>",
            method: "GET",
            data: {
                price
            },
            dataType: "json",
            success: function(data) {
                $('#list-foods').html(renderFilterResult(data));
            }
        });
    });

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
                $('#list-foods').html(renderFilterResult(data));
            }
        });
    });

    $('.shop-now').click(function(){
        $('#books-header')[0].scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
    });
    // need to watch again in 2 this below
    $(document).on('click', '.add-to-cart', function(){
        let isLogin = 0;
        <?php if(session()->has('cid')): ?>
            isLogin = 1;
        <?php endif; ?>
        if(!isLogin)
            $('#login-form').modal('show');
        else{
            toastr.success('Add success!');
            $('#lblCartCount').text(parseInt($('#lblCartCount').text()) + 1);
            let data = $(this).parent().children();
            let id = $(this).parent().attr('data-idn');
            var sub = parseInt($('#totalLabel').text());
            var len = data.eq(4).text().length;
            var bprice = parseInt(data.eq(4).text().substr(7,len-11));
            $('#totalLabel').text(sub+bprice);
            let e = `<div class='d-flex mb-4'>
                        <img src=${data.eq(0).attr('src')} style='width:200px;height:150px'>
                        <div class='w-75 ml-3 mr-3' style='overflow:hidden'>
                            <h5><strong>${data.eq(1).text()}</strong></h5>
                            <h6><strong>${data.eq(4).text()}</strong></h6>
                            <a href="javascript:void(0)" id="remove-${id}">Remove</a>
                        </div>
                        <div class='w-25 mr-3 d-flex align-items-center justify-content-center'>
                            <div class="input-group" style='width:120px'>
                                <div class="input-group-prepend" style='cursor:pointer' onclick="decTotal(this)">
                                    <span class="input-group-text">-</span>
                                </div>
                                <input type="text" class="form-control" value='1' id="totalBuy">
                                <div class="input-group-append" style='cursor:pointer' onclick="incTotal(this)">
                                    <span class="input-group-text">+</span>
                                </div>
                            </div>
                        </div>
                        <input type='hidden' value=${id} id="isbn">
                    </div>`;
            $('#cart > div > div > div.modal-body').append(e);
        }
    });
    $('#payment').click(function(e){
        e.preventDefault();
        // let isbnList = [];
        $.ajax({
            url: "<?php echo e(route('payment')); ?>",
            method: "POST",
            data: {
                isbn: $('#isbn').val(),
                total: $('#totalBuy').val(),
                cid: "<?php echo e(session()->get('cid')); ?>", 
                _token : $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function(data) {
                if(data.status)
                    toastr.success('Thank you!');
                else
                    toastr.error('Something error!');
            }
        });
    });
    $(document).on('click', "[id^='remove']", function(){
        $('.cart-header').text(`Your cart (0)`);
        $('#lblCartCount').text(0);
        $('#payment').prop('disabled', true);
        $(this).parent().parent().remove();
    });
});
function decTotal(t){
    $(t).parent().children().eq(1).val($(t).parent().children().eq(1).val() - 1);

}
function incTotal(t){
    $(t).parent().children().eq(1).val(parseInt($(t).parent().children().eq(1).val()) + 1);
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HUYNH TIEN\Ebookstore_Laravel\resources\views/index.blade.php ENDPATH**/ ?>