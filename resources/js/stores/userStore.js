import { defineStore } from "pinia";
import axios from "@/lib/axios";

export const useUserStore = defineStore("user", {
    state: () => ({
        users: [],
        loading: false,
    }),
    actions: {
        async fetchUsers() {
            this.loading = true;
            const { data } = await axios.get("/api/admin/users");
            this.users = data;
            this.loading = false;
        },
        async deleteUser(id) {
            await axios.delete(`/api/admin/users/${id}`);
            this.users = this.users.filter((user) => user.id !== id);
        },
    },
});
