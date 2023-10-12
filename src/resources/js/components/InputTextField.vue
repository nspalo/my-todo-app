<script setup>
// export default {
//     name: "InputTextField",
//     props: {
//         inputLabel: String,
//         inputName: String,
//         inputValue: {
//             type: String,
//             default: "",
//             required: true
//         }
//     }
// }

const props = defineProps({
    inputLabel: String,
    inputName: String,
    inputValue: {
        type: String,
        default: "",
        required: true
    }
});
</script>

<template>
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">{{ inputLabel }}</label>
        <div class="mt-1">
            <input
                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text"
                :name=inputName
                :value="inputValue"
                @input="$emit('update:inputValue', $event.target.value)"
            />
        </div>
    </div>
</template>

<style scoped>

</style>
