import { createRouter, createWebHistory } from "vue-router";
import LayoutAdmin from "@/Layouts/LayoutAdmin.vue";
import AdminDashboard from "@/views/AdminView/AdminDashboard.vue";
import AdminExport from "@/views/AdminView/AdminExport.vue";
import AdminStaff from "@/views/AdminView/AdminStaff.vue";
import AdminAppointments from "@/views/AdminView/AdminAppointments.vue";
import AdminCustomers from "@/views/AdminView/AdminCustomers.vue";
import AdminInventory from "@/views/AdminView/AdminInventory.vue";
import AdminPayments from "@/views/AdminView/AdminPayments.vue";
import AdminStaffList from "@/views/AdminView/AdminStaffList.vue";
import AdminStaffAdd from "@/views/AdminView/AdminStaffAdd.vue";
import AdminStaffEdit from "@/views/AdminView/AdminStaffEdit.vue";
import AdminCustomersList from "@/views/AdminView/AdminCustomersList.vue";
import AdminCustomersAdd from "@/views/AdminView/AdminCustomersAdd.vue";
import AdminCustomersEdit from "@/views/AdminView/AdminCustomersEdit.vue";
import AdminInventoryList from "@/views/AdminView/AdminInventoryList.vue";
import AdminInventoryAdd from "@/views/AdminView/AdminInventoryAdd.vue";
import AdminAppointmentsList from "@/views/AdminView/AdminAppointmentsList.vue";
import AdminAppointmentsAdd from "@/views/AdminView/AdminAppointmentsAdd.vue";
import AdminAppointmentsEdit from "@/views/AdminView/AdminAppointmentsEdit.vue";
import AdminPermission from "@/views/AdminView/AdminPermission.vue";
import LoginView from "@/views/LoginView.vue";
import RegisterView from "@/views/RegisterView.vue";
import AdminService from "@/views/AdminView/AdminService.vue";


const routes = [
  {
    path: "/",
    component: LayoutAdmin,
    children: [
      {
        path: "dashboard",
        name: "dashboard",
        component: AdminDashboard,
      },
      {
        path: "export",
        name: "export",
        component: AdminExport,
      },
      {
        path: "services",
        name: "services",
        component: AdminService,
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
        path: "staff-edit/:id",
        name: "staff-edit",
        component: AdminStaffEdit,
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
        path: "appointments-edit/:id",
        name: "appointments-edit",
        component: AdminAppointmentsEdit,
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
        path: "customers-edit/:id",
        name: "customers-edit",
        component: AdminCustomersEdit,
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
      {
        path: "permissions",
        name: "permissions",
        component: AdminPermission,
      }
    ]
  },
  {
    path: "/login",
    name: "login",
    component: LoginView,
  },
  {
    path: "/register",
    name: "register",
    component: RegisterView,
  },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
