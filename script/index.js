import { animate_navbar } from "./script.js"

const whatsapp = document.querySelector('#whatsapp')
const hero= document.querySelector('.hero')
const nav= document.querySelector('.navbar')
hero.style.height="calc(100vh - "+nav.offsetHeight+"px)"
whatsapp.addEventListener("click",(e)=>{
   e.preventDefault()
   alert("HAMZA BOUWAB : +212-627-545-076")
})
 
animate_navbar()