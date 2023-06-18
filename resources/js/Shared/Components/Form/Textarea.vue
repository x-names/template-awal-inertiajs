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
    }
})

defineEmits(['update:modelValue']);

const textarea = ref(null);

onMounted(() => {
    if (textarea.value.hasAttribute('autofocus')) {
        textarea.value.focus();
    }
});
</script>
<template>
    <div class="form-group">
        <label for="addresss">{{ label }}</label>
        <textarea :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :id="id"
            :class="error ? 'form-control is-invalid' : 'form-control'" ref="textarea" :placeholder="label"></textarea>
    </div>
</template>