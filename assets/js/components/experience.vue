<template>
    <section
        :class="['wrapper', 'spotlight', index % 2 === 0 ? 'alt style2' : 'style1']"
    >
        <div class="inner">
            <a href="#" class="image">
                <img :src="experience.image.name" :alt="experience.image.alt" />
            </a>
            <div class="content">
                <h2 class="major">{{ experience.title }}</h2>
                <p>{{ experience.description }}</p>
                <!--<a href="#" class="special">Voir plus</a>-->
                <br>
                <div v-if="front === false">
                    <p><b><i>Compétences</i></b></p>
                    <p
                        :class="index % 2 === 0 ? 'img-icons-2' : 'img-icons-1'"
                    >
                        <span
                            class="experience_skills"
                            v-for="skill in experience.skills"
                        >
                            <skill-component :skill="skill" />
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import SkillComponent from './skill';

export default {
    name: 'Experience',
    components: {
        SkillComponent,
    },
    props: {
        experience: {
            type: Object,
            required: true,
        },
        front: {
            type: Boolean,
            required: true,
        },
        index: {
            type: Number,
            required: false,
        }
    }
};
</script>

<style>

</style>
