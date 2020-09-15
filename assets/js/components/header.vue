<template>
    <header id="header" class="alt">
        <div v-if="flashMessage">
            {{ flashMessage }}
        </div>
        <h1><router-link to="/">Abdouni Abdelkarim</router-link></h1>
        <nav>
            <a href="#menu">Menu</a>
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
        }
    }
</script>