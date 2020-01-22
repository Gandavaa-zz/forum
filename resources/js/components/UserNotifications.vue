<template>
    
    <div class="navbar-item has-dropdown is-hoverable" v-if="notifications.length">
          <a class="navbar-link" href="#">
              <span class="fa fa-bell"></span>
            </a>

             <div class="navbar-dropdown">
                 <span v-for="notification in notifications">
                    <a class="navbar-item" 
                        :href="notification.data.link"                         
                        v-text="notification.data.message"                         
                        @click="markAsRead(notification)"                        
                    ></a>
                </span>

            </div>
    </div>

</template>

<script>

export default {

    data() {
        return { notifications: false }
    },
    created(){
        axios.get("/profiles/" + window.App.user.name + "/notifications")
            .then(response => this.notifications = response.data);
    },

    methods: {
        markAsRead(notification){
            axios.delete('/profiles/' + window.App.user.name + '/notifications/' + notification.id);
        }
    }




    
}

</script>

