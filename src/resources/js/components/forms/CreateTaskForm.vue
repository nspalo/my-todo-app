<template>
<div id="createTaskForm" class="container">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">Create a task</div>

            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Task Title:</label>
                    <input
                        id="title"
                        class="form-control"
                        type="text"
                        aria-describedby="titleHelp"
                        v-model="task.title"
                    >
                    <div id="titleHelp" class="form-text">Enter Task Title</div>
                </div>

                <button
                    class="btn btn-primary"
                    type="submit"
                    @click="createTask()"
                >
                    Save
                </button>
            </div>

        </div>
    </div>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            task: {
                title: "",
                completed: false
            }
        }
    },
    methods: {
        createTask() {
            if(this.task.title === '') {
                return;
            }

            axios.post(
                '/api/task/store',
                {
                    task: this.task
                }
            ).then(response => {
                if(response.status === 201) {
                    this.task.title = '';
                    this.$emit('reloadTasks');
                }
            }).catch( error => {
                console.log(error);
            });
        }
    }
}
</script>
