<template>
    <div>
        <portfolio-component :all="true" />
        <back-to-home-component />
    </div>
</template>

<script>
import BackToHomeComponent from '../components/back-to-home';
import PortfolioComponent from "../components/portfolio";

export default {
    name: 'ProjectsPage',
    components: {
        PortfolioComponent,
        BackToHomeComponent,
    },
}
</script>

<style>

</style>
