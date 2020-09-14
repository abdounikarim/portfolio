<template>
    <div>
        <experience-title-component />
        <!-- Expériences -->
        <div v-for="(experience, index) in experiences">
            <experience-component
                :experience="experience"
                :index="index"
                :front="true"
                :key="index"
            />
        </div>

        <!-- Portfolio -->
    </div>
</template>

<script>
    import ExperienceTitleComponent from '../components/experience-title';
    import ExperienceComponent from '../components/experience';
    import axios from "axios";

    export default {
        name: 'Home',
        components: {
            ExperienceTitleComponent,
            ExperienceComponent,
        },
        data() {
            return {
                experiences: []
            }
        },
        async mounted() {
            const response = await axios.get('/api/experiences');

            this.experiences = response.data['hydra:member'];
        }
    }
</script>
