
import Pagination from "./pagination.js";
import Impressum from "./impressum.js";
export default{
    props:['articles', 'articleslength', 'type'],
    components: {
        Pagination,
        Impressum
    },
    data:function (){
        return{
            'search' : null,
            'searchResult' : null,
            'alLArticles': JSON.parse(this.articles),
            'items': JSON.parse(this.articles).slice(0, 5),
            'limit': 5,
            'offset': 0,
            'searchedArticlesTotalLength': 0,
            'art_length': parseInt(this.articleslength)
        }
    },
    watch: {
        search(currentInput){
            if(currentInput.length >= 3){
                this.offset = 0;
                this.getSearched(currentInput);
            }
            else{
                this.searchResult = null;
                this.offset = 0;
                this.searchedArticlesTotalLength = 0;
                setAddArticleListener();
            }
        }
    },
    methods: {
        getSearched(currentInput){
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = () => {
                if(xhr.readyState === 4 && xhr.status === 200){
                    const { articles, articles_length} = JSON.parse(xhr.response)
                    this.searchResult = articles;
                    this.searchedArticlesTotalLength = articles_length;
                }
            }
            xhr.open(
                'GET',
                `/api/articles?search=${currentInput}&limit=${this.$data.limit}&offset=${this.$data.offset}`
            );
            xhr.send();
        },
        addCart : function (event){
            addToCart(event)
        },
        imageUrlAlt(event) {
            event.target.src = event.target.src.replace(".jpg", ".png")
        },
        changePage: function(pageIndex){
            this.$data.offset = (pageIndex - 1) * this.$data.limit;
            if(this.$data.searchResult === null){
                this.$data.items = this.$data.alLArticles.slice(this.$data.offset, this.$data.offset + this.$data.limit )
            }else {
                this.getSearched(this.$data.search);
            }

        }
    },
    template: `
        <div class="main" v-if="type !== 'impressum' ">
            <div>
                <input class="main__search" type="text" v-model="search" placeholder="Suchen">
                <table class="main__table">
                    <thead class="main__table__header">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th colspan="2">Picture</th>
                    </tr>
                    </thead>
                    <tbody class="main__table__body" v-if="searchResult === null">
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
                    <tbody v-else>
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

                <pagination v-if="searchResult === null"  :articleslength="art_length" :limit="limit" @page-index="changePage"></pagination>
                <pagination v-if="searchResult !== null"  :articleslength="searchedArticlesTotalLength" :limit="limit" @page-index="changePage"></pagination>
            </div>

            <div class="cart">
                <h3>Warenkorb</h3>
                <ul class="wishlist">
                </ul>
            </div>
        </div>
        <impressum v-else></impressum>
        `

}
