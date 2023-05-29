export default {
    props: ['articleslength', 'limit'],
    emits: ['page-index'],
    data: function() {
        return {
            pageIndex: 1,
            maxPage: Math.ceil(parseInt(this.articleslength) / this.limit)
        }
    },
    methods:{
        next(){
            if(this.pageIndex === this.$data.maxPage)
                this.pageIndex = 1
            else
                this.pageIndex++;
            this.$emit('page-index', this.$data.pageIndex);
        },
        prev(){
            if(this.pageIndex === 1)
                this.pageIndex = this.$data.maxPage
            else
                this.pageIndex--;
            this.$emit('page-index', this.$data.pageIndex);
        }
    },

    template: `
        <div class="pagination">
          <button @click="prev">&lt</button>&nbsp<span>{{pageIndex}}</span>&nbsp<button @click="next">&gt</button>
        </div>`
}
