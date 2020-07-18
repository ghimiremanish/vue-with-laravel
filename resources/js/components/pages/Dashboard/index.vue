<template>
    <div style="padding: 100px">
        <button @click="handleLogout">Logout</button>
        <hr>
        <h1>Admin Dashboard</h1>

        <h5>Add User</h5>
        <form enctype="multipart/form-data" method="post">
            <input type="text" name="username" placeholder="Username"><br><br>
            <input type="text" name="name" placeholder="name"><br><br>
            <input type="text" name="role" placeholder="role"><br><br>
            <input type="text" name="skill" placeholder="skill"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input type="file" id="img" name="img" accept="image/*">
            <input type="submit">
        </form>
    </div>
</template>

<script>
import {Logout} from '../../../services'
export default {
    created () {
        console.log('hello')
    },

    beforeCreate(){
        if(localStorage.getItem('token') == null && localStorage.getItem('user') == null){
            this.$router.push('/');
        }
    },

    methods: {
        handleLogout(){
            Logout().then(res => {
                console.log(res.data)
            })
        }
    }
    
}
</script>