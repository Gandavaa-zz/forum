<template>
    <div>
        <div v-for="(reply, index) in items" class="box">

            <reply :data="reply" @deleted="remove(index)"></reply>

        </div>

        <new-reply :endpoint="endpoint" @created="add"></new-reply>
    </div>

</template>

<script>
    import Reply from './Reply.vue';
    import NewReply from './NewReply.vue';

    export default {
        props: ['data'], 

        components: { Reply, NewReply },

        data(){
            return {
                items: this.data,
                endpoint: location.pathname + '/replies'
            }
        }, 
        // emmit hiihed ene mothods-g duudna herhen yagj?
        methods: {
            // #37 add new reply item push the replies
            add(reply){
                this.items.push(reply);
                this.$emit('added');
            },

            remove(index){
                this.items.splice(index, 1);
                this.$emit('removed');
                flash('Хариуг амжилттай устгалаа!');
            }
        }
    }

</script>