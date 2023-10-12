<script>
export default {
    name: "InputTextField",
    props: {
        inputId: String,
        inputLabel: String,
        inputName: String,
        modelValue: String,
        // inputValue: {
        //     type: String,
        //     default: "",
        //     required: true
        // }
    }
}

// const props = defineProps({
//     inputId: String,
//     inputLabel: String,
//     inputName: String,
//     inputValue: {
//         type: String,
//         default: "",
//         required: true
//     }
// });

// defineProps({
//     inputId: String,
//     inputLabel: String,
//     inputName: String,
//     modelValue: String,
//     // inputValue: {
//     //     type: String,
//     //     default: "",
//     //     required: true
//     // }
// });
</script>

<template>
    <!--
    <div>
        <label :for=inputId class="block text-sm font-medium text-gray-700">{{ inputLabel }}</label>
        <div class="mt-1">
            <input
                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text"
                :id=inputId
                :name=inputName
            >
        </div>
    </div>
    -->

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
