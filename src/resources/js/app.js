require('./bootstrap');

require('alpinejs');

import { createApp } from "vue";
import router from "./router";
import TaskIndex from "./components/tasks/TaskIndex.vue";

createApp({
    components: {
        TaskIndex
    }
})
.use(router)
.mount("#app");
