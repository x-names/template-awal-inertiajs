<script setup>
    import AppHead from '@/Shared/Components/AppHead.vue';
    import PageHeading from '@/Shared/Components/PageHeading.vue'
</script>
<template>
    <AppHead title="Dashboard" />
    <PageHeading :breadcrumb="[{title: 'Dashboard', currentPage: true}]" title="Dashboard" description="Dashboard Page"/>
    <div class="page-content">
        <div>
            <p>Test Dashboard</p>
        </div>
    </div>
</template>
