document.addEventListener("load",()=>{
   const xhttp = new XMLHttpRequest();
      if(xhttp.status==200 && xhttp.readyState==4){
         alert(xhttp.responseText)
      }
      xhttp.open("GET", "test.php", true);
      xhttp.send();
})