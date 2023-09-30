import { ref } from "vue";
import axios from "axios";
import {useRouter} from "vue-router";

export default function useTasks() {
    const task = ref([]);
    const tasks = ref([]);
    const router = useRouter();
    const errors = ref('');

    const getTask = async (id) => {
        let returnData = await axios.get('/api/tasks/' + id);

        task.value = returnData.data.data;
    };

    const getTasks = async () => {
        let returnData = await axios.get('/api/tasks');

        tasks.value = returnData.data.data;
    };

    const storeTask = async (data) => {
        errors.value = '';

        try {
            await axios.post('/api/tasks/', data);
            await router.push({
                name: 'tasks.index'
            });
        } catch (e) {
            if(e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    };

    const updateTask = async (id) => {
        errors.value = '';

        try {
            await axios.put('/api/tasks/'+ id, task.value);
            await router.push({
                name: 'tasks.index'
            });
        } catch (e) {
            if(e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    };

    const destroyTask = async (taskId) => {
        await axios.delete('/api/tasks/' + taskId);
    };

    return {
        task,
        tasks,
        errors,
        getTask,
        getTasks,
        storeTask,
        updateTask,
        destroyTask
    };
}
