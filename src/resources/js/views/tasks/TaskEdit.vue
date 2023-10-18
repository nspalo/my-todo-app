<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveTask">
        <div class="space-y-4 rounded-md shadow-sm">

            <InputGroupText
                input-id="title"
                input-label="Title"
                input-name="title"
                v-model="task.title"
            />

            <InputGroupCheckbox
                input-id="completed"
                input-label="Is Completed"
                input-name="completed"
                v-model="task.completed"
            />
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Save
        </button>
    </form>
</template>

<script>
import {onMounted, ref} from "vue";
import useTasks from "../../composables/tasks";
import InputGroupText from "../../components/FormFields/InputGroupText.vue";
import InputGroupCheckbox from "../../components/FormFields/InputGroupCheckbox.vue";

export default {
    components: {InputGroupCheckbox, InputGroupText},
    props: {
        id: {
            required: true,
            type: String
        },
        completed: {
            type: Boolean
        }
    },
    setup(props) {
        const { errors, task, showTask, updateTask } = useTasks();

        onMounted(
             () => {
                 showTask(props.id);
            }
        );

        const saveTask = async () => {
            await updateTask(props.id)
        };

        return {
            errors,
            task,
            saveTask
        };
    }
}
</script>
