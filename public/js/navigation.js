const nav = document.createElement('ul')
// Passed in from data attributes in html
const categories = JSON.parse(document.getElementById('script-navigations').dataset.categories)
const menuItems = ['Home', 'Kategorien', 'Verkaufen', ['Unternehmen', ['Philosophie', 'Karriere']]]

menuItems.forEach(item => {
    const li = document.createElement('li')
    li.style.display = 'block'
    li.style.textAlign = 'center'
    li.style.padding = '16px'
    li.style.textDecoration = 'none'
    li.style.color = 'white'
    li.style.cursor = 'pointer'

    li.addEventListener('mouseenter', () => {
        li.style.backgroundColor = '#111111'
        if(typeof(item) !== 'string' || item === 'Kategorien'){
            const ul = li.getElementsByTagName('ul')
            ul[0].style.display = 'block'
        }
    })
    li.addEventListener('mouseleave', () => {
        li.style.backgroundColor = '#333333'
        if(typeof(item) !== 'string' ||item === 'Kategorien'){
            const ul = li.getElementsByTagName('ul')
            ul[0].style.display = 'none'
        }
    })
    if(typeof(item) === 'string'){
        li.insertAdjacentHTML('afterbegin', item)
    }else {
        li.insertAdjacentHTML('afterbegin', item[0])
        const ul = document.createElement('ul')
        ul.style.display = 'none'
        ul.style.position = 'absolute'
        ul.style.top = '45px'
        ul.style.padding = '5px'
        ul.style.width = '93px'
        ul.style.backgroundColor = '#333333'
        item[1].forEach(d => {
            const li = document.createElement('li')
            li.insertAdjacentHTML('afterbegin', d)
            li.style.display = 'block'
            li.style.textAlign = 'left'
            li.style.padding = '5px'
            li.style.textDecoration = 'none'
            li.style.color = 'white'
            li.style.cursor = 'pointer'
            ul.appendChild(li)
        })
        li.appendChild(ul)
    }
    if(item === 'Kategorien'){
        const ul = document.createElement('ul')
        ul.style.display = 'none'
        ul.style.position = 'absolute'
        ul.style.padding = '10px'
        ul.style.top = '45px'
        ul.style.overflowY = 'hidden'
        ul.style.overflowX = 'hidden'
        ul.style.backgroundColor = '#333333'
        categories.forEach(d => {
            const li = document.createElement('li')
            li.insertAdjacentHTML('afterbegin', d)
            li.style.display = 'block'
            li.style.textAlign = 'left'
            li.style.padding = '5px'
            li.style.textDecoration = 'none'
            li.style.color = 'white'
            li.style.cursor = 'pointer'
            ul.appendChild(li)
        })
        li.appendChild(ul)
    }
    nav.appendChild(li)
})
// CSS
nav.style.width = '100vw'
nav.style.listStyleType = 'none';
nav.style.margin = 0
nav.style.padding =0
nav.style.overflow = 'hidden'
nav.style.backgroundColor = '#333333'
nav.style.display = 'flex'
nav.style.flexDirection = 'row'
nav.style.justifyContent = 'space-around'
nav.style.height = '3rem'


document.body.appendChild(nav)

