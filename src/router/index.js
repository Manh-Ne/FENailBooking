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
import AdminCustomersList from "@/views/AdminView/AdminCustomersList.vue";
import AdminCustomersAdd from "@/views/AdminView/AdminCustomersAdd.vue";
import AdminInventoryList from "@/views/AdminView/AdminInventoryList.vue";
import AdminInventoryAdd from "@/views/AdminView/AdminInventoryAdd.vue";
import AdminAppointmentsList from "@/views/AdminView/AdminAppointmentsList.vue";
import AdminAppointmentsAdd from "@/views/AdminView/AdminAppointmentsAdd.vue";

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
        path: "appointments-list",
        name: "appointments-list",
        component: AdminAppointmentsList,
      },
      {
        path: "appointments-add",
        name: "appointments-add",
        component: AdminAppointmentsAdd,
      },
      {
        path: "customers",
        name: "customers",
        component: AdminCustomers,
      },
      {
        path: "customers-list",
        name: "customers-list",
        component: AdminCustomersList,
      },
      {
        path: "customers-add",
        name: "customers-add",
        component: AdminCustomersAdd,
      },
      {
        path: "inventory",
        name: "inventory",
        component: AdminInventory,
      },
      {
        path: "inventory-list",
        name: "inventory-list",
        component: AdminInventoryList,
      },
      {
        path: "inventory-add",
        name: "inventory-add",
        component: AdminInventoryAdd,
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
