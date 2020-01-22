<template>
    <button :class="classes" @click="subscribe">Захиалга</button>
</template>

<script>
export default {
    props: ['active'],
    computed: {
        classes() { 
            return ['button', this.active ? 'is-primary': '']; 
        }
    }, 
    methods: {
        subscribe(){
            axios[(this.active ? 'delete' : 'post')](location.pathname + '/subscriptions');
            this.active = ! this.active;
        }
    }
}
</script>