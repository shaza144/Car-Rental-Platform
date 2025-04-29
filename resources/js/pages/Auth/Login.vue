<!-- src/pages/Login.vue -->

<template>
    <div class="login-container">
        <h2>Login</h2>
        <form @submit.prevent="login">
            <div>
                <label for="email">Email</label>
                <input v-model="email" type="email" id="email" placeholder="Enter your email" required />
            </div>
            <div>
                <label for="password">Password</label>
                <input v-model="password" type="password" id="password" placeholder="Enter your password" required />
            </div>
            <button type="submit">Login</button>
        </form>
        <p v-if="errorMessage" class="error-message">{{ errorMessage }}</p>
        <p>Don't have an account? <router-link to="/register">Register here</router-link></p>
    </div>
</template>

<script>
import { useAuthStore } from '@/store/auth'; // استيراد متجر Pinia
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
    data() {
        return {
            email: '',
            password: '',
            errorMessage: '',
        };
    },
    methods: {
        async login() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/auth/login', {
                    email: this.email,
                    password: this.password,
                });
                const token = response.data.token;
                const authStore = useAuthStore();
                authStore.setToken(token); // حفظ الـ token في Pinia
                this.$router.push('/dashboard'); // التوجيه إلى الصفحة الرئيسية بعد تسجيل الدخول
            } catch (error) {
                this.errorMessage = 'Invalid credentials'; // عرض رسالة خطأ إذا كانت البيانات غير صحيحة
            }
        },
    },
};
</script>

<style scoped>
/* إضافة بعض الأنماط الأساسية لتنسيق صفحة تسجيل الدخول */
.login-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}

.error-message {
    color: red;
}
</style>
