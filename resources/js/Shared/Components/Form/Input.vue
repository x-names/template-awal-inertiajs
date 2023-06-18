<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    label: String,
    modelValue: {
        type: [String, File],
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    error: {
        type: String,
        default: null
    },
    id: {
        type: String,
        default: null
    },
    small: {
        type: Boolean,
        default: false
    },
    showLabel: {
        type: Boolean,
        default: true
    }
})

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>

<template>
    <div class="form-group">
        <label :for="id" v-if="showLabel">{{ label }}</label>
        <input :type="type" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :id="id"
            :class="error ? 'form-control is-invalid' : 'form-control'" ref="input" :placeholder="label"
            v-if="type != 'file'">
        <input type="file" :value="modelValue" @input="$emit('update:modelValue', $event.target.files[0])" :id="id"
            :class="error ? 'form-control is-invalid' : 'form-control'" ref="input" :placeholder="label" v-else>
        <span v-if="error" class="text-danger">{{ error }}</span>
    </div>
</template>
