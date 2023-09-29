<template>
    <div class="container">
        <div v-for="(task, index) in tasks" :key="index">
            <task
                :task="task"
                v-on:taskChanged="$emit('reloadTasks')"
            />
        </div>
    </div>
</template>

<script>
import Task from "./Task.vue";

export default {
    props: ['tasks'],
    components: {
        Task
    }
}
</script>
