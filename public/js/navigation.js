const nav = document.createElement("ul");
// Passed in from data attributes in html
const categories = JSON.parse(
    document.getElementById("script-navigations").dataset.categories
);
const menuItems = [
    "Home",
    "Kategorien",
    "Verkaufen",
    ["Unternehmen", ["Philosophie", "Karriere"]],
];

const Home = {
    name: "Home",
    children: [],
};
const Kategorien = {
    name: "Kategorien",
    children: categories,
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
    displayContent: function () {
        const children = {};
        this.content.forEach((nav_item) => {
            children[nav_item.name] = {
                name: nav_item.name,
                children: nav_item.child,
            };
        });
        return children;
    },
};
console.log(navigation.displayContent());

navigation.content.forEach((item) => {
    const li = document.createElement("li");
    li.style.display = "block";
    li.style.textAlign = "center";
    li.style.padding = "16px";
    li.style.textDecoration = "none";
    li.style.color = "white";
    li.style.cursor = "pointer";

    li.addEventListener("mouseenter", () => {
        li.style.backgroundColor = "#111111";

        if (item.children.length > 0) {
            const ul = li.getElementsByTagName("ul");
            ul[0].style.display = "block";
        }
    });
    li.addEventListener("mouseleave", () => {
        li.style.backgroundColor = "#333333";
        if (item.children.length > 0) {
            const ul = li.getElementsByTagName("ul");
            ul[0].style.display = "none";
        }
    });
    li.insertAdjacentHTML("afterbegin", item.name);
    const ul = document.createElement("ul");
    ul.style.display = "none";
    ul.style.position = "absolute";
    ul.style.top = "45px";
    ul.style.padding = "5px";
    ul.style.width = "250px";
    ul.style.backgroundColor = "#333333";
    if (item.children !== undefined && item.children.length > 0) {
        item.children.forEach((d) => {
            const child = document.createElement("li");
            child.insertAdjacentHTML("afterbegin", d);
            child.style.display = "block";
            child.style.textAlign = "left";
            child.style.padding = "5px";
            child.style.textDecoration = "none";
            child.style.color = "white";
            child.style.cursor = "pointer";
            ul.appendChild(child);
        });
        li.appendChild(ul);
    }
    nav.appendChild(li);
});
// CSS
nav.style.width = "100vw";
nav.style.listStyleType = "none";
nav.style.margin = 0;
nav.style.padding = 0;
nav.style.overflow = "hidden";
nav.style.backgroundColor = "#333333";
nav.style.display = "flex";
nav.style.flexDirection = "row";
nav.style.justifyContent = "space-around";
nav.style.height = "3rem";

document.body.appendChild(nav);
