<script setup>
defineProps({
    inputId: String,
    inputName: String,
    modelValue: {
        type: String,
        required: true,
        default: ""
    }
});
</script>

<template>
<input
    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    type="text"
    :id=inputId
    :name=inputName
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
/>
</template>

<style scoped>

</style>
