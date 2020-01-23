<template>
      <div class="notification message-flash" 
        :class="'is-'+level" 
        v-show="show" 
        v-text="body">
        Амжилттай! {{ body }}
    </div>
</template>

<script>
    export default {
        props: ['message'],
        data() {
            return {
              body: this.message, 
              level: 'success',
              show: false 
            }
        }, 
        created(){
            if(this.message){
               this.flash(this.message);
            }

            window.events.$on('flash', data=> this.flash(data));
        }, 
        methods:{ 
          flash(data){
            this.body = data.message;
            this.level = data.level;
            this.show = true;
            this.hide();
          },  

          hide(){
            //  $('.message-flash').delay(3000).fadeOut();
             setTimeout(() =>{
                this.show = false;
                 console.log('timeout called');
            }, 4000);
            // setTimeout(() => { this.show = false }, 2000);
          }
        }
    }
</script>

<style>
  .message-flash{
    width: 15%;
    position:fixed;
    right:25px;
    bottom:25px;
  }
</style>
