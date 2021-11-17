
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Info page-->
        <meta charset="UTF-8">
        <meta name="description" content="Manager">
        <meta name="author" content="Phạm Minh Hiếu">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> </title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- link css file -->
        <style>
                *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }
    /*---------------------nav------------------*/
    pre{
        font-family: sans-serif;
        font-size: medium;
    }
    .contain{
        margin: 0 auto;
        overflow: hidden;
    }
    .nav{
        display: flex;
        background-color: #534d64;
        text-align: center;
        color: white;
        height: 60px;
        font-size: medium;
        max-width: 100%;
        margin: 0 auto;
    }
    .nav .func{
        flex: 65%;
        display: flex;
    }
    .nav .func div{
        flex: 20%;
        max-width: 120px;
        height: 100%;
        padding: 15px 0;
        cursor: pointer;
    }
    .nav .signout{
        flex: 35%;
        text-align: right;
        padding-right: 10px;
        margin: auto 0;
        cursor: pointer;
    }
    .nav .func div:hover{
        background-color: #a494d3;
        border-bottom: 3px solid #373244;
    }
    .nav .signout:hover{
        font-size: large;
    }
    /*---------------------main-------------------*/
    .main{
        margin-top: 2px;
        min-height: 200px;
        border: 1px solid #373244;
        max-width: 100%;
    }
    .main .title{
        text-align: center;
        height: 50px;
    }
    .main > div{
        max-width: 100%;
    }
    /*---------------------main revenue----------------------------------*/
    .row.column{
        flex-flow: column wrap;
    }
    h2.backgr{
        background-color: #352952;
        text-align: center;
        color: white;
    }
    .padnone{
        padding: 0 !important;
    }
    .click{
        cursor: pointer;
        background-color: #946feb !important;
        border-color: #946feb !important;
        border-radius: 5px;
        color: black !important; 
    }
    .click.pad{
        padding: 8px 20px;
    }
    .click:hover{
        background-color: #352952 !important;
        color: black !important;
    }
    .max-width{
        max-width: 400px !important;
        margin: 0 auto;
    }
    .width-100{
        max-width: 100% !important;
    }
    .mg-l{
        margin-left: 0 !important;
    }
    .mg-r{
        margin-right: 0 !important;
    }
    input{
        width: 100%;
        max-width: 100%;
    }
    #chartLine{
        overflow: auto;
        max-width: 100%;
        margin: 20px;
    }
    #chartLine::-webkit-scrollbar{
        width: 0px;
        height: 4px;
        margin-top: 10px;
    }
    #chartLine::-webkit-scrollbar-track{
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
    }
    #chartLine::-webkit-scrollbar-thumb{
        background: #946feb;
        border-radius: 10px;
    }
    #chartLine::-webkit-scrollbar-thumb:hover{
        background: #352952;
        color: white;
    }
    .container-fluid{
        min-height: 80vh;
        justify-content: space-between;
    }
    #table{
        margin: 20px;
    }
    #next{
        margin: 10px;
    }
    #next *{
        padding: 5px 10px;
        cursor: pointer;
    }
    #next .item:hover{
        background-color: #946feb;
    }
    #next .next:hover,
    #next .prev:hover{
        color: #352952;
    }
    /*---------------------main end revenue----------------------------------*/

    /*---------------------main Menu----------------------------------*/
    .main .menu{
        display: none;
    }
    /*---------------------main Menu add button----------------------------------*/
    .main .behavior .add-food{
        margin: 10px;
        max-width: 130px;
        padding: 7px;
        border-radius: 5px;
        color: rgba(255, 255, 255, 0.719);
        box-shadow: 1px 1px 5px #352952;
        background-color: #352952;
        cursor: pointer;
    }
    /*---------------------main Menu form input----------------------------------*/
    .main .behavior > .input{
        border: 1px dotted #352952;
        margin: 10px;
        max-width: 500px;
        display: none;
    }
    .main .behavior > .input .img{
        margin: 7px 0;
        min-height: 40px;
        width: 100%;
        cursor: pointer;
    }
    .main .behavior > .input .img *{
        cursor: pointer;
    }
    .main .behavior > .input .info{
        margin-top: 5px;
        border-bottom: 2px solid #352952;
    }
    .main .behavior > .input .info div{
        display: flex;
        min-height: 22px;
        margin: 3px;
    }
    .main .behavior > .input .info div .label{
        width: 25%;
        max-width: 130px;
    }
    .main .behavior > .input .info div .value{
        overflow: hidden;
        width: 75%;
        border: 1px solid rgba(75, 54, 54, 0.322);
    }
    .main .behavior > .input .info div .value *{
        max-width: 100%;
        min-width: 100%;
        font-size: small;
    }
    .main .behavior > .input .info div .value textarea{
        min-width: 100%;
        max-width: 300px;
        min-height: 100px;
        max-height: 300px;
    }
    .main .behavior > .input .bot{
        display: flex;
    }
    .main .behavior > .input .bot > div{
        text-align: center;
        height: 40px;
        overflow: hidden;
        width: 150px;
        padding: 10px;
        margin: 10px;
        border-radius: 5px;
        color: rgba(255, 255, 255, 0.719);
        box-shadow: 1px 1px 5px #352952;
        font-size: medium;
        background-color: #946feb;
        cursor: pointer;
    }
    .main .behavior > .input .bot > div > input:nth-child(1){
        border: none;
        background-color: #946feb;
        color: white;
    }
    /*---------------------main Menu list----------------------------------*/
    img{
        height: 240px !important;
        width: 100% !important;
        object-fit: contain, scale-down;
    }
    .main .list{
        min-height: 350px;
        max-height: 1300px;
        margin: 5px 30px;
        overflow: auto;
        flex-wrap: wrap;
        display: grid;
        grid-template-columns: repeat(auto-fill,minmax(325px, 1fr));
    }
    .scroll-bar::-webkit-scrollbar{
        width: 10px;
    }
    .scroll-bar::-webkit-scrollbar-track{
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
    }
    .scroll-bar::-webkit-scrollbar-thumb{
        background: #352952;
        border-radius: 10px;
    }
    .scroll-bar::-webkit-scrollbar-thumb:hover {
        background: #73619e;
    }
    .main .list > .node{
        margin: 10px auto;
        border: 2px solid #352952;
        box-shadow: 1px 1px 5px #352952;
        width: 325px;
        max-width: 325px;
    }
    .main .list .node .img{
        margin: 0 2px;
        min-height: 200px;
        border-radius: 5px;
        background-color: #352952;
    }
    .main .list .node .img *{
        cursor: pointer;
    }
    .main .list .node .info{
        margin-top: 5px;
        border-bottom: 2px solid #352952;
    }
    .main .list .node .info div{
        display: flex;
        min-height: 22px;
        margin: 3px;
    }
    .main .list .node .info div .label{
        flex: 25%;
        font-size: medium;
        text-align: left;
    }
    .main .list .node .info div .value{
        flex: 75%;
        border: 1px solid rgba(75, 54, 54, 0.322);
    }
    .main .list .node .info div .value input{
        min-width: 100%;
    }
    .main .list .node .info div .value textarea{
        min-width: 100%;
        max-width: 221px;
        min-height: 100px;  
        max-height: 225px;
    }
    .main .list .node .info .desc{
        min-height: 100px;
        max-height: 300px;
    }
    .main .list .node .control{
        display: flex;
        margin: 5px;
        min-height: 40px;
    }
    .main .list .node .control > div{
        flex: 30%;
        max-width: 40%;
        text-align: center;
        padding-top: 10px;
        margin-left: 10px;
        border-radius: 5px;
        color: rgba(255, 255, 255, 0.719);
        box-shadow: 1px 1px 5px #352952;
        font-size: medium;
        background-color: #946feb;
        cursor: pointer;
    }
    /*---------------------main end Menu----------------------------------*/
    /*---------------------main Employee----------------------------------*/
    .main .employee{
        display: none;
    }
    .main .behavior .add-employee{
        max-width: 150px;
        margin: 10px;
        padding: 7px;
        border-radius: 5px;
        color: rgba(255, 255, 255, 0.719);
        box-shadow: 1px 1px 5px #352952;
        background-color: #352952;
        cursor: pointer;
    }
    /*---------------------main Menu list----------------------------------*/
    .main .employee .list .node .info div .label{
        flex: 30%;
    }
    .main .employee .list .node .info div .value{
        flex: 70%;
    }
    .main .employee .list .node .info div .value select{
        width: 100%;
    }
    /*---------------------main end Employee---------------------------------*/
   
    /*-----------------------------------------------------------------------*/
    @media  screen and (max-width: 420px) {
        .main .list{
            margin: 5px 0px !important;
        }
        #scroll-bar::-webkit-scrollbar{
            width: 5px !important;
        }
    }
    @media  screen and (min-width: 400px) {
        .signout:hover{
            font-size: larger;
        }
    }
        </style>
        <!-- link icon -->
        <script src="https://kit.fontawesome.com/320d0ac08e.js" crossorigin="anonymous"></script>
        <!-- Boostrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Chart google -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <div class="contain">
            <!-- navagation -->
            <div class="nav">
                <div class="func">
                    <div>Doanh thu</div>
                    <div>Menu</div>
                    <div>Nhân sự</div>
                </div>
                <div class="signout">Thoát <i class="fas fa-sign-out-alt" aria-hidden="true"></i></div>
            </div>
            <!-- navagation -->
