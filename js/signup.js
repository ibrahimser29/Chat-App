var form_signup = document.getElementById("sign-up");
var signupbtn = document.getElementById("sign-up-btn");
var signuperror = document.getElementById("signup-error");
form_signup.onsubmit = (e) => {
    e.preventDefault();
}
signupbtn.onclick = () => {
   let xhr = new XMLHttpRequest();
   xhr.open("post","api/signup.php",true);
   xhr.onload = () => {
       if(xhr.readyState == XMLHttpRequest.DONE){
           if(xhr.status == 200){
               let data = xhr.response;
               if(data == true){
                window.location.href = "chats.php";
            }else{
                signuperror.textContent = data;
                signuperror.style.display = "block";
            }
           }
       }
   }
   let fdata = new FormData(form_signup);
   console.log(fdata);
   xhr.send(fdata);
}