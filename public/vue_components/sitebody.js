export default{
    props:['articles', 'first_item', 'last_set'],
    data:function (){
        return{
            'search' : null,
            'searchResult' : null,
            'items': JSON.parse(this.articles),
            'firstItem': Boolean(this.first_item),
            'lastSet': Boolean(this.last_set)
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
        },
        getPrev(){
           return this.items[0].id - 6
        },
        getNext(){
            let last_index = this.items.length - 1
            return this.items[last_index].id
        }
    },
    template: `
        <div class="main">
        <div id="articles">
            <input id="search" type="text" v-model="search" placeholder="Suchen">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th colspan="2">Picture</th>
                </tr>
                </thead>
                <tbody v-if="searchResult === null">
                <tr v-for="item in items">
                    <td>{{ item.id }}</td>
                    <td>{{ item.ab_name }}</td>
                    <td>&euro;{{ item.ab_price }}</td>
                    <td>{{ item.ab_description }}</td>
                    <td><img alt="No Image" v-bind:src="'/articleimages/' + item.id + '.jpg'" @error="imageUrlAlt"></td>
                    <td>
                        <button v-bind:id="'article_'+ item.id" class="article_add"
                                v-bind:value="item.ab_name" @click="addCart">+
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody v-else="">
                <tr v-for="result in searchResult">
                    <td>{{ result.id }}</td>
                    <td>{{ result.ab_name }}</td>
                    <td>{{ result.ab_price }}</td>
                    <td>{{ result.ab_description }}</td>
                    <td><img alt="No Image" v-bind:src="'/articleimages/' + result.id + '.jpg'" @error="imageUrlAlt">
                    </td>
                    <td>
                        <button v-bind:id="'article_'+ result.id" class="article_add"
                                v-bind:value="result.ab_name" @click="addCart">+
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
            <div id="pages">
                <a id="prev" v-if = "!this.firstItem" v-bind:href="'/newsite/' + this.getPrev()" >&lt;&lt;&nbsp;Prev</a>
                <a id="next" v-if="!this.lastSet" v-bind:href="'/newsite/'+ this.getNext()">Next&nbsp;&gt;&gt;</a>
            </div>
        </div>

        <div class="cart">
            <h3>Warenkorb</h3>
            <ul id="wishlist">
            </ul>
        </div>
    </div>`

}
