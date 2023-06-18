<script setup>
import AppHead from '@/Shared/Components/AppHead.vue';
import PageHeading from '@/Shared/Components/PageHeading.vue'
import UserForm from './Form.vue'
</script>
<template>
    <AppHead title="Users" />
    <PageHeading :breadcrumb="[
        {
            title: 'Users',
            currentPage: false,
            link: route('users.index')
        },
        {
            title: 'Create',
            currentPage: true
        }
    ]" title="User" description="Tambahkan pengguna baru untuk mengakses aplikasi" />
    <div class="page-content">
        <UserForm :user="{}"/>
    </div>
</template>
