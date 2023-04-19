


function createCookieConsent() {
    // Div container für cookie abrage
    const cookieContainer = document.createElement('div')
    // text to display to user
    const cookieText = document.createElement('span')
    cookieText.insertAdjacentHTML('afterbegin', 'Sind Sie mit der Verwendung von Cookies einverstanden?')
    //button for users to einverstehen
    const buttonContainer = document.createElement('div')
    const yesButton = document.createElement('button')
    yesButton.insertAdjacentHTML('afterbegin', 'Ja')
    const noButton = document.createElement('button')
    noButton.insertAdjacentHTML('afterbegin', 'Nein')

    // Set event listener
    yesButton.addEventListener('click', () => {
        cookieContainer.style.display = 'none'
        document.cookie = 'einverstanden=true;'
    })
    noButton.addEventListener('click', () => {
        cookieContainer.style.display = 'none'
    })

    // Styling
    cookieContainer.style.display = 'flex'
    cookieContainer.style.flexDirection = 'row'
    cookieContainer.style.justifyContent = 'space-between'
    cookieContainer.style.padding = '1rem'
    cookieContainer.style.width = '100%'
    cookieContainer.style.position = 'fixed'
    cookieContainer.style.bottom = '0px'
    cookieContainer.style.backgroundColor = '#333333'


    cookieText.style.color = 'white'
    cookieText.style.fontSize = '1rem'

    buttonContainer.style.display = 'flex'
    buttonContainer.style.margin = '0 2rem 0 1rem'

    yesButton.style.display = 'flex'
    yesButton.style.margin = '0 0 0 1rem'
    noButton.style.display = 'flex'
    noButton.style.margin = '0 0 0 1rem'

    // Append the components and stage to DOM
    buttonContainer.appendChild(noButton)
    buttonContainer.appendChild(yesButton)

    cookieContainer.appendChild(cookieText)
    cookieContainer.appendChild(buttonContainer)

    // Staging to DOM
    document.body.appendChild(cookieContainer)
}

document.body.onload  = () => {
    if(document.cookie.split('; ').find(c => c.startsWith('einverstanden=')) === undefined){
        createCookieConsent()
    }
}

