<script setup>
    import { Link } from '@inertiajs/vue3';
    defineProps({
        isActive: Boolean,
        link: String,
        name: String,
        icon: String,
    })
</script>

<template>
    <li class="sidebar-item" :class="{'active': isActive}">
        <Link class="sidebar-link" :href="link">
            <i :class="`bi bi-${icon}`"></i>
            <span>{{ name }}</span>
        </Link>
    </li>
</template>
