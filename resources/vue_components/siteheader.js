const Home = {
    name: "Home",
    children: [],
};
const Kategorien = {
    name: "Kategorien",
    children: [],
};
const Verkaufen = {
    name: "Verkaufen",
    children: [],
};
const Unternehmen = {
    name: "Unternehmen",
    children: ["Philosophie", "Karriere"],
};

const navigation = {
    content: [
        Object.create(Home),
        Object.create(Kategorien),
        Object.create(Verkaufen),
        Object.create(Unternehmen),
    ],
};

export default {
    emits: ['update-type', 'myarticle'],
    props: ['categories', 'enablelogin', 'userid'],

    data() {
        return {menuItems: navigation.content, bool: false}
    },
    methods: {
        setMain: function () {
            this.$emit('update-type', 'main');
        },
        setLogin: function (){
            this.$emit('update-type', 'login');
        },
        myArticle: function (){
            this.bool = !this.bool;
            this.$emit('myarticle', this.bool);
        },
        logout: function (){
            window.location.href = "/logout";
        }
    },
    template: `
    <ul class="nav">
      <li class="nav__name" v-for="item in menuItems">
        <span class="home" v-if="item.name === 'Home'" @click="setMain">{{item.name}}</span>
          <span v-else="">{{item.name}}</span>
          <ul class="nav__name item" v-if="item.children !== undefined && item.children.length > 0">
            <li class="nav__name item__list" v-for="d in item.children">{{d}}</li>
          </ul>
          <ul class="nav__name item" v-if="item.name === 'Kategorien'">
              <li class="nav__name item__list" v-for="d in JSON.parse(this.categories)">{{d}}</li>
          </ul>
      </li>
      <li v-if="this.enablelogin == 0"><button class="login" @click="setLogin">LOGIN</button></li>
      <li v-else>
          <button v-if="!this.bool" class="showOwnArticle" @click="myArticle">My Articles</button>
          <button v-else class="showOwnArticle" @click="myArticle">All Articles</button>
          <button class="showOwnArticle logout" @click="logout">LOGOUT</button>
      </li>

    </ul>
    `
}