<!-- main View -->
            <div class="main">
            <div class="container-fluid mb-3 padnone width-100">
                    <div class="row mt-3 width-100 mg-l mg-r">
                        <div class="col col-xl-3 col-xxl-3 p-3 max-width">
                            <div class="row column">
                                <form class="col max-width mb-3 shadow backgr padnone" action="" method="POST" onsubmit="return false">
                                    <h2 class="backgr">Thống kê</h2>
                                    <div class="row column max-width mt-3 p-2">
                                        <div class="col mb-2">
                                            <div class="row">
                                                <div class="col-4">Bắt đầu:</div>
                                                <div class="col-8"><input type="date" name="time_start"></div>
                                            </div>
                                        </div>
                                        <div class="col mb-2">
                                            <div class="row">
                                                <div class="col-4">Kết thúc:</div>
                                                <div class="col-8"><input type="date" name="time_end"></div>
                                            </div>
                                        </div>
                                        <button name="btnSearch" class="btn btn-secondary col-4 mt-1 mb-2 click" ><i class="fas fa-search"></i> Tìm kiếm</button>
                                    </div>
                                </form>
                                <div id="demo" hidden></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xl-9 col-xxl-9 p-1 width-100">
                            <div class="row width-100 mg-l mg-r">
                                <div class="col-12 chart shadow p-3">
                                    <div class="d-flex justify-content-between">
                                        <h2>Đồ thị doanh số <span></span></h2>
                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">Hiển thị</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Tuần</a></li>
                                            <li><a class="dropdown-item" href="#">Tháng</a></li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div id="chartLine"></div>
                                </div>
                                
                                <div class="col-12 mt-3 shadow p-3">
                                    <div class="d-flex justify-content-between">
                                        <h2>Doanh số cửa hàng <span></span></h2>
                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">Hiển thị</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Tuần</a></li>
                                            <li><a class="dropdown-item" href="#">Tháng</a></li>
                                        </ul>
                                    </div>  
                                    <div id="table">
                                    </div>
                                    <div id="next" class="d-flex justify-content-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- menu -->
                <div class="menu">
                    <div class="behavior">
                        <div class="add-food" id="add-food"><i class="fas fa-plus-circle"></i> Thêm món</div>
                        <div class="input" id="input-food">
                            <form  method="POST" enctype="multipart/form-data" action="<?php echo e(route('adminn')); ?>" >
                                <?php echo csrf_field(); ?>
                                <div class="title"><h4>Thông tin món ăn</h4></div>
                                <div class="info">
                                    <div class="name">
                                        <div class="label">Tên:</div>
                                        <div class="value"><input type="text" name="name_food" maxlength="100"></div>
                                    </div>
                                    <div class="type">
                                        <div class="label">Phân loại:</div>
                                        <div class="value">
                                            <input type="text" list="datatype" name="category_food">
                                            <datalist id="datatype">
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="label">Giá:</div>
                                        <div class="value"><input type="number" name="price_food"></div>
                                    </div>
                                    <div class="price">
                                        <div class="label">Số lượng:</div>
                                        <div class="value"><input type="number" name="number_food" ></div>
                                    </div>
                                    <div class="desc">
                                        <div class="label">Mô tả:</div>
                                        <div class="value"><textarea placeholder="Nguyên liệu...." name="decs_food"></textarea></div>
                                    </div>
                                    <input type="number" name="id_food" hidden>
                                </div>
                                <div class="bot">
                                    <div class="img"><label for="upfile_food">Chọn ảnh <i class="fas fa-upload"></i></label><input type="file" name="file_upload_food" id="upfile_food"  accept=".jpg, .jpeg, .png" style="height: 0;visibility:hidden;"></div>
                                    <div class="done" id="upload_food"><input type="submit" value="Xong" name="upfile_food"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr />
                    <div class="title"><h4>Danh sách món ăn</h4></div>
                    <div class="list scroll-bar">
                    </div>
                </div>
