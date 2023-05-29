export default {
    emits: ['update-type'],
    data: function(){
        return {
            kontakt: "Kontakt",
            copyright: "Copyright",
            impressum: "Impressum"
        }
    },
    template: `
   <footer>
        <p><a>{{kontakt}}</a>&nbsp|&nbsp<a>{{copyright}}</a>&nbsp|&nbsp<a href="/impressum">{{impressum}}</a></p>
    </footer>
    `
}


