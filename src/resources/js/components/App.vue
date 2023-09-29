<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">My To-Do List</div>

                    <div class="card-body">
                        <task-list
                            :tasks="tasks"
                            v-on:reloadTasks="listTasks()"
                        />
                    </div>
                </div>
            </div>

            <br />
            <create-task-form
                v-on:reloadTasks="listTasks()"
            />
        </div>
    </div>
</template>

<script>
import CreateTaskForm from "./forms/CreateTaskForm.vue";
import TaskList from "./tasks/TaskList.vue";

export default {
    components: {
        CreateTaskForm,
        TaskList,
    },
    data: function (){
        return {
            tasks: []
        }
    },
    methods: {
        listTasks() {
            axios.get(
                '/api/tasks'
            ).then(response => {
                this.tasks = response.data;
            }).catch(error => {
                console.log(error);
            });
        }
    },
    created() {
        this.listTasks();
    }
}
</script>
