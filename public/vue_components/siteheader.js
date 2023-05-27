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
    props: ['categories'],
    data() {
        return {menuItems: navigation.content}
    },
    template: `
    <ul class="nav">
      <li class="nav-item" v-for="item in menuItems">
        {{item.name}}
          <ul class="nav-item-list" v-if="item.children !== undefined && item.children.length > 0">
            <li class="nav-item-list-item" v-for="d in item.children">{{d}}</li>
          </ul>
          <ul class="nav-item-list" v-if="item.name === 'Kategorien'">
              <li class="nav-item-list-item" v-for="d in JSON.parse(this.categories)">{{d}}</li>
          </ul>
      </li>
    </ul>
    `
}

