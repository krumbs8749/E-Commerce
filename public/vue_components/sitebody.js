export default{
    props:['articles'],
    data:function (){
        return{
            'search' : null,
            'searchResult' : null,
            'items': JSON.parse(this.articles)
        }
    },
    watch: {
        search(currentInput){
            if(currentInput.length >= 3)
                this.getSearched(currentInput)
            else{
                this.searchResult = null
                setAddArticleListener()
            }
        }
    },
    methods: {
        getSearched(currentInput){
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = () => {
                if(xhr.readyState === 4 && xhr.status === 200){
                    this.$data.searchResult = JSON.parse(xhr.response)
                }
            }
            xhr.open('GET', '/api/articles?search=' + currentInput);
            xhr.send();
        },
        addCart : function (event){
            addToCart(event)
        },
        imageUrlAlt(event) {
            event.target.src = event.target.src.replace(".jpg", ".png")
        }
    },
    template: `
        <div class="main">
        <div>
            <input id="search" type="text" v-model="search" placeholder="Suchen">
            <table>
                <thead>
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>price</td>
                    <td>description</td>
                    <td>picture</td>
                </tr>
                </thead>
                <tbody v-if="searchResult === null">
                <tr v-for="item in items">
                    <td>{{ item.id }}</td>
                    <td>{{ item.ab_name }}</td>
                    <td>{{ item.ab_price }}</td>
                    <td>{{ item.ab_description }}</td>
                    <td><img alt="No Image" v-bind:src="'/articleimages/' + item.id + '.jpg'"  @error="imageUrlAlt"></td>
                    <td><button v-bind:id="'article_'+ item.id" class="article_add"
                                v-bind:value="item.ab_name" @click="addCart">+</button></td>
                </tr>
                </tbody>
                <tbody v-else="">
                <tr v-for="result in searchResult">
                    <td>{{ result.id }}</td>
                    <td>{{ result.ab_name }}</td>
                    <td>{{ result.ab_price }}</td>
                    <td>{{ result.ab_description }}</td>
                    <td><img alt="No Image" v-bind:src="'/articleimages/' + result.id + '.jpg'" @error="imageUrlAlt"></td>
                    <td><button v-bind:id="'article_'+ result.id" class="article_add"
                                v-bind:value="result.ab_name" @click="addCart">+</button></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="cart">
            <h3>Warenkorb</h3>
            <ul id="wishlist">
            </ul>
        </div>
    </div>`
}
