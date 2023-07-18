const navLinks= document.querySelectorAll('.nav-link')
const stickAnima= document.querySelector('.stick-animation')
const nav= document.querySelector('.navbar')

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