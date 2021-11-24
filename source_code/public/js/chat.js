const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".users .inner .chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); //prevent form from submitting
}

sendBtn.click(function(e){
    e.preventDefault();

    var message_input = $("#message_input").val();
    var userID = $("#userID").val();

    $.ajax({
        url: "{{ route('send_message') }}",
        method:"GET",
        data: {
            message_input:message_input,
            userID:userID
            
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



chatBox.onmouseenter =()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave =()=>{
    chatBox.classList.remove("active");
}


setInterval(()=>{
    let xhr = new XMLHttpRequest(); // creating XML object
    xhr.open("POST","get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    // we have to send the form data through ajax to php
    let formData = new FormData(form); //Create new formData Object
    xhr.send(formData); //sending the form data to php
}, 500);    // this function will run frequently after 500ms

function scrollToBottom(){
    chatBox.scrollTop= chatBox.scrollHeight;
}

