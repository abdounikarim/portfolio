<template>
    <div>
        <div id="page-wrapper">
            <header-component />
            <banner-component />
            <router-view></router-view>
            <footer-component />
        </div>
        <menu-component />
    </div>
</template>

<script>
import HeaderComponent from "./components/header";
import BannerComponent from "./components/banner";
import MenuComponent from "./components/menu";
import FooterComponent from "./components/footer";

export default {
    name: 'App',
    components: {
        HeaderComponent,
        BannerComponent,
        MenuComponent,
        FooterComponent,
    }
}
</script>
