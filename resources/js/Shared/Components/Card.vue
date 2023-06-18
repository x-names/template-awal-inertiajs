<script setup>
defineProps({
    title: {
        type: String,
        default: null
    },
    subtitle: {
        type: String,
        default: null
    }
})
</script>

<template>
    <div class="card">
        <div class="card-header" v-if="title || subtitle">
            <h5 class="card-title" v-if="title">{{ title }}</h5>
            <p class="card-subtitle" v-if="subtitle">{{ subtitle }}.</p>
        </div>
        <div class="card-body">
            <slot/>
        </div>
    </div>
</template>
