
export default {
    methods:{
        sendData: function(event) {
            event.preventDefault()

            let art_name = document.querySelector('#art_name').value
            let art_price = document.querySelector('#art_price').value
            let art_description = document.querySelector('#art_description').value

            let formData = new FormData()
            formData.append("art_name", art_name)
            formData.append("art_price", art_price)
            formData.append("art_description", art_description)

            let xhr = new XMLHttpRequest()
            xhr.open('POST', '/articles')
            xhr.setRequestHeader("X-Requested-With", "xmlhttprequest");
            xhr.setRequestHeader('X-CSRF-Token', document.getElementById('csrfToken').content)

            console.log(document.getElementById('csrfToken').content)

            let oldmessage = (document.getElementById("message") === null)

            let message = null
            if(oldmessage){
                message = document.createElement("p")
                message.setAttribute("id", "message")
            }
            else
                message = document.getElementById("message")


            xhr.onreadystatechange = function () {
                if(xhr.readyState === 4){
                    if(xhr.status === 200){
                        message.innerText = xhr.responseText
                    }else{
                        message.innerText = "Server Fehler"
                    }

                    if(oldmessage)
                        document.body.appendChild(message)
                }
            }

            xhr.send(formData)
            return false
        }
    }
    ,
    template:`
    <fieldset class="newArticleForm">
    <form class="newArticleForm__form" method="POST" action="...">

    <label class="newArticleForm__form__label" for="name">Name:</label><br>
    <input class="newArticleForm__form__input" type="text" id="art_name" name="art_name" required><br>

    <label class="newArticleForm__form__label" for="price">Price:</label><br>
    <input class="newArticleForm__form__input" type="number" min="0" id="art_price" name="art_price" required><br>

    <label class="newArticleForm__form__label" for="name">Description:</label><br>
    <input class="newArticleForm__form__input" type="text" id="art_description" name="art_description" required><br>

    <br>
    <button class="newArticleForm__form__button--submit" type="submit" @click="sendData">Send</button>
    </form>
    </fieldset>`
}
