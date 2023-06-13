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
    emits: ['update-type'],
    props: ['categories'],
    data() {
        return {menuItems: navigation.content}
    },
    methods: {
        setType: function () {
            this.$emit('update-type', 'main');
        }
    },
    template: `
    <ul class="nav">
      <li class="nav__name" v-for="item in menuItems">
        <span class="home" v-if="item.name === 'Home'" @click="setType">{{item.name}}</span>
          <span v-else="">{{item.name}}</span>
          <ul class="nav__name item" v-if="item.children !== undefined && item.children.length > 0">
            <li class="nav__name item__list" v-for="d in item.children">{{d}}</li>
          </ul>
          <ul class="nav__name item" v-if="item.name === 'Kategorien'">
              <li class="nav__name item__list" v-for="d in JSON.parse(this.categories)">{{d}}</li>
          </ul>
      </li>
    </ul>
    `
}