<!-- menu -->
                <!-- employee -->
                <div class="employee">
                    <div class="behavior">
                        <div class="add-employee" id="add-employee"><i class="fas fa-plus-circle"></i> Thêm nhân viên</div>
                        <div class="input" id="input-employee">
                            <form enctype="multipart/form-data" method="POST" action="<?php echo e(route('upload_file_Employee')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="title"><h4>Thông tin nhân viên</h4></div>
                                <div class="info">
                                    <div class="name">
                                        <div class="label">Họ và Tên:</div>
                                        <div class="value"><input type="text" name="name_employ"></div>
                                    </div>
                                    <div class="birthday">
                                        <div class="label">Năm sinh:</div>
                                        <div class="value"><input type="date" name="birthday_employ"></div>
                                    </div>
                                    <div class="CMND">
                                        <div class="label">CMND/CCCD:</div>
                                        <div class="value"><input type="text" name="CMND_employ"></div>
                                    </div>
                                    <div class="phone">
                                        <div class="label">Số điện thoại:</div>
                                        <div class="value"><input type="text" name="phone_employ"></div>
                                    </div>
                                    <div class="type">
                                        <div class="label">Chức vụ:</div>
                                        <div class="value">
                                            <select name="position">
                                                <option>Nhân viên</option>
                                                <option>Bộ phận bếp</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="bot">
                                    <div class="img"><label for="upfile_employ">Chọn ảnh <i class="fas fa-upload"></i></label><input type="file" name="file_upload_employ" id="upfile_employ"  accept=".jpg, .jpeg, .png" style="height: 0;visibility:hidden;"></div>
                                    <div class="done" id="upload_employ"><input type="submit" value="Xong" name="upfile_employ"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr />
                    <div class="title"><h4>Danh sách nhân viên</h4></div>
                    <div class="list scroll-bar">
                    </div>
                </div>
                <!-- employee -->
            </div>
<!-- main View -->

        </div>
        <script>

            //-------------------NAV------------------------------
function set_background(element){
  element.style.backgroundColor = "rgb(164, 148, 211)";
}
function mouseOver(element, ButtonActive){
  if(element != ButtonActive){
    element.style.backgroundColor = "rgb(164, 148, 211)";
  }
}
function mouseOut(element, ButtonActive){
  if(element != ButtonActive){
    element.style.backgroundColor = "rgb(83, 77, 100)";
  }
}
function click_Button(element, ButtonActive){
  if(element != ButtonActive)
  {
    ButtonActive.style.backgroundColor = "rgb(83, 77, 100)";
    ButtonActive.value.style.display = "none";
    element.value.style.display = "block";
    set_background(element);
    return element;
  }
  return ButtonActive;
}
var funcButtons = document.getElementsByClassName("func")[0];
var Button = funcButtons.querySelectorAll("div");
var main = document.getElementsByClassName("main")[0];
var main_content = main.children;
for(var i = 0, len = Button.length; i < len; i++){
  Button[i].value = main_content[i];
}
set_background(Button[0]);
var ButtonActive = Button[0];
Button.forEach(element => element.addEventListener("mouseout", function(){mouseOut(element, ButtonActive);}));
Button.forEach(element => element.addEventListener("mouseover", function(){mouseOver(element, ButtonActive);}));
Button.forEach(element => element.addEventListener("click", function(){ButtonActive = click_Button(element, ButtonActive);}));
//-------------------FORM------------------------------
function click_add(inputname){
    var input = document.getElementById(inputname);
    if(input.style.display == "none"){
        input.style.display = "block";
        input.getElementsByTagName("form")[0].reset();
    }
    else
        input.style.display = "none";
    display_food_node();
}
document.getElementById("input-food").style.display = "none";
document.getElementById("add-food").onclick =  function(){click_add("input-food");};

document.getElementById("input-employee").style.display = "none";
document.getElementById("add-employee").onclick =  function(){click_add("input-employee");};
//-----------------------------------------------------------------------------------------------------------//

