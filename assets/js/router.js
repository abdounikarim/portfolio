import Vue from 'vue'
import Router from 'vue-router'
import PageHome from './pages/Home';
import PageExperiences from './pages/Experiences';
import NotFound from './pages/not-found';

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
        },
        {
            path: '*',           // wildcard
            name: 'notfound',
            component: NotFound
        }
    ]
})
