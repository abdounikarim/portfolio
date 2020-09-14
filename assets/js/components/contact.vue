<template>
    <section id="footer">
        <div class="inner">
            <h2 class="major">Contact</h2>
            <p>Vous souhaitez que je participe à l'un de vos projets ? Vous êtes intéressés par mon profil ? Vous avez une question ? N'hésitez pas à me contacter, je vous réponds dans les plus brefs délais.</p>

            <!-- TODO - Contact form -->

            <informations-component />
        </div>
    </section>
</template>

<script>
import InformationsComponent from "./informations";

export default {
    name: 'Contact',
    components: {
        InformationsComponent,
    },
}
</script>
