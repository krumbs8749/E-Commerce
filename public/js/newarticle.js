function addBreakline(node){
    const br = document.createElement('br')
    node.appendChild(br)
    return node
}
function populateForm(form){
    const formContents = ['name', 'price', 'description'];
    // add csrf token
    const csrf = document.createElement('input')
    csrf.type = 'hidden'
    csrf.name = '_token'
    csrf.value = document.getElementById('script-newarticle').dataset.token
    form.appendChild(csrf)
    formContents.forEach(str => {
        const label = document.createElement('label')
        label.htmlFor = `art_${str}`
        label.innerText = str
        const input = document.createElement('input')
        input.required = true
        input.type = str === 'price'? 'number' : 'text'
        if(str === 'price'){
            input.min = 0
        }
        input.id = `art_${str}`
        input.name = `art_${str}`
        form.appendChild(label)
        form = addBreakline(form)
        form.appendChild(input)
        form = addBreakline(form)

    })

    const button = document.createElement('button')
    button.id = 'input_submit'
    button.type = 'submit'
    button.innerText = 'Speichern'
    form = addBreakline(form)
    form.appendChild(button)

    return form
}
function createForm() {
    // Title
    const h1 = document.createElement('h1')
    h1.innerText = 'Neue Artikel Speichern'
    document.body.appendChild(h1)
    // Create Form
    let form = document.createElement('form')
    form = populateForm(form)
    form.method = 'POST'
    form.action = '...'
    // Set submit event listener
    /*form.onsubmit = (event) => {
        const formValues = event.target.elements
        if(formValues['art_price'].value <= 0){
            event.preventDefault()
            alert('Price muss mehr als 0 sein')
            console.log({name: formValues['art_name'].value, price: formValues['art_price'].value, desc: formValues['art_description'].value})
        }

    }*/
    document.body.appendChild(form)

}
document.body.onload = () => {

    createForm()
    document.getElementById('input_submit')
        .addEventListener('click', event =>{

            let art_name = document.querySelector('#art_name').value
            let art_price = document.querySelector('#art_price').value
            let art_description = document.querySelector('#art_description').value

            event.preventDefault()

            let formData = new FormData()
            formData.append("art_name", art_name)
            formData.append("art_price", art_price)
            formData.append("art_description", art_description)

            let xhr = new XMLHttpRequest()
            xhr.open('POST', '/articles')
            xhr.setRequestHeader("X-Requested-With", "xmlhttprequest");
            xhr.setRequestHeader('X-CSRF-Token', document.getElementById('script-newarticle').dataset.token)

            let message = document.createElement("p")
            xhr.onreadystatechange = function () {
                if(xhr.readyState === 4){
                    if(xhr.status === 200){
                        message.innerText = xhr.responseText
                    }else{
                        message.innerText = "Server Fehler"
                    }
                    document.body.appendChild(message)
                }
            }

            xhr.send(formData)
            return false
        })
}


