<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Eleventh navbar example">
  <div class="container-fluid">
      <a class="navbar-brand"><img src="<?php echo e(asset('images/logo.jpg')); ?>" height="40" width="100"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarsExample09">  
    <ul class="navbar-nav me-auto mb-2 mb-lg-0" id='menu-list'>
        <li class="nav-item">
            <a class="nav-link active"  aria-current="page" href="<?php echo e(route('home')); ?>">Home</a>
        </li>
        <li class="nav-item" id='contact-item'>
            <a class="nav-link" href="<?php echo e(route('contact-us')); ?>">Contact</a>
        </li>
        <li class="nav-item" id='about-us-item'>
            <a class="nav-link" href="<?php echo e(route('about-us')); ?>">About us</a>
        </li>
        <?php if(session()->has('uname')): ?>
          <li class="nav-item">
            <a class="nav-link" href="javascrip:void(0)" data-toggle="modal" title="Personal information." id='customer-info' data-target="#update-customer-form">Hello, <?php echo e(session()->get('cus_name')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascrip:void(0)" id='logout'>Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item" id='login-item'>
              <a class="nav-link" href="javascrip:void(0)" data-toggle="modal" data-target="#login-form">Login</a>
          </li>
          <!-- <li class="nav-item" id='register-item'>
              <a class="nav-link" href="javascrip:void(0)" data-toggle="modal" data-target="#register-form">Register</a>
          </li> -->
        <?php endif; ?>
    </ul>
    </div>
    <div id='card-item' class='position-fixed' style='right:50px; font-size:20px'>
        <a href="javascript:void(0)" data-toggle="modal" data-target="#cart"><i class="fas fa-shopping-cart"></i><span class='badge badge-warning' id='lblCartCount'>0</span></a>
    </div>
  </div>
</nav>

<div class="modal" id="login-form">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="usr">Username:</label>
                <input type="text" class="form-control" id="usr" onkeyup="checkInput(this)">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" onkeyup="checkInput(this)">
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class='btn btn-primary' id='login'>Login</button>
      </div>

    </div>
  </div>
</div>


<div class="modal" id="cart">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title cart-header">Your cart: <span id='cart_header'>0</span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form>
        <div class="modal-body" style='min-height:400px'>
          
        </div>
  
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <h5 style='justify-content: flex-start;padding-right:30px;'>Total Cost: <span id="total">0</span></h5>
          <button type="submit" class='btn btn-primary' id='payment'>Pay</button>
        </div>
      </form>
      

    </div>
  </div>
</div>
<script src = "<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
<?php $__env->startPush('scripts'); ?>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function checkInput(data){
  if($(data).val()==''){
      $(data).addClass('is-invalid');
      $(data).removeClass('is-valid');
  }
  else{
      $(data).removeClass('is-invalid');
      $(data).addClass('is-valid');
  }
}
$(document).ready(function() {
    $('#lblCartCount').text(sessionStorage.getItem('cart')?sessionStorage.getItem('cart'):0);
    $('#login').click(function(){
        if($('#usr').val()==''||$('#pwd').val()==''){
          toastr.error('Please enter username and password!')
          return false;
        }
        $.ajax({
            url: "<?php echo e(route('login')); ?>",
            method: "POST",
            dataType: "json",
            data: {
                usr: $('#usr').val(),
                pwd: $('#pwd').val()
            },
            success: function(data) {
              if(data.status==2){
                toastr.success('Login success!');
                window.location.href="<?php echo e(route('admin', ['cid' => session()->get('cid')])); ?>"; 
              }
               
              else if(data.status==1){
                toastr.success('Login success!');
                $('#login-item').hide();
                // $('#register-item').hide();
                $('#login-form').modal('hide');
                location.reload();
              }
              else{
                toastr.error('Your credentials is invalid!');
              }
            }
        });
    });
   
    $('#logout').click(function(){
      sessionStorage.clear();
      $.ajax({
            url: "<?php echo e(route('logout')); ?>",
            method: "POST",
            dataType: "json",
            success: function(data) {
              if(data.status==1){
                toastr.success('Logout success!');
                location.reload();
              }
            }
        });
    });
    
});
</script>
<?php $__env->stopPush(); ?><?php /**PATH F:\CNPM-Restaurant\source_code\resources\views/layouts/partials/nav.blade.php ENDPATH**/ ?>