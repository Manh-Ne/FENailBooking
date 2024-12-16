import { createRouter, createWebHistory } from "vue-router";
import LayoutAdmin from "@/Layouts/LayoutAdmin.vue";
import AdminDashboard from "@/views/AdminView/AdminDashboard.vue";
import AdminOwner from "@/views/AdminView/AdminOwner.vue";
import AdminStaff from "@/views/AdminView/AdminStaff.vue";

const routes = [
  {
    path: "/admin",
    component: LayoutAdmin,
    children: [
      {
        path: "dashboard",
        name: "dashboard",
        component: AdminDashboard,
      },
      {
        path: "owner",
        name: "owner",
        component: AdminOwner,
      },
      {
        path: "staff",
        name: "staff",
        component: AdminStaff,
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
