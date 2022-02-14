
var prof = document.getElementById("profile");
var log = document.getElementById("logout");
prof.onclick = () => {
    if(log.style.display == "block"){
        log.style.display = "none";
    }else{
        log.style.display = "block";
    }
    
}
const logout = (id) => {
    let xhr = new XMLHttpRequest();
    xhr.open("post","api/logout.php",true);
    xhr.onload = () => {
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                
                 if(data == true){
                    window.location.href = "index.php";
                 } 
            }
        }
    }
    let fdata = new FormData();
    fdata.append("id",id);
    xhr.send(fdata);
}



const addtocontact = (id , user_id) => {
    let xhr = new XMLHttpRequest();
    xhr.open("post","api/contacts.php",true);
    xhr.onload = () => {
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                
                 if(data == true){
                    window.location.href = "chats.php";
                 } else{
                     alert(data);
                     window.location.href = "chats.php";
                 }
            }
        }
    }
    let fdata = new FormData();
    fdata.append("id",id);
    fdata.append("user_id",user_id);
    xhr.send(fdata);
}
var search_user = document.getElementById("search_user");
var contacts = document.getElementById("contacts");
const search_for_user = (user_id) => {
    contacts.classList.add("active");
   let q =  search_user.value;
   if(q ==""){
    contacts.classList.remove("active");
   }
    let xhr = new XMLHttpRequest();
    xhr.open("post","api/search.php",true);
    xhr.onload = () => {
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
           

                        contacts.innerHTML = data;

            }
        }
    }
    let fdata = new FormData();
    fdata.append("query",q);
    fdata.append("user_id",user_id);
    
    xhr.send(fdata);
}
window.onload = ()  =>{
window.setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("post","api/users.php",true);
    xhr.onload = () => {
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                    if(!contacts.classList.contains("active")){
                        contacts.innerHTML = data;
                    }
                        
            }
        }
    }
    
    xhr.send();
},500);
}
