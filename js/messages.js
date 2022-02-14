
       let recid = document.getElementById("recid").value ;
       let conv = document.getElementById("conve");
       const ReacttoMessage  = (i) =>  {
          // conv.classList.add("stop-interval");
          let xhr = new XMLHttpRequest();
          xhr.open("post","api/react.php",true);
          xhr.onload = () => {
              if(xhr.readyState == XMLHttpRequest.DONE){
                  if(xhr.status == 200){
                      let data = xhr.response;
                      
                  }
              }
          }
          let formData = new FormData();
          formData.append("msgid",i);
          xhr.send(formData);
       }
       
    window.setInterval(()=>{
     
        let xhr = new XMLHttpRequest();
        xhr.open("post","api/messages.php",true);
        xhr.onload = () => {
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(!conv.classList.contains("stop-interval")){
                       
                            conv.innerHTML = data;
                     
                    }
                }
            }
        }
        let formData = new FormData();
        formData.append("reciever",recid);
        xhr.send(formData);
    },500);
    const sendMessage = () => {
        let msg = document.getElementById("sendmessage").value;
        let xhr = new XMLHttpRequest();
        xhr.open("post","api/send-message.php",true);
        xhr.onload = () => {
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    document.getElementById("sendmessage").value = "";
                    let data = xhr.response;
                    
                }
            }
        }
        let fdata = new FormData();
        fdata.append("to",recid);
        fdata.append("msg",msg);
        xhr.send(fdata);
    }
   
 