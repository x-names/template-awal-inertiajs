<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    label: String,
    modelValue: {
        type: String,
        required: true
    },
    error: {
        type: String,
        default: null
    },
    id: {
        type: String,
        default: null
    },
    options: {
        type: Array,
        default: () => []
    }
})

defineEmits(['update:modelValue']);

const select = ref('');

onMounted(() => {
    if (select.value.hasAttribute('autofocus')) {
        select.value.focus();
    }
});
</script>

<template>
    <div class="form-group">
        <label :for="id">{{ label }}</label>
        <select @change="$emit('update:modelValue', $event.target.value)" :id="id" :class="error ? 'form-select is-invalid' : 'form-select'"
            ref="select" :value="modelValue">
            <option selected disabled value="">Pilih {{ label }}</option>
            <option v-for="option in options" :key="option.value" :value="option.value">
                {{ option.label }}</option>
        </select>
        <span v-if="error" class="text-danger">{{ error }}</span>
    </div>
</template>
