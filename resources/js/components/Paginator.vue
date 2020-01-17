<template>
    <div>
        <nav class="pagination is-right" role="navigation" aria-label="pagination" v-if="shouldPaginate">
            <a v-show="prevUrl" class="pagination-previous" rel="prev" @click.prevent="page--">&laquo; Өмнөх</a>
            <a v-show="nextUrl" class="pagination-next" rel="next" @click.prevent="page++">Дараах &raquo; </a>       
            <ul class="pagination-list">
            </ul>
        </nav>  
    </div>
</template>

<script>
export default {
    props: ['dataSet'],
    data(){
        return {
            page: 1,
            prevUrl: false,
            nextUrl: false
        }
    },
    // when dataSet changed directly change the this data
    watch: {
        dataSet(){
            this.page = this.dataSet.current_page;
            this.prevUrl = this.dataSet.prev_page_url;
            this.nextUrl = this.dataSet.next_page_url;
        },
        // watcher runs when page number changed this called to broadcast()
        page(){
            this.broadcast().updateUrl();
        }
    },
//    !! means return boolean
    computed:{
        shouldPaginate(){
            return !! this.prevUrl || !! this.nextUrl;             
        }
    }, 

    methods: {
        broadcast(){ 
            return this.$emit('changed', this.page);
        }, 

        updateUrl() {
            history.pushState(null, null, '?page=' + this.page);
        },
    }
}
</script>