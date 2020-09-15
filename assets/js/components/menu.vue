<template>
    <nav id="menu">
        <div class="inner">
            <h2>Menu</h2>
            <ul class="links">
                <li @click="toggleMenu"><router-link to="/">Accueil</router-link></li>
                <li @click="toggleMenu"><router-link to="/experiences">Expériences</router-link></li>
                <li @click="toggleMenu"><router-link to="/projets">Portfolio</router-link></li>
                <li @click="toggleMenu"><router-link to="/mentions-legales">Mentions légales</router-link></li>
            </ul>
            <a @click="toggleMenu" href="#" class="close">Fermer</a>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'Menu',
        data() {
            return {
                activeMenu: false,
            }
        },
        methods: {
            toggleMenu() {
                let bodyElement = document.getElementsByTagName('body');
                let body = bodyElement[0];
                body.classList.remove('is-menu-visible');
            }
        }
    }
</script>
