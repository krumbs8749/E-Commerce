export default {
    data:function (){
        return{
            'seitenZahl': 1
        }
    },
    methods:{
        next(){
            if(this.seitenZahl === 10)
                this.seitenZahl = 1
            else
                this.seitenZahl++;
        },
        prev(){
            if(this.seitenZahl === 1)
                this.seitenZahl = 10
            else
                this.seitenZahl--;
        }
    },

    template: `<button @click="prev">&lt</button>&nbsp<span>{{seitenZahl}}</span>&nbsp<button @click="next">&gt</button>`
}
