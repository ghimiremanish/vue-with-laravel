import Vue from 'vue'
import Router from 'vue-router'
import Login from './components/pages/Login/Login.vue'
import Dashboard from './components/pages/Dashboard/index.vue'

Vue.use(Router)

let router = new Router({
    mode: 'history',
    routes : [
        {
            path: '/',
            component: Login,
            name: 'Home',
            meta: {
                guest: true,
            }
        },
        {
            path: '/dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true,
            }
        }
    ]
})

export default router;