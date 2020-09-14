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
        <div class="inner left">
            <ul class="actions center">
                <li>
                    <router-link to="/experiences" class="button">Toutes les expériences</router-link>
                </li>
            </ul>
        </div>

        <!-- Portfolio -->
        <portfolio-component :all="false" />
    </div>
</template>

<script>
    import ExperienceTitleComponent from '../components/experience-title';
    import ExperienceComponent from '../components/experience';
    import PortfolioComponent from '../components/portfolio';
    import axios from "axios";

    export default {
        name: 'Home',
        components: {
            ExperienceTitleComponent,
            ExperienceComponent,
            PortfolioComponent,
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
