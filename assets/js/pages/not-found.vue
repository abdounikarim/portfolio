<template>
    <div>
        <div class="wrapper">
            <div class="inner">
                <h1>Page non trouvée</h1>
            </div>
        </div>

        <back-to-home-component />
    </div>
</template>

<script>
import BackToHomeComponent from '../components/back-to-home';

export default {
    name: 'NotFoundPage',
    components: {
        BackToHomeComponent,
    }
}
</script>
