
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

animate_navbar()

const whatsapp = document.querySelector('#whatsapp')
const hero= document.querySelector('.hero')
const nav= document.querySelector('.navbar')
hero.style.height="calc(100vh - "+nav.offsetHeight+"px)"
whatsapp.addEventListener("click",(e)=>{
   e.preventDefault()
   alert("HAMZA BOUWAB : +212-627-545-076")
})
