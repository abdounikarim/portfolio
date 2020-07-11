<template>
    <main>
        <header-component />
        <menu-component />
        <banner-component />
        <h1>Hello from Vue</h1>
        <footer-component />
    </main>
</template>

<script>
    import HeaderComponent from "../components/header";
    import BannerComponent from "../components/banner";
    import MenuComponent from "../components/menu";
    import FooterComponent from "../components/footer";

    export default {
        name: 'Home',
        components: {
            HeaderComponent,
            BannerComponent,
            MenuComponent,
            FooterComponent,
        },
    }
</script>
