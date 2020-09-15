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
    import ExperienceTitle from '../components/experience-title';
    import ExperienceComponent from '../components/experience';
    import BackToHomeComponent from '../components/back-to-home';
    import { getExperiences } from '../api/api';

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
            const response = await getExperiences();

            this.experiences = response.data['hydra:member'];
        }
    }
</script>
