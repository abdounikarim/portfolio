<template>
    <section id="footer">
        <div class="inner">
            <h2 class="major">Contact</h2>
            <p>Vous souhaitez que je participe à l'un de vos projets ? Vous êtes intéressés par mon profil ? Vous avez une question ? N'hésitez pas à me contacter, je vous réponds dans les plus brefs délais.</p>

            <form-component />

            <informations-component />
        </div>
    </section>
</template>

<script>
import InformationsComponent from "./informations";
import FormComponent from "./form";

export default {
    name: 'Contact',
    components: {
        FormComponent,
        InformationsComponent,
    },
}
</script>
