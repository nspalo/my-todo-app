<script>
import InputFieldCheckbox from "./InputFields/InputFieldCheckbox.vue";

export default {
    name: "InputGroupCheckbox",
    components: {InputFieldCheckbox},
    props: {
        inputId: String,
        inputLabel: String,
        inputName: String,
        modelValue: Boolean,
    }
}
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
            <!--
            <input
                class="block mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="checkbox"
                id="completed"
                name="completed"
                :checked="modelValue"
                v-model="modelValue"
                @change="$emit('update:modelValue', $event.target.value)"
            />
            -->
        </div>
    </div>
</template>

<style scoped>

</style>
