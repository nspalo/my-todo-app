<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
                <router-link class="text-sm font-medium"
                    :to="{name: 'tasks.create'}"
                >
                    Create Task
                </router-link>
            </div>
        </div>

        <DataTable :items="tasks" />
    </div>
</template>

<script>
import useTasks from "../../composables/tasks.js";
import { onMounted } from "vue";
import DataTable from "../DataTable.vue";

export default {
    components: {DataTable},
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
