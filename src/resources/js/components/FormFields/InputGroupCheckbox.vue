<script setup>
import InputFieldCheckbox from "./InputFields/InputFieldCheckbox.vue";

defineProps({
    inputId: String,
    inputLabel: String,
    inputName: String,
    modelValue: Boolean,
});
</script>

<template>
    <div>
        <label :for=inputId class="block text-sm font-medium text-gray-700">{{ inputLabel }}</label>
        <div class="mt-1">

            <InputFieldCheckbox
                :input-id=inputId
                :input-name=inputName
                :model-value="modelValue"
                @input="$emit('update:modelValue', $event.target.checked)"
            />

        </div>
    </div>
</template>

<style scoped>

</style>
