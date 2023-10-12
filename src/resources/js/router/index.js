import { createRouter, createWebHistory } from "vue-router";

import TaskIndex from "../views/tasks/TaskIndex.vue";
import TaskCreate from "../views/tasks/TaskCreate.vue";
import TaskEdit from "../views/tasks/TaskEdit.vue";

const routes = [
    {
        path: '/dashboard',
        name: 'tasks.index',
        component: TaskIndex
    },
    {
        path: '/tasks/create',
        name: 'tasks.create',
        component: TaskCreate
    },
    {
        path: '/tasks/:id/edit',
        name: 'tasks.edit',
        component: TaskEdit,
        props: true
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
});
