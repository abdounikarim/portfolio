<template>
    <section
        :class="['wrapper', 'spotlight', index % 2 === 0 ? 'alt style2' : 'style1']"
    >
        <div class="inner">
            <a href="#" class="image">
                <!-- TODO - add image -->
                Image
            </a>
            <div class="content">
                <h2 class="major">{{ experience.title }}</h2>
                <p>{{ experience.description }}</p>
                <!--<a href="#" class="special">Voir plus</a>-->
                <br>
                <div v-if="front === false">
                    <p><b><i>Compétences</i></b></p>
                </div>
            </div>
        </div>
        <div
            class="inner left"
            v-if="index === 2 && front === true"
        >
            <ul class="actions center">
                <li><a href="#" class="button">Toutes les expériences</a></li>
            </ul>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Experience',
    props: {
        experience: {
            type: Object,
            required: true,
        },
        front: {
            type: Boolean,
            required: true,
        },
        index: {
            type: Number,
            required: false,
        }
    }
};
</script>

<style>

</style>