function option(element){
  let str = "";
  element.forEach(element => {str += "<option value=\"" + element + "\">"; });
  return str;
}
function get_Category(data){
    let e   = '';
    $.each(data, function(key, val){
        e += "<div class=\"type\" hidden><p hidden>" + val.type + "</p></div>";
    });
    return e;
}
function getlistType(){
    $.ajax({
        url: "<?php echo e(route('get_Category')); ?>",//this funtion is a procedure in MySQL
        method: "GET",
        data: {
        },
        dataType: "json",
        success: function(data) {
            if(data.length)
            {
                $('#demo').html(get_Category(data));
                var demo = document.getElementById("demo");
                var suggest = demo.getElementsByClassName("type");
                var listtype = [];
                for(var i = 0; i < suggest.length; i++){
                    listtype[listtype.length] = suggest[i].children[0].innerText;
                }
                var datatype = document.getElementById("datatype");
                datatype.innerHTML = option(listtype);
                for(var i = 0, len = suggest.length; i < len; i++){
                    suggest[0].remove();
                }
            }
        }
    });
}
function remove_node_food(element){
  var parent = element.parentNode.parentNode;
  $.ajax({
        url: "<?php echo e(route('remove_Food')); ?>",//this funtion is a procedure in MySQL
        method: "GET",
        data: {
            id: parent.value
        },
        dataType: "json",
        success: function(data) {
            parent.remove();
        }
    });
}
function remove_node_employee(element){
  var parent = element.parentNode.parentNode;
  var string = parent.getElementsByClassName("value")[1].innerText;
  console.log(parent.value);
  if(string == "Bộ phận bếp")string = "<?php echo e(route('remove_Chef')); ?>";
  else string = "<?php echo e(route('remove_Clerk')); ?>";
  $.ajax({
        url: string,
        method: "GET",
        data: {
            id: parent.value
        },
        dataType: "json",
        success: function(data) {
            parent.remove();
        }
    });
}
function image_food(element){
  return "<img class=\"img-fluid\" src=\"" + element + "\">";
}
function div_value(element){
  return "<div class=\"value\">" + element + "</div>";
}
function food_node(url_img, name, price, category ,decs){
  return "<div class=\"node\">" 
          + image_food(url_img) 
          + "<div class=\"info\"><div><div class=\"label\">Tên:</div>" + div_value(name)
          + "</div><div><div class=\"label\">Giá:</div>" + div_value(price) 
          + "</div><div><div class=\"label\">Phân loại:</div>" + div_value(category) 
          + "</div><div class=\"desc\"><div class=\"label\">Mô tả:</div>" + div_value(decs) 
          + "</div></div><div class=\"control\"><div class=\"edit\" onclick=\"mode_editFood(this)\"><i class=\"far fa-edit\"></i> Chỉnh sửa</div><div class=\"remove\" onclick=\"remove_node_food(this)\"><i class=\"fas fa-trash-alt\"></i> Xóa</div></div></div>";
}
function get_food(data){
    let e   = '';
    $.each(data, function(key, val){
        e += "<div class=\"food\" hidden>"
        e += "<p hidden>" + val.url + "</p><p hidden>";
        e +=  val.name + "</p><p hidden>";
        e += val.price + "</p><p hidden>";
        e += val.category + "</p><p hidden>";
        e += val.decs + "</p><p hidden>" + val.id + "</p></div>";
    });
    return e;
}
function display_food_node(){
    $.ajax({
        url: "<?php echo e(route('get_Food')); ?>",//this funtion is a procedure in MySQL
        method: "GET",
        data: {
        },
        dataType: "json",
        success: function(data) {
            if(data.length)
            {
                $('#demo').html(get_food(data));
                var demo = document.getElementById("demo");
                var node = demo.getElementsByClassName("food");
                var list_url = [];
                var list_name = [];
                var list_price = [];
                var list_category = [];
                var list_decs = [];
                var list_id = [];
                for(var i = 0; i < node.length; i++)
                {
                    list_url[list_url.length] = node[i].children[0].innerText;
                    list_name[list_name.length] = node[i].children[1].innerText;
                    list_price[list_price.length] = Number(node[i].children[2].innerText);
                    list_category[list_category.length] = String(node[i].children[3].innerText);
                    list_decs[list_decs.length] = String(node[i].children[4].innerText);
                    list_id[list_id.length] = Number(node[i].children[5].innerText);
                }/*
                for(var i = 0, len = node.length; i < len; i++){
                    node[0].remove();
                }*/
                var str = "";
                for(var i = 0; i < list_url.length; i++){
                    str += food_node(list_url[i], list_name[i], list_price[i], list_category[i] ,list_decs[i]);
                }
                var list_display = document.getElementsByClassName("list scroll-bar")[0];
                list_display.innerHTML = str;
                for(var i = 0; i < list_display.children.length; i++){
                    list_display.children[i].value = list_id[i];

                    //list_display.children[i].getElementsByClassName("remove")[0].onclick = function(){con(list_display.children[i].getElementsByClassName("remove")[0])};
                }
                document.getElementsByTagName("form")[1].getElementsByTagName("input")[5].value = (list_id[list_id.length - 1] + 1);
                console.log(document.getElementsByTagName("form")[1].getElementsByTagName("input")[5].value);
            }
        }
    });
}
function employee_node(url_img, name, position, phone){
  return "<div class=\"node\">" 
          + image_food(url_img) 
          + "<div class=\"info\"><div><div class=\"label\">Tên:</div>" + div_value(name)
          + "</div><div><div class=\"label\">Chức vụ:</div>" + div_value(position) + "</div><div class=\"phone\"><div class=\"label\">SĐT:</div>"
          + div_value(phone) + "</div></div><div class=\"control\"><div class=\"edit\" onclick=\"mode_editEmployee(this)\"><i class=\"far fa-edit\"></i> Chỉnh sửa</div><div class=\"remove\" onclick=\"remove_node_employee(this)\"><i class=\"fas fa-trash-alt\"></i> Xóa</div></div></div>";
}
function get_employee(data, position){
    let e   = '';
    $.each(data, function(key, val){
        e += "<div class=\"employee\" hidden>"
        e += "<p hidden>" + val.img + "</p><p hidden>";
        e += val.name + "</p><p hidden>";
        e += position + "</p><p hidden>";
        e += val.phone + "</p><p hidden>";
        e += val.id + "</p></div>";
    });
    return e;
}
function get_chef_node(list_id){
    $.ajax({
        url: "<?php echo e(route('get_Chef')); ?>",//this funtion is a procedure in MySQL
        method: "GET",
        data: {
        },
        dataType: "json",
        success: function(data) {
            if(data.length)
            {
                $('#demo').html(get_employee(data, "Bộ phận bếp"));
                var demo = document.getElementById("demo");
                var node_chef = demo.getElementsByClassName("employee");
                var list_url = [];
                var list_name = [];
                var list_position = [];
                var list_phone = [];
                for(var i = 0; i < node_chef.length; i++)
                {
                    list_url[list_url.length] = node_chef[i].children[0].innerText;
                    list_name[list_name.length] = node_chef[i].children[1].innerText;
                    list_position[list_position.length] = node_chef[i].children[2].innerText;
                    list_phone[list_phone.length] = String(node_chef[i].children[3].innerText);
                    list_id[list_id.length] = Number(node_chef[i].children[4].innerText);
                }
                for(var i = 0, len = node_chef.length; i < len; i++){
                    node_chef[0].remove();
                }
                var str = "";
                for(var i = 0; i < list_url.length; i++){
                    str += employee_node(list_url[i], list_name[i], list_position[i], list_phone[i]);
                } 
                var list_display = document.getElementsByClassName("list scroll-bar")[1];
                list_display.innerHTML += str;
                console.log(list_display.children);
                for(var i = 0; i < list_display.children.length; i++){
                        list_display.children[i].value = list_id[i];
                    //list_display.children[i].getElementsByClassName("remove")[0].onclick = function(){con(list_display.children[i].getElementsByClassName("remove")[0])};
                }
            }
        }
    });
}
function get_clerk_node(list_id){
    $.ajax({
        url: "<?php echo e(route('get_Clerk')); ?>",//this funtion is a procedure in MySQL
        method: "GET",
        data: {
        },
        dataType: "json",
        success: function(data) {
            if(data.length)
            {
                $('#demo').html(get_employee(data, "Nhân viên"));
                var demo = document.getElementById("demo");
                var list_url = [];
                var list_name = [];
                var list_position = [];
                var list_phone = [];
                var node_clerk = demo.getElementsByClassName("employee");
                for(var i = 0; i < node_clerk.length; i++)
                {
                    list_url[list_url.length] = node_clerk[i].children[0].innerText;
                    list_name[list_name.length] = node_clerk[i].children[1].innerText;
                    list_position[list_position.length] = node_clerk[i].children[2].innerText;
                    list_phone[list_phone.length] = String(node_clerk[i].children[3].innerText);
                    list_id[list_id.length] = Number(node_clerk[i].children[4].innerText);
                }
               for(var i = 0, len = node_clerk.length; i < len; i++){
                    node_clerk[0].remove();
                }
                var str = "";
                for(var i = 0; i < list_url.length; i++){
                    str += employee_node(list_url[i], list_name[i], list_position[i], list_phone[i]);
                } 
                var list_display = document.getElementsByClassName("list scroll-bar")[1];
                list_display.innerHTML += str;
                for(var i = 0; i < list_display.children.length; i++){
                        list_display.children[i].value = list_id[i];
                    //list_display.children[i].getElementsByClassName("remove")[0].onclick = function(){con(list_display.children[i].getElementsByClassName("remove")[0])};
                }
            }
        }
    });
}
function display_employee_node(){
    var list_id = [];
    get_chef_node(list_id);
    get_clerk_node(list_id);
    /*for(var i = 0; i < list_display.children.length; i++){
        list_display.children[i].id = list_id[i];
        console.log("id");
        console.log(list_display.children[i].id);
                    //list_display.children[i].getElementsByClassName("remove")[0].onclick = function(){con(list_display.children[i].getElementsByClassName("remove")[0])};
    }*/
}
//---------------------------------------------------------------------------------------//

