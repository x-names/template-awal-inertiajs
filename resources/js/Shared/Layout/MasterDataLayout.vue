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
                                <Link class="btn d-contents btn-block text-start gap-2" :class="{'btn-primary': $page.component == 'AnotherPage/Index'}" :href="route('another-page.index')"><i class="bi bi-journal-bookmark me-3"></i><span class="text-sm">Another Page</span></Link>
                            </div>
                            <div class="list-group-item bg-transparent border-0 p-0">
                                <Link class="btn d-contents btn-block text-start gap-2" :class="{'btn-primary': $page.component == 'Users/Index'}" :href="route('users.index')"><i class="bi bi-person-lines-fill me-3"></i><span class="text-sm">Pengguna</span></Link>
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
