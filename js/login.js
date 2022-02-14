var form_signup = document.getElementById("sign-in");
var signupbtn = document.getElementById("signinbtn");
var signinerror = document.getElementById("signin-error");

form_signup.onsubmit = (e) => {
    e.preventDefault();
}
signupbtn.onclick = () => {
   let xhr = new XMLHttpRequest();
   xhr.open("post","api/login.php",true);
   xhr.onload = () => {
       if(xhr.readyState == XMLHttpRequest.DONE){
           if(xhr.status == 200){
               let data = xhr.response;
               console.log(data === "success");
                if(data == true){
                    window.location.href = "chats.php";
                }else{
                    signinerror.textContent = data;
                    signinerror.style.display = "block";
                }
           }
       }
   }
   let fdata = new FormData(form_signup);
   
   xhr.send(fdata);
}