import Vue from 'vue'
import Router from 'vue-router'
import PageHome from './pages/Home';
import PageExperiences from './pages/Experiences';

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: PageHome
        },
        {
            path: '/experiences',
            name: 'experiences',
            component: PageExperiences
        }
    ]
})
