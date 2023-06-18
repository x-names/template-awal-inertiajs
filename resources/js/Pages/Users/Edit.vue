<script setup>
import AppHead from '@/Shared/Components/AppHead.vue'
import PageHeading from '@/Shared/Components/PageHeading.vue'
import UserForm from './Form.vue'

const props = defineProps({ user: Object })

const breadcrumb = [
        {
            title: 'Users',
            currentPage: false,
            link: route('users.index')
        },
        {
            title: props.user.name,
            currentPage: false,
            link: route('users.show', props.user.id)
        },
        {
            title: 'Edit',
            currentPage: true
        }
    ]
</script>
<template>
    <AppHead title="Users" />
    <PageHeading :breadcrumb="breadcrumb" title="User" description="Tambahkan pengguna baru untuk mengakses aplikasi" />
    <div class="page-content">
        <UserForm :user="user"/>
    </div>
</template>
