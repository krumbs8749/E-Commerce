"use strict";

function validateForm() {
    let form = document.getElementById("myForm")

    if(form["name"].value === "") {
        alert("Bitte Name eingeben!")
        return false
    }

    if(form["price"].value <= 0) {
        alert("ungültiger Preis")
        return false
    }

    return true
}

let body = document.querySelector("body")
let form = document.createElement("form")
let br1 = document.createElement("br")
let br2 = document.createElement("br")
let br3 = document.createElement("br")

form.setAttribute("method","post")
form.setAttribute("action", "/articles")
form.setAttribute("id","myForm")
form.setAttribute("onsubmit","return validateForm()")

let input_name = document.createElement("input")
input_name.setAttribute("type","text")
input_name.setAttribute("name", "name")
input_name.setAttribute("placeholder", "Name")
input_name.required = true

let input_price = document.createElement("input")
input_price.setAttribute("type","text")
input_price.setAttribute("number", "price")
input_price.setAttribute("placeholder", "Price")
input_price.required = true

let input_description = document.createElement("textarea")
input_description.setAttribute("name", "description")
input_description.setAttribute("placeholder", "Description")
input_description.required = true

let submit = document.createElement("button")
submit.innerText = "Speichern"
submit.setAttribute("type", "button")
submit.setAttribute("onclick", "document.getElementById('myForm').submit()")

form.appendChild(input_name)
form.appendChild(br1)
form.appendChild(input_price)
form.appendChild(br2)
form.appendChild(input_description)
form.appendChild(br3)
form.appendChild(submit)

body.appendChild(form)

