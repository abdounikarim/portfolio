<template>
    <nav
        id="menu"
        :style="{ display: activeMenu ? 'inherit' : 'none' }"
    >
        <div class="inner">
            <h2>Menu</h2>
            <ul class="links">
                <li @click="toggleMenu"><router-link to="/">Accueil</router-link></li>
                <li><router-link to="/experiences">Expériences</router-link></li>
                <li><router-link to="/experiences">Portfolio</router-link></li>
                <li><router-link to="/mentions-legales">Mentions légales</router-link></li>
            </ul>
            <a href="#" class="close">Fermer</a>
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
                console.log(this.activeMenu);
                this.activeMenu = !this.activeMenu;
            }
        }
    }
</script>
