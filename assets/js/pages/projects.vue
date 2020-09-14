<template>
    <div>
        <div v-for="project in projects">
            <project-component :project="project" />
        </div>
        <back-to-home-component />
    </div>
</template>

<script>
import axios from 'axios';
import ProjectComponent from '../components/project';
import BackToHomeComponent from '../components/back-to-home';

export default {
    name: 'ProjectsPage',
    components: {
        BackToHomeComponent,
        ProjectComponent,
    },
    data() {
        return {
            projects: [],
        }
    },
    async mounted() {
        const response = await axios.get('/api/projects');

        this.projects = response.data['hydra:member'];
    }
}
</script>

<style>

</style>
