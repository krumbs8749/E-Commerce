var carts = document.getElementById('wishlist')
var cartContents = []

function removeFromCart(event) {
    const art_name = event.target.value
    const wishlists = carts.children
    for(const li of wishlists){
        const item = li.textContent.slice(0, -1)
        if(item === art_name){
            carts.removeChild(li)
            cartContents = cartContents.filter(d => d !== art_name)
        }
    }

}
function setAddArticleListener() {
    const buttons = document.getElementsByClassName('article_add')

    for(const button of buttons){
        button.onclick = event => {
            const art_name = event.target.value
            console.log(cartContents)
            if(!cartContents.includes(art_name)){
                const li = document.createElement('li')
                li.innerHTML = art_name
                const button = document.createElement('button')
                button.innerHTML = '-'
                button.value = art_name
                button.onclick = removeFromCart
                li.appendChild(button)
                carts.appendChild(li)
                cartContents.push(art_name)
            }


        }
    }
}
setAddArticleListener()

