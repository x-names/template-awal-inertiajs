<script setup>
    defineProps({
        flash: {
            default: null
        }
    })
</script>
<template>
    <div v-if="flash" :class="`alert alert-${flash.type} alert-dismissible fade show`" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <h4 class="alert-heading">{{ flash.type == 'success' ? 'Berhasil' : 'Gagal' }}</h4>
        <p>{{ flash.message }}</p>
    </div>
</template>
