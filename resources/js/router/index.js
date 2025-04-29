import { createRouter, createWebHistory } from "vue-router";

// استيراد الصفحات
import Login from "@/pages/Auth/Login.vue";
import Register from "@/pages/Auth/Register.vue";

// تحديد المسارات
const routes = [
    {
        path: "/login", // المسار الخاص بتسجيل الدخول
        name: "Login", // اسم المسار
        component: Login, // الصفحة التي سيتم عرضها عند الوصول إلى هذا المسار
    },
    {
        path: "/register", // المسار الخاص بالتسجيل
        name: "Register", // اسم المسار
        component: Register, // الصفحة التي سيتم عرضها عند الوصول إلى هذا المسار
    },
    {
        path: "/", // المسار الافتراضي
        redirect: "/login", // إعادة التوجيه إلى صفحة تسجيل الدخول كافتراضي
    },
];

// إنشاء الموجه
const router = createRouter({
    history: createWebHistory(), // استخدام خاصية الويب لتاريخ المسار
    routes, // المسارات المحددة
});

export default router;
