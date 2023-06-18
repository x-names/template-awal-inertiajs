<script setup>
import { Link } from "@inertiajs/vue3";
import { Tooltip } from "bootstrap/dist/js/bootstrap.bundle";
import { defineProps, onMounted } from "vue";

defineProps({
    title: String,
    description: String,
    breadcrumb: {
        type: Array,
        default: () => [],
    },
});

onMounted(() => {
    new Tooltip(document.body, {
        selector: '[data-bs-toggle="tooltip"]',
        container: "body",
    });
});
</script>

<template #page-heading>
    <div class="page-heading mb-0">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-7 order-md-1 order-last">
                    <h3>
                        {{ title }}
                        <span><button type="button" class="btn btn-sm p-0" data-bs-toggle="tooltip" :title="description" style="margin-top: -6px;">
                                <i class="bi bi-question-circle-fill"></i></button></span>
                    </h3>
                </div>
                <div class="col-12 col-md-5 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <template v-for="item in breadcrumb" :key="item">
                                <li class="breadcrumb-item" v-if="item.currentPage" :class="{ active: item.currentPage }"
                                    :aria-current="item.currentPage">
                                    {{ item.title }}
                                </li>
                                <li class="breadcrumb-item" v-else>
                                    <template v-if="item.link">
                                        <Link :href="item.link">{{
                                            item.title
                                        }}</Link>
                                    </template>
                                    <template v-else>
                                        <span>{{ item.title }}</span>
                                    </template>
                                </li>
                            </template>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>
