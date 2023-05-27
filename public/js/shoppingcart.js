var carts = document.getElementById('wishlist');
var cartContents = [];
var shoppingCartId = null;
// API
function insertArticleIntoDatabase(id){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/shoppingcart');
    xhr.setRequestHeader('content-type', 'application/json');
    xhr.onreadystatechange = () => {
        if(xhr.readyState === 4 && xhr.status === 200){
            shoppingCartId = xhr.responseText;
        }
    }
    xhr.send(`{"art_id": "${id}"}`);
}
function deleteArticleFromDatabse(id){
    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', `api/shoppingcart/${shoppingCartId}/articles/${id}`)
    xhr.send();
}
function removeFromCart(event) {
    // Remove article from the wishlist
    const art_id = event.target.id.split('article_')[1];
    const art_name = event.target.value;
    const wishlists = carts.children;
    for(const li of wishlists){
        const item = li.textContent.slice(0, -1);
        if(item === art_name){
            carts.removeChild(li);
            cartContents = cartContents.filter(d => d !== art_name);
        }
    }
    // Remove article from the shoppingcart in database
    deleteArticleFromDatabse(art_id);

}

function setAddArticleListener() {
    const addButtons = document.getElementsByClassName('article_add');

    for(const button of addButtons){
        button.onclick = event => {
            const art_id = event.target.id.split('article_')[1];
            const art_name = event.target.value;
            if(!cartContents.includes(art_name)){
                // Insert into Wishlist
                const li = document.createElement('li');
                li.innerHTML = art_name;
                const button = document.createElement('button');
                button.innerHTML = '-';
                button.id = `article_${art_id}`
                button.value = art_name;
                button.onclick = removeFromCart;
                li.appendChild(button);
                carts.appendChild(li);
                cartContents.push(art_name);
                // Insert into Database
                insertArticleIntoDatabase(art_id);
            }
        }
    }
}


setAddArticleListener()

