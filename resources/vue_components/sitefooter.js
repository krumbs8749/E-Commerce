export default {
    emits: ['update-type'],
    data: function(){
        return {
            kontakt: "Kontakt",
            copyright: "Copyright",
            impressum: "impressum"
        }
    },
    methods: {
        setType: function () {
            this.$emit('update-type', this.impressum);
        }
    },
    template: `
   <footer>
        <p><a>{{kontakt}}</a>&nbsp|&nbsp<a>{{copyright}}</a>&nbsp|&nbsp<a @click="setType">{{impressum}}</a></p>
    </footer>
    `
}


