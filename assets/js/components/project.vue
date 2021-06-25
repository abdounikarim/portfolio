<template>
    <article>
        <a href="#" class="image">
            <img :src="project.image.name" :alt="project.image.alt" />
        </a>
        <h3 class="major">{{ project.name }}</h3>
        <p>{{ project.description }}</p>
        <!--
        <a href="#" class="special">Voir plus</a>
        -->
    </article>
</template>

<script>
export default {
    name: 'Project',
    props: {
        project: {
            type: Object,
            required: true,
        },
    },
}
</script>

<style>

</style>
