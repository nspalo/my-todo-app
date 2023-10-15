<script>
import useTasks from "../composables/tasks";
import { onMounted } from "vue";

export default {
    props: {
        tasks: {
            type: Array,
            required: true
        }
    },
    setup() {
        const { tasks, getTasks, destroyTask } = useTasks();

        const deleteTask = async (taskId) => {
            if (!window.confirm('Are you sure?')) {
                return;
            }

            await destroyTask(taskId);
            await getTasks();
        };

        onMounted(getTasks);

        return {
            tasks,
            deleteTask
        };
    }
}
</script>

<template>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
            <div>
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    <span class="sr-only">Status</span>
                    Status
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Task Status Here</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                    </div>
                </div>
            </div>

            <!-- Search Box -->
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
            </div>

        </div>

        <!-- Data Table -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 divide-y divide-gray-200">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Completed
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Completed
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Updated
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Created
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="task in tasks" :key="task.id">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            :id="task.id"
                            type="checkbox"
                        >
                        <label
                            v-bind:for="task.id"
                            class="sr-only"
                        >checkbox</label>
                    </div>
                </td>
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
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    {{ task.updated_at ? task.updated_at : "-"}}
                </td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    {{ task.created_at ? task.created_at : "-"}}
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
    </div>

</template>

<style scoped>

</style>
