<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clerk-Chef Line</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/chat-box.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body class="users">


<div id="page-wrap" class="inner">
    <header style="border-bottom: 1px solid black">
    <?php if(session()->get('staff_type') == 'clerk'): ?>
        <a href="<?php echo e(route('clerk')); ?>"><i class="fas fa-arrow-left" aria-hidden="true"></i></a>    
    <?php else: ?>
        <a href="<?php echo e(route('food-order.index')); ?>"><i class="fas fa-arrow-left" aria-hidden="true"></i></a>  
    <?php endif; ?>
    <h3 class="name"><strong>Clerk-Chef Line</strong></h3>
    </header>
    
    <div class="chat-box" id="messages" style="height: 80%">

    </div>

    <section class="reply" id="reply" style="border-top: 1px solid black">
        <form class ="typing-area col-12" autocomplete="off">
            <input type="text" name="message_input" id="message_input" class="col-9 input-field" placeholder="Type something...">
            <input type="hidden" name="userID" id = "userID" value="<?php echo e(session()->get('cid')); ?>">
            <input type="hidden" name="userName" id="userName" value="<?php echo e(session()->get('cus_name')); ?>">
            <input type="hidden" name="staffType" id="staffType" value="<?php echo e(session()->get('staff_type')); ?>">
            <button type="submit" id="btn-submit" class="sub_btn" onsubmit="return false"><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>

</div>

<script type="text/javascript">
    $(document).ready(function() {
    $("#btn-submit").click(function(e){
        e.preventDefault();

        var message_input = $("#message_input").val();
        var userID = $("#userID").val();
        var userName = $("#userName").val();
        var staff_type = $("#staffType").val();

        $.ajax({
            url: "<?php echo e(route('send_message')); ?>",
            method:"GET",
            data: {
                message_input:message_input,
                userID: userID,
                userName: userName,
                staff_type: staff_type
            },
            dataType: "json",
            success: function(data){
                if(data)
                {
                    $("#messages").html(getChat(data));
                    $("#message_input").val("");
                    scrollToBottom();
                }
            }
        });
    }); 

    const chatBox = $("#messages")[0];

    chatBox.onmouseenter =()=>{
        chatBox.classList.add("active");
    }

    chatBox.onmouseleave =()=>{
        chatBox.classList.remove("active");
    }

    setInterval(() => {
        $.ajax({
            url: "<?php echo e(route('get_message')); ?>",
            method:"GET",
            data: {},
            dataType: "json",
            success: function(data){
                if(data)
                {
                    $("#messages").html(getChat(data));
                    if(!chatBox.classList.contains("active")){
                        scrollToBottom();
                    }
                }
            }
        });
    }, 500);

    function scrollToBottom(){
        chatBox.scrollTop= chatBox.scrollHeight;
    }

    function getChat(msg) {
        var userID = $("#userID").val();
        var userName = $("#userName").val();
        let output = "";
        $.each(msg, function(key, val){
            if(val.userID == userID && val.userName == userName)
            {
                output += '<ul class="message" id="message"><h6 class="text-right">'+ val.userName+'</h6><li class="first">'+val.message+'</li></ul>';
            }
            else
            {
                output += '<ul class= "message" id="message" style="padding-left: 0px"><h6>'+val.userName+'</h6> <div class="matt-line"><p>'+val.message+'</p></div></ul>';
            }
        });
        return output;
    }
});
</script>
</body>
<?php if($errors->any()): ?>
    <div class="w-4/8 m-auto text-center">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="text-red-500 list-none">
                <?php echo e($error); ?>

            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<script src='<?php echo e(asset('js/logo.js')); ?>' crossorigin='anonymous'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>


</html><?php /**PATH D:\Programs\New folder\htdocs\new\CNPM-Restaurant\source_code\resources\views/chat/index.blade.php ENDPATH**/ ?>