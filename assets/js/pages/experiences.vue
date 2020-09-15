<template>
    <div>
        <experience-title />
        <experience-component
            v-for="(experience, index) in experiences"
            :experience="experience"
            :index="index"
            :front="false"
            :key="index"
        />
        <back-to-home-component />
    </div>
</template>

<script>
    import axios from 'axios';
    import ExperienceTitle from '../components/experience-title';
    import ExperienceComponent from '../components/experience';
    import BackToHomeComponent from '../components/back-to-home';

    export default {
        name: 'ExperiencesPage',
        components: {
            ExperienceTitle,
            ExperienceComponent,
            BackToHomeComponent,
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
