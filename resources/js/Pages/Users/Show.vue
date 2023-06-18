<script setup>
import AppHead from '@/Shared/Components/AppHead.vue'
import PageHeading from '@/Shared/Components/PageHeading.vue'
import Card from '@/Shared/Components/Card.vue'
import TableDefault from '@/Shared/Components/Table/TableDefault.vue'

const props = defineProps({
    user: Object
})

const breadcrumb = [
    {
        title: 'Users',
        currentPage: false,
        link: route('users.index')
    },
    {
        title: props.user.name,
        currentPage: true
    }
]
</script>
<template>
    <AppHead title="Users" />
    <PageHeading :breadcrumb="breadcrumb" title="Detail User" description="Detail data pengguna" />
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <Card>
                    <TableDefault>
                        <tr>
                            <td colspan="2" class="text-center">
                                <div class="avatar avatar-xl">
                                    <img :src="user.avatar"
                                        alt="Avatar">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Name</td>
                            <td>{{ user.name }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Username</td>
                            <td>{{ user.username }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email</td>
                            <td>
                                <a :href="`mailto:${user.email}`" target="_blank">{{ user.email }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Role</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Branch</td>
                            <td>SMK Maju Kena Mundur Kena</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email verified at</td>
                            <td>
                                {{ user.email_verified_at ? user.email_verified_at : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Gender</td>
                            <td>{{ user?.gender }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tanggal Lahir</td>
                            <td>{{ user.birth_date }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tempat Lahir</td>
                            <td>{{ user.birth_place }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Alamat</td>
                            <td>{{ user.address }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Created at</td>
                            <td>{{ user.created_at }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Updated at</td>
                            <td>{{ user.updated_at }}</td>
                        </tr>
                    </TableDefault>
                </Card>
            </div>
        </div>
    </div>
</template>
