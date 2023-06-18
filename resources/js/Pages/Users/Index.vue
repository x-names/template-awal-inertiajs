<script setup>
import { Link } from '@inertiajs/vue3'
import AppHead from '@/Shared/Components/AppHead.vue'
import PageHeading from '@/Shared/Components/PageHeading.vue'
import Card from '@/Shared/Components/Card.vue'
import TableIndex from '@/Shared/Components/Table/TableIndex.vue'
import Input from '@/Shared/Components/Form/Input.vue'
import Select from '@/Shared/Components/Form/Select.vue'
import FlashMessage from '@/Shared/Components/FlashMessage.vue'
import Pagination from '@/Shared/Components/Pagination.vue'
import SimplePagination from '@/Shared/Components/SimplePagination.vue'
import { ref, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import debounce from 'lodash/debounce'
import Layout from '@/Shared/Layout/MasterDataLayout.vue'

const options = [
    {
        label: '15',
        value: '15',
    },
    {
        label: '25',
        value: '25',
    },
    {
        label: '50',
        value: '50',
    },
    {
        label: '100',
        value: '100',
    }
]

const props = defineProps({
    users: Object,
    filters: Object,
    total_users: Number,
})

const search = ref(props.filters.search)
const perPage = ref(props.filters.per_page)

watch(search, debounce(function (value) {
    router.get(route('users.index'), { search: value }, { preserveScroll: true, preserveState: true, replace: true })
}, 300))
</script>

<template>
    <Layout>
        <AppHead title="Users" />
        <PageHeading :breadcrumb="[{ title: 'User', currentPage: true }]" title="User" description="User adalah semua pengguna terdaftar yang dapat mengakses aplikasi." />
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <FlashMessage :flash="$page?.props?.flash ?? ''" />
                    <Card class="mt-4">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <p class="float-left fw-bold m-0">Total Pengguna: {{ total_users }}</p>
                            </div>
                            <!-- <div class="col-md-1">
                                <Select label="Per Page" v-model="perPage" id="per-page" :options="options" />
                            </div> -->
                            <div class="col-md-5">
                                <Link :href="route('users.create')" class="btn btn-primary btn-sm float-end"><i class="bi bi-plus"></i>Tambahkan Pengguna Baru</Link>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <Input label="Cari Pengguna" :showLabel="false" v-model="search" id="search" type="search" :small="true" />
                        </div>

                        <TableIndex>
                            <template #thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>NISN/NPM/NIM/NIK</th>
                                    <th>Cabang</th>
                                    <th>Role</th>
                                    <th>No. Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Foto</th>
                                    <th>Tindakan</th>
                                </tr>
                            </template>
                            <template #tbody>
                                <tr v-if="users.data.length > 0" v-for="user in users.data" :key="user.id">
                                    <td>{{ user.username }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>
                                        <a :href="`mailto:${user.email}`" target="_blank">{{ user.email }}</a>
                                    </td>
                                    <td>{{ user.code }}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>{{ user.phone }}</td>
                                    <td>{{ user.gender == 'MALE' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    <td>
                                        <div class="avatar avatar-sm">
                                            <img :src="user.avatar" alt="Foto">
                                        </div>
                                    </td>
                                    <td>
                                        <Link :href="route('users.edit', user.id)" preserve-scroll preserve-state
                                            class="btn btn-outline-primary btn-sm me-1 mb-1">
                                        <i class="bi bi-pencil-square"></i>
                                        </Link>
                                        <Link :href="route('users.show', user.id)" preserve-scroll preserve-state
                                            class="btn btn-outline-success btn-sm me-1 mb-1">
                                        <i class="bi bi-eye"></i>
                                        </Link>
                                        <Link :href="route('users.destroy', user.id)"
                                            class="btn btn-outline-danger btn-sm me-1 mb-1">
                                        <i class="bi bi-trash"></i>
                                        </Link>
                                    </td>
                                </tr>
                                <tr v-else>
                                    <td colspan="10" class="text-center">Data pengguna tidak ditemukan.</td>
                                </tr>
                            </template>
                        </TableIndex>

                        <!-- <Pagination :links="users.links" label="Pengguna" :total="users.total" :filtered="{ from: users.from, to: users.to}" /> -->
                        <SimplePagination :nextPageUrl="users?.next_page_url ?? ''" :prevPageUrl="users?.prev_page_url ?? ''" />
                    </Card>
                </div>
            </div>
        </div>
    </Layout>
</template>