//------------------------------------------------------------------------------------------
function mode_editEmployee(element){
    var listemployee = element.parentNode.parentNode.getElementsByClassName("value");
    var edit = element.innerHTML;
    if (edit == "Xong"){
        //var new_position = listemployee[1].getElementsByTagName("select")[0].value;
        //var old_position = listemployee[1].getElementsByTagName("div")[0].innerText;
        var str = "";
        if(listemployee[1].innerText == "Bộ phận bếp") str = "<?php echo e(route('update_Chef')); ?>";
        else str = "<?php echo e(route('update_Clerk')); ?>";
        var phone = listemployee[2].getElementsByTagName("input")[0].value;
        $.ajax({
            url: str,//this funtion is a procedure in MySQL
            method: "GET",
            data: {
                phone: phone,
                id:  element.parentNode.parentNode.value
            },
            dataType: "json",
            success: function(data) {
                //element.innerHTML = "<i class=\"far fa-edit\" aria-hidden=\"true\"></i> Chỉnh sửa";
                document.getElementsByClassName("list scroll-bar")[1].innerHTML = "";
                display_employee_node();
            }
        });
    }
    else{
        element.innerHTML = "Xong";
        //listemployee[1].innerHTML = "<div style=\"display: none;\">" + listemployee[1].innerHTML + "</div><select><option selected>Nhân viên</option><option>Bộ phận bếp</option></selection>";
        listemployee[2].innerHTML = "<div style=\"display: none;\">" + listemployee[2].innerHTML + "</div><input type=\"text\" value=\"" + listemployee[2].innerText + "\">";
    }
}
function mode_editFood(element){
    var listfood = element.parentNode.parentNode.getElementsByClassName("value");
    var edit = element.innerHTML;
    if (edit == "Xong"){
        //element.innerHTML = "<i class=\"far fa-edit\" aria-hidden=\"true\"></i> Chỉnh sửa";
        var name = listfood[0].getElementsByTagName("input")[0].value;
        var pricei = listfood[1].getElementsByTagName("input")[0].value;
        var categoryi = listfood[2].getElementsByTagName("input")[0].value;
        var decsi = listfood[3].getElementsByTagName("textarea")[0].value;
        console.log(name);
        console.log(pricei);
        console.log(categoryi);
        console.log(decsi);
        console.log(element.parentNode.parentNode.value);
        $.ajax({
            url: "<?php echo e(route('update_Food')); ?>",//this funtion is a procedure in MySQL
            method: "GET",
            data: {
                fname: name,
                category: categoryi,
                price: pricei,
                decs: decsi,
                id: element.parentNode.parentNode.value
            },
            dataType: "json",
            success: function(data) {
                //element.innerHTML = "<i class=\"far fa-edit\" aria-hidden=\"true\"></i> Chỉnh sửa";
                document.getElementsByClassName("list scroll-bar")[0].innerHTML = "";
                display_food_node();
            }
        });
    }
    else{
        element.innerHTML = "Xong";
        listfood[0].innerHTML = "<input type=\"text\" value=\"" + listfood[0].innerText + "\">";
        listfood[1].innerHTML = "<input type=\"number\" value=\"" + listfood[1].innerText + "\">";
        listfood[2].innerHTML = "<input type=\"text\" value=\"" + listfood[2].innerText + "\">";
        listfood[3].innerHTML = "<textarea>" + listfood[3].innerText + "</textarea>";
    }
}


