<script setup>
    import { Head } from '@inertiajs/vue3';

    defineProps({
        title: {
            type: String,
            default: 'Laravel'
        },
        description: {
            type: String,
            default: 'Laravel'
        },
        keywords: {
            type: String,
            default: 'Laravel'
        },
    })
</script>

<template>
    <Head>
        <title>{{ title }} - Learning Management System</title>
        <meta name="description" content="{{ description }}">
        <meta name="keywords" content="{{ keywords }}">
    </Head>
</template>
