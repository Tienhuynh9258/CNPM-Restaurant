const serving_order=document.getElementById("serving-order"),

waiting_order=document.getElementById("waiting-order"),

order_detail=document.getElementById("mySidebar");


function openBar() {
    document.getElementById("mySidebar").style.width = "400px";
    document.getElementById("main").style.marginLeft = "400px";
}

var refreshDetailID;

function closeBar() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    clearInterval(refreshDetailID);
}

function finish_order(orderID)
{
    closeBar();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "finish-order.php?order_id=".concat(orderID),true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                order_detail.innerHTML= data;
            }
        }
    } 
    xhr.send();
}

function delete_order(orderID)
{
    closeBar();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "delete-order.php?order_id=".concat(orderID),true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                order_detail.innerHTML= data;
            }
        }
    } 
    xhr.send();
}


function confirm_order(orderID)
{
    closeBar();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "confirm-order.php?order_id=".concat(orderID),true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                order_detail.innerHTML= data;
            }
        }
    } 
    xhr.send();
}


function openDetail(orderID){
    clearInterval(refreshDetailID);
    console.log(orderID);
    openBar();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "order-detail.php?order_id=".concat(orderID),true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                order_detail.innerHTML= data;
            }
        }
    }
    // refreshDetailID = setInterval(function() {refreshDetail(orderID)}, 1000);
    xhr.send();
}

function refreshDetail(orderID)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "order-detail.php?order_id=".concat(orderID),true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                order_detail.innerHTML= data;
            }
        }
    }
    xhr.send();
}


// setInterval(()=>{
//     let xhr = new XMLHttpRequest(); // creating XML object
//     xhr.open("POST","get-serving-order.php", true);
//     xhr.onload = ()=>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 let data = xhr.response;
//                 serving_order.innerHTML = data;
//             }
//         }
//     }
//     xhr.send();
// }, 500);    // this function will run frequently after 500ms

// setInterval(()=>{
//     let xhr = new XMLHttpRequest(); // creating XML object
//     xhr.open("POST","get-waiting-order.php", true);
//     xhr.onload = ()=>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 let data = xhr.response;
//                 waiting_order.innerHTML = data;
//             }
//         }
//     }
//     xhr.send();
// }, 500);    // this function will run frequently after 500ms