/*
{
            fname: input[0].value,
            category: input[1].value,
            price: input[2].value,
            quantity: input[3].value,
            decs: textarea.value,
            file: input[5].files[0],
            id: input[4].value
        }
*/
//------------------------------------------------------------------------------------------
var send_done = document.getElementsByClassName("done");
send_done[1].onclick = function(){add_employee()};
send_done[0].onclick = function(){add_food()};
display_food_node();  
getlistType();
display_employee_node();
function Drawline(options, str, listData, id){
  google.charts.load('current', {'packages':['corechart', 'line']});
  google.charts.setOnLoadCallback(function(){drawChart(options, str, listData, id);});
  function drawChart(options, str, datal, id) {
      var data = new google.visualization.DataTable();
      data.addColumn('string', "");
      data.addColumn('number', 'Doanh số');
      data.addColumn('number', 'Chi phí');
      data.addColumn('number', 'Lợi nhuận');

      data.addRows (datal);
      var chart = new google.charts.Line(id);
      chart.draw(data, google.charts.Line.convertOptions(options));
  }
}
function getoption(width, str){
  var options = {
      title: 'Doanh số cửa hàng theo ' + str,
      subtitle: 'Tổng cộng (VND)',
      width: width,
      height: 500,
      legend: {position: 'bottom'},
      textStyle: {
          fontName: 'Times-Roman',
          fontSize: 22,
          bold: true
      },
      vAxis: {
          format: 'decimal',
      }
  }
  return options;
}
function getData(list1, list2, list3){
  const list = [];
  //var total = 0;
  if(list1 != []){
      for (let index = 0; index < list1.length; index++) {
          const element = [];
          element.push(String(list1[index]));
          element.push(Number(list2[index]));
          element.push(Number(list3[index]));
          //total += Number(list2[index]) - Number(list3[index]);
          //element.push(total);
          element.push(Number(list2[index]) + Number(list3[index]));
          list.push(element);
      }
  }
  return list;
    }
    //------------------------------------------------------------------------------------//
function ttable(element){
  return "<table class=\"table table-striped \">" + element + "</table>";
    }
function thead(element){
  return "<thead>" + element + "</thead>";
    }
function tbody(element){
  return "<tbody>" + element + "</tbody>";
 }
function tr(element){
  return "<tr>" + element + "</tr>";
 }
function th(element){
  return "<th>" + element + "</th>";
 }
function td(element){
  return "<td>" + element + "</td>";
 }
function get_Head(lelement){
  let element = "";
  element += th(lelement[0]);
  element += th(lelement[1]);
  element += th(lelement[2]);
  element += th(lelement[3]);
  return thead(tr(element));
  }
function get_partBody(element1, element2, element3, element4){
  let element = "";
  element += td(element1);
  element += td(element2);
  element += td(element3);
  element += td(element4);
  return tr(element);
 }
function get_Body(list1, list2, list3, list4){
  let body = "";
  for (let index = 0; index < list1.length; index++) {
      body += get_partBody(list1[index], list2[index], list3[index], list4[index]);
  }
  return tbody(body);
 }
function get_innerHTML(head, body){
  let str = head + body;
  return ttable(str);
 }
 //---------------------------------------------------------------------------------//
function clickNext(n){
  if(n > 1){
      let str = "<div class=\"prev\"><i class=\"fas fa-angle-double-left\"></i></div>";
      for(var i = 1; i <= n; i++){
          str += "<div class=\"item\">" + i + "</div>";
      }
      str +=  "<div class=\"prev\"><i class=\"fas fa-angle-double-right\"></i></div>";
      return str;
  }
  return "";
 }
function call_clickNext(old_element, element, parentNode, table, listTitle, listTime, listBill, listRevenue, listFee){
  old_element.style.backgroundColor = "white";
  element.style.backgroundColor = "#946feb";
  parentNode.childNodes[0].value = element.value - 1;
  parentNode.childNodes[parentNode.childNodes.length - 1].value = element.value + 1;
  table.innerHTML = get_innerHTML(get_Head(listTitle), get_Body(Dateformat(listTime[element.value - 1]), listBill[element.value-1], Priceformat(listRevenue[element.value - 1]), Priceformat(listFee[element.value - 1])));
  return element; 
 }
function call_clickNode(old_element, element, parentNode, table, listTitle, listTime, listBill, listRevenue, listFee){
  if(element.value >= 1 && element.value < parentNode.childNodes.length - 1){
      return call_clickNext(old_element, parentNode.childNodes[element.value], parentNode, table, listTitle, listTime, listBill, listRevenue, listFee);    
  }
  return old_element;
  }
  //-------------------------------------------------------------------------------//
