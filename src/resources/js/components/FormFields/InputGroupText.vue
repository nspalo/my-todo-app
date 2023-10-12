<script>
import InputFieldText from "./InputFields/InputFieldText.vue";

export default {
    name: "InputGroupText",
    components: {InputFieldText},
    props: {
        inputId: String,
        inputLabel: String,
        inputName: String,
        modelValue: String,
    }
}
</script>

<template>
    <div>
        <label :for=inputId class="block text-sm font-medium text-gray-700">{{ inputLabel }}</label>
        <div class="mt-1">
            <InputFieldText
                :input-id=inputId
                :input-name=inputName
                :model-value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
            />
        </div>
    </div>
</template>

<style scoped>

</style>
