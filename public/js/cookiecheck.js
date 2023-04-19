"use strict";

let einverstanden
if(document.cookie)
    einverstanden = Boolean(getCookie("Zustimmung"))

let parent = document.querySelector("body")
let abfrage = document.createElement("dialog")
abfrage.innerHTML = "<p>Cookie?</p>"

let enable = document.createElement("button")
let disable = document.createElement("button")

enable.innerText = "einverstanden"
disable.innerText = "ablehnen"

abfrage.appendChild(disable)
abfrage.appendChild(enable)

parent.appendChild(abfrage)

if (einverstanden === true)
    abfrage.close()
else
    abfrage.show()

console.log(document.cookie)

enable.onclick = function (){
    einverstanden = true
    document.cookie = "Zustimmung=true;"
    abfrage.close()
}

disable.onclick= function (){
    einverstanden = false
    abfrage.close()
}

function getCookie(name){
    let find = name + "="
    let array = document.cookie.split(';')

    let result = ""
    array.forEach(val => {
        if (val.indexOf(find) === 0) result = val.substring(find.length);
    })

    return result
}



