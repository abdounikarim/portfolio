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

        <!-- Contact -->
        <contact-component />
    </div>
</template>

<script>
import ContactComponent from "../components/contact";
import ExperienceComponent from '../components/experience';
import ExperienceTitleComponent from '../components/experience-title';
import PortfolioComponent from '../components/portfolio';

import axios from "axios";

export default {
    name: 'HomePage',
    components: {
        ContactComponent,
        ExperienceComponent,
        ExperienceTitleComponent,
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
