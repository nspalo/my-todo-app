require('./bootstrap');

require('alpinejs');

import { createApp } from "vue";
import router from "./router";
import TaskIndex from "./views/tasks/TaskIndex.vue";

createApp({
    components: {
        TaskIndex
    }
})
.use(router)
.mount("#app");
