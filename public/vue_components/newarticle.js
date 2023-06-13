
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
        }
    }
    ,
    template:`
    <form method="POST" action="...">

    <label for="name">Name:</label><br>
    <input type="text" id="art_name" name="art_name" required><br>

    <label for="price">Price:</label><br>
    <input type="number" min="0" id="art_price" name="art_price" required><br>

    <label for="name">Description:</label><br>
    <input type="text" id="art_description" name="art_description" required><br>

    <br>
    <button type="submit" onclick="sendData">Send</button>
    </form>`
}
