<template>
    <section id="banner">
        <div class="inner">
            <!--
            {% for message in app.flashes('contact') %}
            <div class="flash-notice">
                {{ message }}
            </div>
            <br>
            {% endfor %}
            -->
            <div class="logo">
                <img class="icon" src="build/images/karim.png" alt="ABDOUNI Abdelkarim">
            </div>
            <h2>Abdouni Abdelkarim</h2>
            <p>Développeur PHP Symfony</p>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'Banner',
    }
</script>