<script setup>
import AppHead from '@/Shared/Components/AppHead.vue'
import PageHeading from '@/Shared/Components/PageHeading.vue'
import Card from '@/Shared/Components/Card.vue'

import FlashMessage from '@/Shared/Components/FlashMessage.vue'
import Layout from '@/Shared/Layout/MasterDataLayout.vue'
</script>

<template>
    <Layout>
        <AppHead title="Classrooms" />
        <PageHeading :breadcrumb="[{ title: 'Classrooms', currentPage: true }]" title="Classrooms" description="Describe here" />
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <FlashMessage :flash="$page?.props?.flash ?? ''" />
                    <Card class="mt-4">
                        Halo from Classrooms
                    </Card>
                </div>
            </div>
        </div>
    </Layout>
</template>
