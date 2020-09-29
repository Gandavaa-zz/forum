<template>
        <div :id="'reply-'+id">
            <a :href="'/profiles/'+data.owner.name"
                v-text="data.owner.name">
            </a> 
            <span v-text="ago"></span> хэлжээ

            <div v-if="signedIn" class="is-pulled-right">
                <favorite :reply="data"></favorite>
            </div>

            <hr>

            <div v-if="editing">
                <form @submit="update">

                    <div class="field">
                        <textarea class="textarea" v-model="body" rows="4" required>{{ data.body }}</textarea>
                    </div>
                
                    <div class="control">
                        <button class="button is-small is-info">Шинэчлэх</button>
                        <button class="button is-small" @click="editing=false" type="button">Цуцлах</button>
                    </div>
                </form>
            </div>

            <div v-else v-text="body"></div>
        
            <!-- @can('update', $reply) -->

            <div class="buttons" v-if="canUpdate" style="border-top:1px solid #f5f5f5; margin-top:10px; padding-top:15px;">
                <button class="button is-small is-light" @click="editing = true">Засах</button>
                <button class="button is-small is-danger" @click="destroy">Устгах</button>
            </div>
            <!-- @endcan         -->
        </div>                    
</template>
<script>

import Favorite from './Favorite.vue';

export default {
    props: ['data'],

    components: { Favorite},

    data(){
        return {
            editing:false,
            id:this.data.id,
            body:this.data.body
        };        
    }, 

    computed: {
        ago(){
                return moment(this.data.created_at).fromNow() + '...';
        },
        signedIn(){
            return window.App.signedIn;
        },

        canUpdate(){
            return this.authorize(user=> this.data.user_id == user.id );
            // return this.data.user_id == window.App.user.id
        }
    },

    methods: {
        update(){

            axios.patch('/replies/'+ this.data.id, {
                body: this.body
            })

            .catch(error => {

                flash(error.response.data, 'danger');

            });

            this.editing = false;

            flash('Шинэчлэгдлээ');
        }, 

        destroy(){
            axios.delete('/replies/'+ this.data.id);

            this.$emit('deleted', this.data.id);

        }
    }
    
}
</script>