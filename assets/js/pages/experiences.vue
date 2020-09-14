<template>
    <div>
        <experience-title />
        <div v-for="(experience, index) in experiences">
            <experience-component
                :experience="experience"
                :index="index"
                :front="false"
                :key="index"
            />
        </div>
        <back-to-home-component />
    </div>
</template>

<script>
    import axios from 'axios';
    import ExperienceTitle from '../components/experience-title';
    import ExperienceComponent from '../components/experience';
    import BackToHomeComponent from '../components/back-to-home';

    export default {
        name: 'Experiences',
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
