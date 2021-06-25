<template>
    <header id="header" class="alt">
        <div v-if="flashMessage">
            {{ flashMessage }}
        </div>
        <h1><router-link to="/">Abdouni Abdelkarim</router-link></h1>
        <nav>
            <a @click="toggleMenu" href="#menu">Menu</a>
        </nav>
    </header>
</template>

<script>
    export default {
        name: 'Header',
        data() {
            return {
                flashMessage: null,
            };
        },
        created() {
            const app = document.getElementById('app')
            const message = JSON.parse(app.dataset.message);

            if(message.length > 0) {
                this.flashMessage = message[0];
            }
        },
        methods: {
            toggleMenu() {
                let bodyElement = document.getElementsByTagName('body');
                let body = bodyElement[0];
                body.classList.toggle('is-menu-visible');
            }
        }
    }
</script>
