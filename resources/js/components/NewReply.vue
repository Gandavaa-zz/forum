<template>
    <div>
        <div v-if="signedIn">
            <div class="field">
                    <div class="control">
                        <h2 class="title is-6">Сэтгэгдэл:</h2>
                    </div>
                </div>
                <div class="field">                  
                    <div class="control">
                    <textarea name="body" 
                              class="textarea is-primary" 
                              placeholder="Хэлэх үгээ бичнэ үү?"
                              v-model="body"></textarea>
                    </div>
                    
                </div>                
                <div class="field">
                    <button type="submit" class="button is-primary" @click="addReply">Нийтлэх</button>
                </div>
        </div>    
        
        <p class="has-text-centered" v-else>Та <a href="/login">нэвтэрч</a> дараа энэхүү ярилцлагад оролцох боломжтой.</p>
        
    </div>
</template>

<script>
export default {
    //#38 removed props: ['endpoint'],

    data(){
        return {
            body: '',
        }
    },

    computed: {
        signedIn(){
            return window.App.signedIn;
        }
    },

    methods: {
        addReply(){
            axios.post(location.pathname + '/replies', {body:this.body})
                .then(({data}) => {
                    this.body = '';

                    flash('Таны оруулсан сэтгэгдэл нийтлэгдлээ.');

                    this.$emit('created', data); 
                });      
        }         
    } 
}
</script>