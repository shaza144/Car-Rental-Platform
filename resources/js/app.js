import "./bootstrap";
import { createApp } from "vue";
import { createPinia } from "pinia";
import AdminApp from "./AdminPanel.vue";
import router from "./router"; // استيراد Vue Router

const app = createApp(AdminApp);
app.use(createPinia());
app.use(router);
app.mount("#app");
