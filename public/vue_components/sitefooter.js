export default {
    data: function(){
        return {
            kontakt: "Kontakt",
            copyright: "Copyright",
            impressum: "Impressum"
        }
    },
    template: `
   <footer>
        <p><a>{{kontakt}}</a>&nbsp|&nbsp<a>{{copyright}}</a>&nbsp|&nbsp<a>{{impressum}}</a></p>
    </footer>
    `
}


