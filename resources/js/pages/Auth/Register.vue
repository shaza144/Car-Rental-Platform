<!-- src/pages/Register.vue -->

<template>
    <div class="register-container">
        <h2>Register</h2>
        <form @submit.prevent="register">
            <div>
                <label for="name">Name</label>
                <input v-model="name" type="text" id="name" placeholder="Enter your name" required />
            </div>
            <div>
                <label for="email">Email</label>
                <input v-model="email" type="email" id="email" placeholder="Enter your email" required />
            </div>
            <div>
                <label for="password">Password</label>
                <input v-model="password" type="password" id="password" placeholder="Enter your password" required />
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input v-model="password_confirmation" type="password" id="password_confirmation"
                    placeholder="Confirm your password" required />
            </div>
            <button type="submit">Register</button>
        </form>
        <p v-if="errorMessage" class="error-message">{{ errorMessage }}</p>
        <p>Already have an account? <router-link to="/login">Login here</router-link></p>
    </div>
</template>

<script>
import { useAuthStore } from '@/store/auth'; // استيراد متجر Pinia
import axios from 'axios';
import { useRouter } from 'vue-router';

export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            errorMessage: '',
        };
    },
    methods: {
        async register() {
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/auth/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                });
                const token = response.data.token;
                const authStore = useAuthStore();
                authStore.setToken(token); // حفظ الـ token في Pinia
                this.$router.push('/dashboard'); // التوجيه إلى الصفحة الرئيسية بعد التسجيل
            } catch (error) {
                this.errorMessage = error.response?.data?.message || 'Registration failed'; // عرض رسالة خطأ إذا حدثت مشكلة في التسجيل
            }
        },
    },
};
</script>

<style scoped>
/* إضافة بعض الأنماط الأساسية لتنسيق صفحة التسجيل */
.register-container {
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
