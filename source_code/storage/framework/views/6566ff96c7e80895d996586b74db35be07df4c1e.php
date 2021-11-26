<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Checkout example · Bootstrap v5.1</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">



  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

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


  <!-- Custom styles for this template -->
</head>
<body class="bg-light">

<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Payment</h2>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill"><?php echo e($payment->count()); ?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food_orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0"><?php echo e($food_orders->FNAME); ?> x <?php echo e($food_orders->QUANTITY); ?></h6>
                <small class="text-muted"><?php echo e($food_orders->DESCRIPT); ?></small>
              </div>
              <span class="text-muted">$<?php echo e($food_orders->PRICE * $food_orders->QUANTITY); ?></span>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div id="TIPS">
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Tips</h6>
              </div>
              <span class="text-success">
                $<?php echo e($food_orders->TIPS); ?>

              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$<?php echo e($food_orders->TOTAL); ?></strong>
            </li>
          </div>
        </ul>

        <form class="card p-2">

          <div class="input-group">
            <input name="tips" type="text" class="form-control" placeholder="Tips">
            <input type="hidden" name="id" value="<?php echo e($food_orders->ORDER_ID); ?>">
            <button type="submit" class="btn btn-secondary" id="redeem" onsubmit="return false;">Redeem</button>
          </div>
        </form>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate action="<?php echo e(route('updateStatus',$food_orders->ORDER_ID)); ?>" method="POST">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="06 Quang Trung" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-md-5">
              <label for="province" class="form-label">Province</label>
              <select class="form-select" id="province" required>
                <option value="">Choose...</option>
                <option>Binh Dinh</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="district" class="form-label">District</label>
              <select class="form-select" id="district" required>
                <option value="">Choose...</option>
                <option>An Nhon</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">
          <?php echo csrf_field(); ?>
          <button type="submit" class="w-100 btn-lg btn-primary">Pay</button>
        </form>
        <form action="<?php echo e(route('deleteOrder', $food_orders->ORDER_ID)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <input type="hidden" value="<?php echo e($food_orders->ORDER_ID); ?>">
          <button type="submit" class=" w-100 btn-lg btn-primary" style="margin-top: 10px">Cancel Payment</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


<script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
<script>
  $('#redeem').click(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('setTips')); ?>",
            method: "GET",
            data: {
                tips: document.getElementsByTagName("form")[0].getElementsByTagName("input")[0].value,
                id: document.getElementsByTagName("form")[0].getElementsByTagName("input")[1].value
            },
            dataType: "json",
            success: function(data) {
              if(data){
                $('#TIPS').html(getTips(data));
                document.getElementsByTagName("form")[0].getElementsByTagName("input")[0].value = "";
              }
            }
        });
    });
    function getTips(data){
      let e   = '';
      $.each(data, function(key, val){  
        e += "<li class=\"list-group-item d-flex justify-content-between bg-light\"><div class=\"text-success\"><h6 class=\"my-0\">Tips</h6\></div><span class=\"text-success\" id=\"TIPS\">"+ val.TIPS+"</span></li><li class=\"list-group-item d-flex justify-content-between\"><span>Total (USD)</span><strong>"+val.TOTAL+"</strong></li>"
      });
      return e;
    }
</script>
<script src="<?php echo e(asset('js/form-validation.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\Users\loc_m\Documents\GitHub\CNPM-Restaurant\source_code\resources\views/payment.blade.php ENDPATH**/ ?>