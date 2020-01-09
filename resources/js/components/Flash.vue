<template>
      <div class="notification is-success message-flash" v-show="show">
        <button class="delete"></button>
        Амжилттай! {{ body }}
    </div>
</template>

<script>
    export default {
        props: ['message'],
        data() {
            return {
              body: this.message, 
              show: false 
            }
        }, 
        created(){
            if(this.message){
               this.flash(this.message);
            }

            window.events.$on('flash', message=> this.flash(message));
        }, 
        methods:{ 
          flash(message){
            this.body = message;
            self.show = true;
            self.hide();
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
