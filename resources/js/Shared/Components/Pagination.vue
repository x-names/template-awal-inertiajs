<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    links: {
        type: Array,
        required: true
    },
    label: {
        type: String,
        default: 'Data'
    },
    total: {
        type: Number,
        default: 0
    },
    filtered: {
        type: Object,
        default: {
            from: 0,
            to: 0
        }
    }
})
</script>
<template>
    <!-- <p class="float-left">Total {{ label }}: {{ total }}</p> -->
    <!--  (disaring dari {{ filtered.from }}/{{ filtered.to }}) -->
    <template v-if="links.length > 3" class="float-right">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-primary justify-content-end">
                <template v-for="(link, i) in links" :key="i">
                    <li v-if="link.url === null" class="page-item disabled">
                        <span class="page-link" href="#" tabindex="-1" aria-disabled="true" v-html="link.label" />
                    </li>
                    <li v-else class="page-item" :class="{ 'active': link.active }">
                        <Link class="page-link" :href="link.url" v-html="link.label"  preserve-scroll/>
                    </li>
                </template>
            </ul>
        </nav>
    </template>
</template>
