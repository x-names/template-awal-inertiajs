<script>
    import { Link, router, useForm } from '@inertiajs/vue3';
    import GuestLayout from '@/Shared/Layout/GuestLayout.vue';
    import AppHead from '../../Shared/Components/AppHead.vue';

    export default {
        setup() {
            const form = useForm({
                username: '',
                password: '',
                remember: false,
            });

            return {
                form,
            }
        },
        layout: GuestLayout, // Harus di define, berarti layoutout authenticated di app.js ga kepake
        components: {Link,AppHead},
    }
</script>
<template>
    <AppHead title="Login" />
    <div class="row h-100" slot="content">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="/"><img src="assets/compiled/svg/logo.svg" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Log in.</h1>

                <div class="alert alert-danger" v-if="form.hasErrors">
                    <ul class="list-unstyled mb-0">
                        <li v-for="message in form.errors" :key="message">{{ message }}</li>
                    </ul>
                </div>

                <form autocomplete="off" @submit.prevent="form.post('/login', { preserveState: true })">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" placeholder="Username" v-model="form.username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>


                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" placeholder="Password" v-model="form.password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>

                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" id="checkKeepMeLoggedIn" v-model="form.remember" name="remember">
                        <label class="form-check-label text-gray-600" for="checkKeepMeLoggedIn">
                            Keep me logged in
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit" :disabled="form.processing"
                    >Log in</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p><a class="font-bold" href="#">Forgot password?</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</template>

