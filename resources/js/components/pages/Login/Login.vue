<template>
    <div style="padding: 100px;">
        <h1>Login Page (Admin/User)</h1>
        <form @submit="handleSubmit" method="post">
            <input type="text" name="username" placeholder="please input email or username" v-model="username"><br><br>
            <input type="password" name="password" placeholder="Enter your password" v-model="password"><br><br>
            <input type="submit" value="login" >
        </form>
        <h5 style="color: red;" v-if="error !== ''">{{error}}</h5>
    </div>
</template>

<script>
import {getLogin} from '../../../services/Login'

export default {
    
    data () {
        return {
            username: '',
            password: '',
            error: '',
        }
    },

    beforeCreate() {
        if(localStorage.getItem('token') !== null && localStorage.getItem('user') !== null){
            this.$router.push('/dashboard');
        }
    },

    methods : {
        handleSubmit(e){
            e.preventDefault();
            if(this.username !== '' && this.password !== ''){
                getLogin(this.username, this.password).then(res => {
                    if(res.data.kind == 'admin'){
                        localStorage.setItem('token',JSON.stringify(res.data[0]))
                        localStorage.setItem('user',JSON.stringify(res.data[1]))
                        localStorage.setItem('kind','admin')
                        this.$router.push('/dashboard');
                    }else{
                        localStorage.setItem('token',JSON.stringify(res.data[0]))
                        localStorage.setItem('user',JSON.stringify(res.data[1]))
                        localStorage.setItem('kind','user')
                        this.$router.push('/dashboard');
                    }
                })
            }else{
                this.error = "error in login, Please try again!"
            }
        }
    },
}
</script>