<script setup>
defineProps({
    items: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <table class="min-w-full border divide-y divide-gray-200">
        <thead>
        <tr>
            <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        Title
                    </span>
            </th>
            <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        Status
                    </span>
            </th>
            <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        Completed
                    </span>
            </th>
            <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">
                        Date Completed
                    </span>
            </th>
            <th class="px-6 py-3 bg-gray-50">
            </th>
        </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
        <template v-for="task in items" :key="task.id">
            <tr class="bg-white text-center">
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    {{ task.title }}
                </td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    {{ task.status }}
                </td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    {{ task.completed ? "Yes" : "No" }}
                </td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    {{ task.completed_at ? task.completed_at : "-"}}
                </td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap flex place-content-end">
                    <router-link
                        :to="{name: 'tasks.edit', params: { id: task.id } }"
                        class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    >
                        Edit
                    </router-link>
                    <button
                        @click="deleteTask(task.id)"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete
                    </button>
                </td>
            </tr>
        </template>
        </tbody>
    </table>
</template>

<style scoped>

</style>
