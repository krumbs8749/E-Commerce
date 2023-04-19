"use strict";

let navigation = [
    "Home",
    "Kategorien",
    "Verkaufen",
    ["Philosophie", "Karriere"]
]

let body = document.querySelector("body")
let nav = document.createElement("nav")
let ul = document.createElement("ul")

navigation.forEach((element) =>{

    if(typeof (element) === 'string'){
        let li = document.createElement("li")
        li.innerText = element
        ul.appendChild(li)
    }
    else {
        let ul2 = document.createElement("ul")
        element.forEach((innerlist)=>{
            let li2 = document.createElement("li")
            li2.innerText = innerlist
            ul2.appendChild(li2)
        })
        ul.appendChild(ul2)
    }
})

nav.appendChild(ul)
body.appendChild(nav)
