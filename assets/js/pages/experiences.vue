<template>
    <experience-title />
</template>

<script>
    import axios from 'axios';
    import ExperienceTitle from '../components/experience-title';

    export default {
        name: 'Experiences',
        components: {
            ExperienceTitle,
        },
        data() {
            return {
                experiences: []
            }
        },
        async mounted() {
            const response = await axios.get('/api/experiences');

            this.experiences = response.data['hydra:member'];
            console.log(this.experiences);
        }
    }
</script>
