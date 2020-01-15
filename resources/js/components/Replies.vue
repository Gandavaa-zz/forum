<template>
    <div>
        <div v-for="(reply, index) in items" class="box">

            <reply :data="reply" @deleted="remove(index)"></reply>

        </div>
    </div>


</template>

<script>
    import Reply from './Reply.vue';

    export default {
        props: ['data'], 

        components: { Reply },

        data(){
            return {
                items: this.data
            }
        }, 
        // emmit hiihed ene mothods-g duudna herhen yagj?
        methods: {
            remove(index){
                this.items.splice(index, 1);
                this.$emit('removed');
                flash('Хариуг амжилттай устгалаа!');
            }
        }
    }

</script>