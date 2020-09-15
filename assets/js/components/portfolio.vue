<template>
    <section id="four" class="wrapper alt style1">
        <div class="inner">
            <h2 class="major">Portfolio</h2>
            <p>Dans cette section, vous pouvez retrouver une partie des différents projets sur lesquels j'ai travaillé. Que ce soit seul ou en équipe, je suis capable de m'adapter pour répondre aux besoins du client.</p>
            <div class="features">
                <project-component
                    v-for="project in projects"
                    :project="project"
                    :key="project.id"
                />
            </div>

            <div v-if="all === false">
                <ul class="actions center">
                    <li><router-link to="/projets" class="button">Tous les projets</router-link></li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
import ProjectComponent from '../components/project';
import { getProjects } from '../api/api';

export default {
    name: 'Portfolio',
    components: {
        ProjectComponent,
    },
    props: {
        all: {
            type: Boolean,
            required: true,
        }
    },
    data() {
        return {
            projects: [],
        }
    },
    async mounted() {
        const response = await getProjects();

        this.projects = response.data['hydra:member'];
    }
}
</script>

<style>

</style>
