















































































































































































































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
    button.type = 'submit'
    button.innerText = 'Speichern'
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
    form.action = '/articles'
    // Set submit event listener
    form.onsubmit = (event) => {
        const formValues = event.target.elements
        if(formValues['art_price'].value <= 0){
            event.preventDefault()
            alert('Price muss mehr als 0 sein')
            console.log({name: formValues['art_name'].value, price: formValues['art_price'].value, desc: formValues['art_description'].value})
        }

    }
    document.body.appendChild(form)

}
document.body.onload = () => {
    createForm()
}
