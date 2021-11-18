

/* global bootstrap: false */
// (function () {
//   'use strict'
//   var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
//   tooltipTriggerList.forEach(function (tooltipTriggerEl) {
//     new bootstrap.Tooltip(tooltipTriggerEl)
//   })
// })()


/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function closeAllNav(){
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("mySidebar2").style.width = "0";
  document.getElementById("myComm").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

function openNav() {
    document.getElementById("mySidebar").style.width = "400px";
    document.getElementById("main").style.marginLeft = "400px";
}

  /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

const form = document.querySelector(".fixed-bar"),
toggleBtn = form.querySelector("button");

toggleBtn.onclick = ()=>{
  var element= document.body;
  element.classList.toggle("bg-toggle");
}


