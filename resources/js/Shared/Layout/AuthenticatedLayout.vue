<script setup>
import Sidebar from './Partial/Sidebar.vue';
import Header from './Partial/Header.vue';
import Footer from './Partial/Footer.vue';
</script>

<template>
    <div id="app">
        <Sidebar />
        <div id="main" class="layout-navbar navbar-fixed">
            <Header/>
            <div id="main-content" style="min-height: calc(100vh - 15vh); max-width: 1173px; margin: 0 auto;">
                <slot/>
            </div>
            <Footer/>
        </div>
    </div>
</template>
