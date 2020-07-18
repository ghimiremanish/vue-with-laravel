import axios from 'axios'

export function getLogin(username, password){
    return axios({
        method: 'POST',
        url: '/api/login',
        data: {username: username, password: password},
    })
}

export function Logout(){
    return axios({
        method: 'post',
        url: '/api/user/logout',
        headers: {Authorization: Bearer `$( JSON.parse(localStorage.getItem('token')) )`}
    })
}