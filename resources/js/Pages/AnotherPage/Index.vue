<script setup>
import AppHead from '@/Shared/Components/AppHead.vue'
import PageHeading from '@/Shared/Components/PageHeading.vue'
import Card from '@/Shared/Components/Card.vue'

import FlashMessage from '@/Shared/Components/FlashMessage.vue'
import Layout from '@/Shared/Layout/MasterDataLayout.vue'
</script>

<template>
    <Layout>
        <AppHead title="Another Page" />
        <PageHeading :breadcrumb="[{ title: 'Another Page', currentPage: true }]" title="Another Page" description="Describe here" />
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <FlashMessage :flash="$page?.props?.flash ?? ''" />
                    <Card class="mt-4">
                        Halo from another Page
                    </Card>
                </div>
            </div>
        </div>
    </Layout>
</template>
