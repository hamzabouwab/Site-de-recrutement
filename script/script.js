const navLinks= document.querySelectorAll('.nav-link')
const stickAnima= document.querySelector('.stick-animation')
const email= document.querySelector('#email')
const password= document.querySelector('#password')

const current={
   width:navLinks[0].offsetWidth+"px",
   left:navLinks[0].offsetLeft+"px"
}
addEventListener("load",()=>{
   stickAnima.style.width=current.width
   stickAnima.style.left=current.left
})
navLinks.forEach(item=>{
   item.addEventListener("click",()=>{
      navLinks.forEach(link=>{
         link.classList.remove("active")
      })
      item.classList.add("active")
      current.left=item.offsetLeft+"px"
      current.width=item.offsetWidth+"px"

   })
   item.addEventListener("mouseover",()=>{
      stickAnima.style.width=item.offsetWidth+"px"
      stickAnima.style.left=item.offsetLeft+"px"
   })
   item.addEventListener("mouseleave",()=>{
      stickAnima.style.width=current.width
      stickAnima.style.left=current.left
   })
})
//Password input handler

password.addEventListener("keydown",()=>{
   document.querySelectorAll(".invalid-feedback").forEach(element => {
      element.innerHTML=""
   });
   password.classList.remove("is-invalid")
   if(password.value.length >=8){
      password.classList.add("is-valid")
   }else{
      password.classList.remove("is-valid")
   }
})


//Email input handler

const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g

email.addEventListener("keydown",()=>{
   document.querySelectorAll(".invalid-feedback").forEach(element => {
      element.innerHTML=""
   });
   email.classList.remove("is-invalid")
   if(email.value.match(regex) ){
      email.classList.add("is-valid")
   }else{
      email.classList.remove("is-valid")
   }
})
   //animate navbar icon 
   export function animate_navbar(){
      const navbarToggler= document.querySelector(".navbar-toggler")
      const navbarTogglerIcon= document.querySelectorAll(".navbar-toggler-custom-icon")
      
      navbarToggler.addEventListener("click",()=>{
         navbarTogglerIcon.forEach(icon=>{
            icon.classList.toggle("navbar-toggler-custom-icon-animate")
         })
      })
   }