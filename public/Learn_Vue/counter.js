export default {
    props:[],
    data: function (){
        return {
            'counter' : 0
        }
    },
    template: `<button @click='counter++'>{{counter}}</button>`
}
