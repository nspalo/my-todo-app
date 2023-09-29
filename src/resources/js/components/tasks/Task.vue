<template>
    <div class="todo">
        <input
            class="form-check-input"
            type="checkbox"
            @change="updateTask()"
            v-model="task.completed"
        >
        <span :class="[task.completed ? 'completed' : '', 'todo-item']">{{ task.title }}</span>
        <button
            class="btn btn-primary"
            type="button"
            @click="deleteTask()"
        >
            delete
        </button>
    </div>
</template>

<script>
export default {
    props: ['task'],
    methods: {
        updateTask() {
            axios.put('/api/task/' + this.task.id, {
                task: this.task
            }).then(response => {
                if(response.status === 200) {
                    this.$emit('taskChanged');
                }
            }).catch( error => {
                console.log(error);
            });
        },
        deleteTask() {
            axios.delete(
                '/api/task/' + this.task.id
            ).then(response => {
                if(response.status === 200) {
                    this.$emit('taskChanged');
                }
            }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<style scoped>
.completed {
    text-decoration: line-through;
    color: #5c636a;
}

.todo-item {
    width: 100%;
    margin-left: 20px;
}

.todo {
    display: flex;
    justify-items: center;
    align-items: center;
}
</style>
