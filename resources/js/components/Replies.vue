<template>
    <div>
        <div v-for="(reply, index) in items" class="box" :key="reply.id">

            <reply :data="reply" @deleted="remove(index)"></reply>

        </div>
        <!-- #38 updated is listening when emit called changed fetch recalled again with a new page  -->
        <paginator :dataSet="dataSet" @changed="fetch"></paginator>
        
        <br>
        <!-- #38 endpoint removed :endpoint="endpoint"-->
        <new-reply @created="add"></new-reply>
    </div>

</template>

<script>
    import Reply from './Reply.vue';
    import NewReply from './NewReply.vue';
    import collection from '../mixins/collection';

    export default {

        components: { Reply, NewReply },
        // #38 added here   
        mixins: [collection], 

        data(){
            return {
                dataSet: false
                // #38 removed endpoint: location.pathname + '/replies'
            }
        }, 

        // #38 added here
        created(){
            this.fetch();
        },
        // emmit hiihed ene mothods-g duudna herhen yagj?
        methods: {
            // #38 added here
            // fetch this url then call refresh function get data to items
            // 2nd when updated page then call this fetch
            fetch(page){
                axios.get(this.url(page)).then(this.refresh);
            }, 
            // sent to next page
            // default page = 1
            url(page){
                if (! page){
                    let query = location.search.match(/page=(\d+)/);
                    page = query ? query[1] : 1; 
                }
                return `${location.pathname}/replies?page=${page}`;
            },
            // {data} means get only data should return
            refresh({data}){
                this.dataSet = data;
                this.items = data.data;
            },

            // #37 add new reply item push the replies
            // add remove here moved in mixinigs    
        }
    }

</script>