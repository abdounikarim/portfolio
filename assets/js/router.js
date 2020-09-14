import Vue from 'vue'
import Router from 'vue-router'
import PageHome from './pages/Home';
import PageExperiences from './pages/experiences';
import PageProjects from './pages/projects';
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
            path: '/projets',
            name: 'projects',
            component: PageProjects
        },
        {
            path: '*',           // wildcard
            name: 'notfound',
            component: NotFound
        }
    ]
})
