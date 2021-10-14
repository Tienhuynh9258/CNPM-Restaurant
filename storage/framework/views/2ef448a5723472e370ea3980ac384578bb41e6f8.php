<?php $__env->startPush('styles'); ?>
<style>
    .header-admin {
        display: flex;
        justify-content: center;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    ul {
        font-size:20px;
    }

    ul > li:hover {
        color: #3490dc;
    }

    ul > li > a{
        display: block;
        text-decoration: none;
    }

    .header {
        border-bottom: 1px solid #636b6f;
    }

</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title', 'Admin page'); ?>
<?php $__env->startSection('content'); ?>
    <nav class="navbar navbar-expand-lg bg-light p-0">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('home')); ?>">Logout</a>
            </li>
        </ul>
    </nav>
    <div class='container'>
        <h1 class='header-admin'>Admin Dashboard</h1>
        <ul class="list-group">
            <li class="list-group-item"><a href='#manage-foods'><i class="fas fa-cheese"></i>  Manage foods</a></li>
            <li class="list-group-item"><a href='#manage-employees'><i class="fas fa-file-import"></i>  Manage employees</a></li>
            <li class="list-group-item"><a href='#report'><i class="fas fa-chart-bar"></i>  Report</a></li>
        </ul>
        <div id='manage-foods' class='mt-5'>
            <h3 class='header'>Manage foods</h3>
            <div class='mt-3'>
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ID</span>
                        </div>
                        <input type="text" class="form-control" placeholder="ID" id='Id'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Food name" id='fname'>
                    </div>
                   
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Category</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Food category" id='category'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Food price" id='price'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Ingredients</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Describe food" id='ingredients'>
                    </div>    

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Stock_Quantity</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Food quantity" id='stock_quantity'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Image</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Link image" id='image_url'>
                    </div>

                    <button class='btn btn-primary float-right' id='save-food'>Save</button>
                    <button class='btn btn-primary float-right' style="margin: 0px 13px 0px 0px ;" id='delete-food'>Delete</button>
                </form>
            </div>
        </div>

        <div id='manage-employees' class='mt-5'>
            <h3 class='header'>Manage employees</h3>
            <div class='mt-3'>
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ID</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Employee Id" id='ID1'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Employee Name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Employee Name" id='Em1'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">User Name</span>
                        </div>
                        <input type="text" class="form-control" placeholder="User Name" id='User1'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Password" id='Pwd1'>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Phone</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Number Phone" id='Phone1'>
                    </div>
                    <button class='btn btn-primary float-right' id='save-employees'>Save</button>
                </form>
            </div>
        </div>

        <div class='clearfix'></div>
        <div id='report' class='mt-4'>
            <h3 class='header'>Reports</h3>
            <form>
                <h5>Xem doanh thu của của hàng trong một khoảng thời gian.</h5>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select time range" id='reveneu-in-range'>
                </div>
                <button class='btn btn-primary' id='reveneu'>View</button>
                <h4 id='i1'></h4>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    $('#reveneu').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('getReveneu_InRange')); ?>",//this funtion is a procedure in MySQL
            method: "GET",
            data: {
                from_time: $('#reveneu-in-range').val().split('/')[0],
                next_time: $('#reveneu-in-range').val().split('/')[1]
            },
            dataType: "json",
            success: function(data) {
                if(data.length){
                   //Code shown timeline chart
                }
                else
                    $('#i1').html("<div class='mt-2'>Empty!</div>");//i1 cho hiện ra những cái muốn nhìn thấy ở dưới nút view
            }
        });
    });

    $('#save-food').click(function(e){
        if($('#Id').val()==''||$('#fname').val()==''||$('#category').val()==''||$('#price').val()==''||$('#ingredients').val()==''||$('#image_url').val()==''||$('#stock_quantity').val()==''){
          toastr.error('Please enter all field!')
          return false;
        }
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('saveFoods')); ?>",
            method: "POST",
            data: {
                id: $('#Id').val(),
                fname: $('#fname').val(),
                category: $('#category').val(),
                price: $('#price').val(),
                ingredients: $('#ingredients').val(),
                stock_quantity: $('#stock_quantity').val(),
                image_url: $('#image_url').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.status){
                    toastr.success('Save success!');
                    $("input").val('');
                }
                else
                    toastr.error('Save fail!');
            }
        });
    });
    $('#delete-food').click(function(e){
        if($('#Id').val()==''){
          toastr.error('Please enter Id!')
          return false;
        }
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('deleteFoods')); ?>",
            method: "POST",
            data: {
                id: $('#Id').val(),
                fname: $('#fname').val(),
                category: $('#category').val(),
                price: $('#price').val(),
                ingredients: $('#ingredients').val(),
                stock_quantity: $('#stock_quantity').val(),
                image_url: $('#image_url').val()
                
            },
            dataType: "json",
            success: function(data) {
                if(data.status){
                    toastr.success('Delete success!');
                    $("input").val('');
                }
                else
                    toastr.error('Delete fail!');
            }
        });
    });
    $('#save-employees').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('saveEmployees')); ?>",
            method: "POST",
            data: {
                ID: $('#ID1').val(),
                ENAME: $('#Em1').val(),
                USERNAME: $('#User1').val(),
                PWD: $('#Pwd1').val(),
                PHONE: $('#Phone1').val()
            },
            dataType: "json",
            success: function(data) {
                if(data.status){
                    toastr.success('Save success!');
                    $("input").val('');
                }
                else
                    toastr.error('Save fail!');
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\HUYNH TIEN\Restaurant_Laravel\resources\views/admin.blade.php ENDPATH**/ ?>