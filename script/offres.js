import { metiers } from "./metiers.js"

//////////////////////////
const grade= document.querySelector('#grade')
const specialite= document.querySelector('#specialite')
const date_debut= document.querySelector('#date_debut')
const date_fin= document.querySelector('#date_fin')
Object.keys(metiers).forEach(metier=>{
   const option = document.createElement("option")
   option.innerHTML=metier.replace(/_/g," ")
   grade.append(option)
})
grade.addEventListener("change",()=>{
   const options= document.querySelectorAll("#specialite option")
   options.forEach(element => {
      specialite.removeChild(element)
   });
   const dis= document.createElement("option")
   dis.innerHTML="-"
   dis.setAttribute("disabled","diasbled")
   dis.setAttribute("selected","selected")
   specialite.append(dis)
   metiers[Object.keys(metiers)[grade.selectedIndex-1]].forEach(metier=>{
      const option = document.createElement("option")
      option.innerHTML=metier
      specialite.append(option)
   })
})



