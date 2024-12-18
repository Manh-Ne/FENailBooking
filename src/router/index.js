import { createRouter, createWebHistory } from "vue-router";
import LayoutAdmin from "@/Layouts/LayoutAdmin.vue";
import AdminDashboard from "@/views/AdminView/AdminDashboard.vue";
import AdminOwner from "@/views/AdminView/AdminOwner.vue";
import AdminStaff from "@/views/AdminView/AdminStaff.vue";
import AdminAppointments from "@/views/AdminView/AdminAppointments.vue";
import AdminCustomers from "@/views/AdminView/AdminCustomers.vue";
import AdminInventory from "@/views/AdminView/AdminInventory.vue";
import AdminPayments from "@/views/AdminView/AdminPayments.vue";
import AdminStaffList from "@/views/AdminView/AdminStaffList.vue";
import AdminStaffAdd from "@/views/AdminView/AdminStaffAdd.vue";

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
      {
        path: "staff-list",
        name: "staff-list",
        component: AdminStaffList,
      },
      {
        path: "staff-add",
        name: "staff-add",
        component: AdminStaffAdd,
      },
      {
        path: "appointments",
        name: "appointments",
        component: AdminAppointments,
      },
      {
        path: "customers",
        name: "customers",
        component: AdminCustomers,
      },
      {
        path: "inventory",
        name: "inventory",
        component: AdminInventory,
      },
      {
        path: "payments",
        name: "payments",
        component: AdminPayments,
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