function getlist(listTime, listBill, listRevenue, listFee){ 
  var payment = document.getElementsByClassName("payment");
  if(payment != undefined){
      for(var i = 0; i < payment.length; i++){
          listTime[listTime.length] = payment[i].children[0].innerText;
          listBill[listBill.length] = Number(payment[i].children[1].innerText);
          listRevenue[listRevenue.length] = Number(payment[i].children[2].innerText);
          listFee[listFee.length] = Number(payment[i].children[3].innerText);
      }
      for(var i = 0, len = payment.length; i < len; i++){
          payment[0].remove();
      }
      displayall(listTime, listRevenue, listFee, listBill);
  }
 }
function getTime(element){
  var timer = element.parentNode.parentNode.getElementsByTagName("input");
  for(var i = 0; i < timer.length; i++){
      if(timer[i].value == '') {
          alert("Nhập đầy đủ dữ liệu thời gian");
          return;
      }
  }
  var day1 = new Date(timer[0].value);
  var day2 = new Date(timer[1].value);
  if(day1.getFullYear() > day2.getFullYear()){
      alert("Thời gian không hợp lệ");
      return;
  }
  else if(day1.getFullYear() == day2.getFullYear()) {
      if(day1.getMonth() > day2.getMonth()){
          alert("Thời gian không hợp lệ");
          return;
      }
      else if(day1.getMonth() == day2.getMonth() && day1.getDay() > day2.getDay()){
          alert("Thời gian không hợp lệ");
          return;
      }
  }
  search(String(timer[0].value), String(timer[1].value));
  timer[0].value = "";
  timer[1].value = "";
 }
function get_payment(data){
    let e   = '';
    $.each(data, function(key, val){
        e += '<div class=\"payment\" hidden>';
        e += '<p hidden>' + val.time + '</p>';
        e += '<p hidden>' + val.count + '</p>';
        e += '<p hidden>' + val.total + '</p>';
        e += '<p hidden>' + val.tips  + '</p></div>';
    });
    return e;
 }
function search(time1, time2) {
    $.ajax({
                url: "<?php echo e(route('getReveneu_InRange')); ?>",//this funtion is a procedure in MySQL
                method: "GET",
                data: {
                    from_time: time1,
                    next_time: time2
                },
                dataType: "json",
                success: function(data) {
                    if(data.length){
                        var listTime = [];
                        var listBill = [];
                        var listRevenue = [];
                        var listFee = [];
                        //toastr.success('Save success!');
                        $('#demo').html(get_payment(data));
                        getlist(listTime, listBill, listRevenue, listFee);
                    }
                }
            });
 }
 //-----------------------------------------------------------------------------//
function Dateformat(element){
  var list = [];
  for(var i = 0; i < element.length; i++){
      var str = element[i].split('-');
      var nodestr = str[2] + "/" + str[1] + "/" + str[0];
      list.push(nodestr);
  }
  return list;
 }
function Priceformat(element){
  var list = [];
  for(var i = 0; i < element.length; i++){
      var temp = String(element[i]);
      let nodestr = "";
      for(var j = temp.length; j > 3; j -= 3){
          nodestr = "," + temp[j-1] + temp[j-2] + temp[j-3] + nodestr;
      }
      if (temp .length % 3 == 0){
          nodestr = temp[0] + temp[1] + temp[2] + nodestr;
      }
      else if(temp.length % 3 == 2){
          nodestr = temp[0] + temp[1] + nodestr;
      }
      else nodestr = temp[0] + nodestr;
      list.push(nodestr);
  }
  return list;
 }
function getDay_inMonth(element){
  let str = "";
  let liststr = [];
  let listcount = [];
  let count = [];
  for (let index = 0; index <= element.length; index++) {
      if(index < element.length){
          if(str != element[index].split('-')[1]){
              if(str != "")
                  listcount[listcount.length] = count;
              str = element[index].split('-')[1];
              liststr[liststr.length] = Number(str);
              count = [];
          }
          count[count.length] = element[index];
      }
      else{
          listcount[listcount.length] = count;
      }
  }
  return [liststr, listcount];
 }
function classify(element){
  var listYear = [];
  var str = "";
  var listDay = [];
  for(var index = 0; index <= element.length; index++){
      if(index < element.length){
          if(str != element[index].split('-')[0]){
              if(str != "") listYear[listDay.length] = [str, getDay_inMonth(listDay)];
              str = element[index].split('-')[0];
              listDay = [];
          }
          listDay[listDay.length] = element[index];
      }
      else{
          listYear[listYear.length] = [str, getDay_inMonth(listDay)];
      }
  }
  return listYear;
 }
function Sum_money(element1, list){
  var lreturn = [];
  var listprice = [];
  var listpricetotal = [];
  var indexelement = 0;
  for (let index = 0; index < list.length; index++) {
      total = 0;
      for(var i = 0; i < list[index].length; i++){
          listprice[listprice.length] = element1[indexelement];
          total += element1[indexelement];
          indexelement += 1;
      }
      lreturn[lreturn.length] = total;
      listpricetotal[listpricetotal.length] = listprice;
      listprice = [];
  }
  return [lreturn, listpricetotal];
 }
function getBIll_inMonth(element, list){
  var listreturn = [];
  var node = [];
  var indexelement = 0;
  for (let index = 0; index < list.length; index++) {
      for (let j = 0; j < list[index].length; j++) {
          node[node.length] = element[indexelement];
          indexelement += 1;
      }
      listreturn[listreturn.length] = node;
      node = [];
  }
  return listreturn;
    }
function label_Month(element){
  let list = [];
  for (let index = 0; index < element.length; index++) {
      list[list.length] = "Tháng " + element[index];
  }
  return list;
    }
