<template>
    <span>
        <img
            class="img-icon"
            :src="skill.image.name"
            :alt="skill.image.alt"
        />
        <span>{{ skill.image.alt }}</span>
    </span>
</template>

<script>
export default {
    name: 'Skill',
    props: {
        skill: {
            type: Object,
            required: true,
        }
    }
}
</script>

<style>

</style>
