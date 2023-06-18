<script setup>
import { useForm } from '@inertiajs/vue3'
import Input from '@/Shared/Components/Form/Input.vue'
import Select from '@/Shared/Components/Form/Select.vue'
import Textarea from '@/Shared/Components/Form/Textarea.vue'
import Card from '@/Shared/Components/Card.vue'

const props = defineProps({
    user: Object,
})

const isEdit = props?.user?.id ? true : false

const form = useForm('CreateUser', {
    username: props?.user?.username ?? '',
    name: props?.user?.name ?? '',
    email: props?.user?.email ?? '',
    code: props?.user?.code ?? '',
    branch_id: '',
    role_id: '',
    password: '',
    password_confirmation: '' ?? '',
    birth_date: props?.user?.birth_date ?? '',
    birth_place: props?.user?.birth_place ?? '',
    gender: props?.user?.gender ?? '',
    address: props?.user?.address ?? '',
    phone: props?.user?.phone ?? '',
    avatar: '',
})

const submit = () => {
    if (isEdit) {
        form.put(route('users.update', props.user.id), {
            preserveScroll: true,
            onSuccess: () => {
                form.reset()
            },
            onFinish: () => {
                form.reset('password', 'password_confirmation')
            },
        })
    } else {
        form.post(route('users.store'), {
            preserveScroll: true,
            onSuccess: () => {
                form.reset()
            },
            onFinish: () => {
                form.reset('password', 'password_confirmation')
            },
        })
    }
}

const genderOptions = [
    {
        label: "Laki-laki",
        value: "MALE"
    },
    {
        label: "Perempuan",
        value: "FEMALE"
    },
]

const roleOptions = [
    {
        label: "Student",
        value: 1
    },
    {
        label: "Parent",
        value: 2
    },
    {
        label: "Teacher",
        value: 3
    },
]

const branchOptions = [
    {
        label: "SMK Maju Kena Mundur Kena",
        value: 1
    },
    {
        label: "SMK Maju Kena Mundur Kena II",
        value: 2
    },
]
</script>

<template>
    <div class="row mb-3">
        <form @submit.prevent="submit" novalidate>
            <div class="col-md-12">
                <!-- <div v-if="form.isDirty" class="alert alert-danger">There are unsaved form changes.</div> -->
                <Card title="Infromasi Dasar"
                    subtitle="Informasi yang wajib dimiliki oleh setiap pengguna untuk menggunakan aplikasi">
                    <div class="row">
                        <div class="col-md-4">
                            <Input v-model="form.username" :error="form.errors.username" id="username" label="Username"
                                required autofocus />
                        </div>

                        <div class="col-md-4">
                            <Input v-model="form.name" :error="form.errors.name" id="name" label="Name" />
                        </div>

                        <div class="col-md-4">
                            <Input v-model="form.email" :error="form.errors.email" id="email" label="Email" type="email" />
                        </div>

                        <div class="col-md-4">
                            <Input v-model="form.code" :error="form.errors.code" id="code" label="Code" type="number" />
                        </div>

                        <div class="col-md-4">
                            <Select id="branch-id" :options="branchOptions" label="Cabang" v-model="form.branch_id"
                                :error="form.errors.branch_id" />
                        </div>

                        <div class="col-md-4">
                            <Select id="role-id" :options="roleOptions" label="Role" v-model="form.role_id"
                                :error="form.errors.role_id" />
                        </div>
                    </div>
                </Card>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Password</h5>
                        <p class="card-subtitle">Buatlah password yang sulit ditebak dengan gabungan huruf, angka, atau
                            bahkan
                            simbol seperti: <small>!@#$%</small>.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <Input v-model="form.password" :error="form.errors.password" type="password" id="password"
                                    label="Password" />
                                <small class="fw-light" v-if="isEdit">Biarkan password dan password konfirmasi kosong jika
                                    tidak ingin menggantinya.</small>
                            </div>

                            <div class="col-md-6">
                                <Input v-model="form.password_confirmation" :error="form.errors.password_confirmation"
                                    id="password-confirmation" label="Konfirmasi Password" type="password" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informasi Tambahan</h5>
                        <p class="card-subtitle">Informasi yang bersifat opsional dan kamu dapat mengosongkannya.</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <Input v-model="form.phone" :error="form.errors.phone" id="phone" label="No. Telepon" />
                            </div>

                            <div class="col-md-4">
                                <Input v-model="form.birth_place" :error="form.errors.birth_place" id="birth_place"
                                    label="Tempat Lahir" />
                            </div>

                            <div class="col-md-4">
                                <Input v-model="form.birth_date" :error="form.errors.birth_date" id="birth_date"
                                    label="Tangal Lahir" type="date" />
                            </div>

                            <div class="col-md-4">
                                <Select id="gender" :options="genderOptions" label="Jenis Kelamin" v-model="form.gender"
                                    :error="form.errors.gender" />
                            </div>

                            <div class="col-md-4">
                                <Textarea id="address" label="Alamat" v-model="form.address" :error="form.errors.address" />
                            </div>

                            <div class="col-md-4">
                                <div class="row" v-if="isEdit">
                                    <div class="col-md-2">
                                        <div class="avatar avatar-xl">
                                            <img :src="user.avatar" alt="Avatar">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <Input v-model="form.avatar" :error="form.errors.avatar" id="avatar" label="Foto"
                                            type="file" />
                                        <small class="fw-light">Biarkan kosong jika tidak ingin diganti.</small>
                                    </div>
                                </div>
                                <Input v-model="form.avatar" :error="form.errors.avatar" id="avatar" label="Foto"
                                    type="file" v-else />
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="form.progress" class="progress progress-primary mb-4">
                    <div class="progress-bar progress-bar-striped" role="progressbar"
                        :aria-valuenow="form.progress.percentage" :style="`width: ${form.progress.percentage}%`"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <button type="submit" class="btn btn-primary" :disabled="form.processing">Submit</button>
            </div>
        </form>
    </div>
</template>