//---------------------------------------------------------------------------//
function getWeekNumber(element) {
  const d = new Date(element.split('-')[0], element.split('-')[1], element.split('-')[2]);
  d.setUTCDate(d.getUTCDate() + 4 - (d.getUTCDay()||7));

  var yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
  var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
  return weekNo;
}
function getDay_inWeek(element){
  let str = "";
  let liststr = [];
  let listcount = [];
  let count = [];
  for (let index = 0; index <= element.length; index++) {
      if(index < element.length){
          if(str != getWeekNumber(element[index])){
              if(str != "")
                  listcount[listcount.length] = count;
              str = getWeekNumber(element[index]);
              liststr[liststr.length] = Number(str);
              count = [];
          }
          count[count.length] = element[index];
      }
      else{
          listcount[listcount.length] = count;
      }
  }
  return [liststr, listcount];
}
function label_Week(element){
  let list = [];
  for (let index = 0; index < element.length; index++) {
      list[list.length] = "Tuần " + element[index];
  }
  return list;
}
//-------------------------------------------------------------------------//
function Drawline_option(label_display, chartLine, listTime, listRevenue, listFee, func){
  var width = chartLine.offsetWidth;
  if(width < 600) width = 600;
  Drawline(getoption(width, label_display.toLowerCase()), label_display, getData(func(listTime), listRevenue, listFee), chartLine);
}
function Table_option(table, list_Title, listTime, listBill, listRevenue, listFee){
  table.innerHTML = get_innerHTML(get_Head(list_Title), get_Body(Dateformat(listTime), listBill, Priceformat(listRevenue), Priceformat(listFee)));
}
function next_click_option(next_click, table, lengthnext, list_Title, listTime, listBill, listRevenue, listFee){ 
  next_click.innerHTML = clickNext(lengthnext);
  if(next_click.childNodes.length > 12){
      for (let index = 0; index < 11; index++) {
          next_click.childNodes[index].style.display = "block";
      }
      for (let index = 11; index < next_click.length - 1; index++) {
          next_click.childNodes[index].style.display = "none";
      }
      next_click.childNodes[next_click.childNodes.length - 1].style.display = "block";
  }
  var next_clicked_button = next_click.childNodes[1];
  if(next_click.childNodes.length > 1){
      next_click.childNodes[1].style.backgroundColor = "#f0dada";
      for (let index = 1; index < next_click.childNodes.length - 1; index++) {
          next_click.childNodes[index].value = index;
          next_click.childNodes[index].addEventListener("click", function(){
                                      next_clicked_button =  call_clickNext(next_clicked_button, next_click.childNodes[index],  next_click, table, list_Title, 
                                                                          listTime, listBill, listRevenue, listFee)
                                      });
      }
      next_click.childNodes[0].value = 0;
      next_click.childNodes[0].addEventListener("click", function(){ next_clicked_button = call_clickNode(next_clicked_button, next_click.childNodes[0], next_click, table,
                                                                                      list_Title, listTime, listBill, listRevenue, listFee)
                                                                                  });
      next_click.childNodes[next_click.childNodes.length - 1].value = 2;
      next_click.childNodes[next_click.childNodes.length - 1].addEventListener("click", function(){next_clicked_button = call_clickNode(next_clicked_button, next_click.childNodes[next_click.childNodes.length - 1], 
                                                                                                  next_click, table, list_Title, listTime, listBill, 
                                                                                                  listRevenue, listFee)
                                                                                              });
  }
}
//------------------------------------------------//
function displayall(listTime, listRevenue, listFee, listBill){
  if(listTime != []){
      var listTime_month = getDay_inMonth(listTime);
      var listRevenue_month = Sum_money(listRevenue, listTime_month[1]);
      var listFee_month = Sum_money(listFee, listTime_month[1]);
      var listBill_month = getBIll_inMonth(listBill, listTime_month[1]);

      var listTime_week = getDay_inWeek(listTime);
      var listRevenue_week = Sum_money(listRevenue, listTime_week[1]);
      var listFee_week = Sum_money(listFee, listTime_week[1]);
      var listBill_week = getBIll_inMonth(listBill, listTime_week[1]);
      

      const listTitle = ["Ngày", "Số hóa đơn", "Doanh số (VND)", "Tiền tips (VND)"];
      //  Default table
      var table = document.getElementById("table");
      var next_click = document.getElementById("next");
      Table_option(table, listTitle, listTime_week[1][0], listBill_week[0], listRevenue_week[1][0], listFee_week[1][0]);
      next_click_option(next_click, table, listTime_week[0].length, listTitle, listTime_week[1], listBill_week, listRevenue_week[1], listFee_week[1]);
      //  Draw chart
      var chartLine = document.getElementById('chartLine');
      Drawline_option("Tháng", chartLine, listTime_month[0], listRevenue_month[0], listFee_month[0], label_Month);

      // Display chart
      var displaychart = chartLine.parentNode.querySelectorAll('li');
      displaychart[0].childNodes[0].addEventListener("click", function(){
              Drawline_option(displaychart[0].childNodes[0].innerText, chartLine, listTime_week[0], listRevenue_week[0], listFee_week[0], label_Week);
          });
      displaychart[1].childNodes[0].addEventListener("click", function(){
              Drawline_option(displaychart[1].childNodes[0].innerText, chartLine, listTime_month[0], listRevenue_month[0], listFee_month[0], label_Month);
          });

      // Display table
      var displayTable = table.parentNode.querySelectorAll('li');
      displayTable[0].childNodes[0].addEventListener("click", function(){    
              Table_option(table, listTitle, listTime_week[1][0], listBill_week[0], listRevenue_week[1][0], listFee_week[1][0]);
              next_click_option(next_click, table, listTime_week[0].length, listTitle, listTime_week[1], listBill_week, listRevenue_week[1], listFee_week[1]);
          });
      displayTable[1].childNodes[0].addEventListener("click", function(){    
              Table_option(table, listTitle, listTime_month[1][0], listBill_month[0], listRevenue_month[1][0], listFee_month[1][0]);
              next_click_option(next_click, table, listTime_month[0].length, listTitle, listTime_month[1], listBill_month, listRevenue_month[1], listFee_month[1]);
          });
  }
}

var click_form = document.getElementsByClassName("click");
click_form[0].addEventListener("click", function(){ getTime(click_form[0]);});


        </script>
    </body>
</html><?php /**PATH D:\AI_demo\test\CNPM-Restaurant\source_code\resources\views/admin.blade.php ENDPATH**/ ?>