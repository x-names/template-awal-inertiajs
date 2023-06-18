<script>
import AuthenticatedLayout from "@/Shared/Layout/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/vue3";

export default {
    layout: AuthenticatedLayout,
    components: { Link }
};
</script>
<template>
    <div class="page-content">
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="position: sticky; top: 11vh;">
                    <div class="card-body">
                        <ul class="list-group">
                            <div class="list-group-item bg-transparent border-0 p-0">
                                <Link class="btn d-contents btn-block text-start gap-2" :class="{'btn-primary': $page.url.startsWith('/master-data/companies')}" :href="route('companies.index')"><i class="bi bi-person me-3"></i><span class="text-sm">Informasi Sekolah</span></Link>
                            </div>
                            <div class="list-group-item bg-transparent border-0 p-0">
                                <Link class="btn d-contents btn-block text-start gap-2" :class="{'btn-primary': $page.url.startsWith('/master-data/branches')}" :href="route('branches.index')"><i class="bi bi-diagram-2 me-3"></i><span class="text-sm">Cabang</span></Link>
                            </div>
                            <div class="list-group-item bg-transparent border-0 p-0">
                                <Link class="btn d-contents btn-block text-start gap-2" :class="{'btn-primary': $page.url.startsWith('/master-data/academic-years')}" :href="route('academic-years.index')" ><i class="bi bi-calendar-week me-3"></i><span class="text-sm">Tahun Akademik</span></Link>
                            </div>
                            <div class="list-group-item bg-transparent border-0 p-0">
                                <Link class="btn d-contents btn-block text-start gap-2" :class="{'btn-primary': $page.url.startsWith('/master-data/grades')}" :href="route('grades.index')"><i class="bi bi-collection me-3"></i><span class="text-sm">Kelas</span></Link>
                            </div>
                            <div class="list-group-item bg-transparent border-0 p-0">
                                <Link class="btn d-contents btn-block text-start gap-2" :class="{'btn-primary': $page.url.startsWith('/master-data/classrooms')}" :href="route('classrooms.index')"><i class="bi bi-person-badge me-3"></i><span class="text-sm">Ruang Kelas</span></Link>
                            </div>
                            <div class="list-group-item bg-transparent border-0 p-0">
                                <Link class="btn d-contents btn-block text-start gap-2" :class="{'btn-primary': $page.url.startsWith('/master-data/subjects')}" :href="route('subjects.index')"><i class="bi bi-journal-bookmark me-3"></i><span class="text-sm">Mata Pelajaran</span></Link>
                            </div>
                            <div class="list-group-item bg-transparent border-0 p-0">
                                <Link class="btn d-contents btn-block text-start gap-2" :class="{'btn-primary': $page.url.startsWith('/master-data/users')}" :href="route('users.index')"><i class="bi bi-person-lines-fill me-3"></i><span class="text-sm">Pengguna</span></Link>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <slot />
            </div>
        </div>
    </div>
</template>
