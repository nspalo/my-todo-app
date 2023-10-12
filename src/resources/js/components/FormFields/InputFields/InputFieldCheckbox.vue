<script>
export default {
    name: "InputFieldCheckbox",
    props: {
        inputId: String,
        inputName: String,
        modelValue: {
            type: Boolean,
            required: true,
            default: false
        }
    }
}
</script>

<template>
<input
    class="block mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    type="checkbox"
    :id=inputId
    :name=inputName
    :checked="modelValue"
    v-model="modelValue"
    @input="$emit('update:modelValue', $event.target.checked)"
/>
</template>

<style scoped>

</style>
