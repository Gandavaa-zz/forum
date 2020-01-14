<template>
  <button type="submit" :class="classes" @click="toggle">
      <span class="icon"><i class="fa fa-heart"></i></span>
      <span v-text="count"></span> 
    </button>
</template>

<script>
export default {
    props: ['reply'],
    data(){
        return {
            count: this.reply.favoritesCount, 
            active: this.reply.IsFavorited
        }
    }, 
    // button is-primary
    computed:{
        classes(){
            return ['button', this.active ? 'is-primary ' : 'is-light'];
        }, 

        endpoint(){
            return '/replies/' + this.reply.id + '/favorites';
        }

    },
    methods: {
        toggle(){
            this.active ? this.destroy() : this.create();                           
        }, 

        create(){
            axios.post(this.endpoint); 
            this.active = true;
            this.count++;
        }, 

        destroy(){
            axios.delete(this.endpoint); // create the end point
            this.active = false;
            this.count --;
        }
    }
    
}
</script>