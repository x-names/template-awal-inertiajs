<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    nextPageUrl: {
        type: String,
        default: null
    },
    prevPageUrl: {
        type: String,
        default: null
    }
})
</script>
<template>
    <div class="d-flex justify-content-end">
        <nav aria-label="Page simple navigation">
            <ul class="pagination pagination-sm">
                <li class="page-item">
                    <Link :class="prevPageUrl ? 'page-link' : 'page-link disabled'" :href="prevPageUrl" preserve-scroll
                        preserve-state>
                        <span aria-hidden="true">
                            <i class="bi bi-chevron-double-left"></i>
                        </span>
                    </Link>
                </li>
                <li class="page-item">
                    <Link :class="nextPageUrl ? 'page-link' : 'page-link disabled'" :href="nextPageUrl" preserve-scroll
                        preserve-state>
                    <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                    </Link>
                </li>
            </ul>
        </nav>
    </div>
</template>
