<template>
    <div class="p-6">
      <h1 class="text-2xl font-semibold mb-4">إدارة المستخدمين</h1>

      <div v-if="loading" class="text-gray-500">جاري التحميل...</div>

      <table v-else class="w-full text-sm bg-white shadow rounded-lg">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-3 text-right">الاسم</th>
            <th class="p-3 text-right">الإيميل</th>
            <th class="p-3 text-right">الصلاحيات</th>
            <th class="p-3 text-right">إجراء</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id" class="border-b hover:bg-gray-50">
            <td class="p-3">{{ user.name }}</td>
            <td class="p-3">{{ user.email }}</td>
            <td class="p-3">{{ user.roles.join(', ') }}</td>
            <td class="p-3">
              <button @click="deleteUser(user.id)" class="text-red-500 hover:underline">حذف</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script setup>
  import { onMounted } from 'vue'
  import { useUserStore } from '@/stores/userStore'

  const userStore = useUserStore()
  const { fetchUsers, deleteUser, users, loading } = userStore

  onMounted(fetchUsers)
  </script>
