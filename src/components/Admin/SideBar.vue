<template>
  <div class="sidebar-menu">
    <n-menu
      :options="menuOptions"
      @update:value="handleMenuSelect"
      :collapsed="!isSidebarOpen"
      theme="dark"
      :theme-overrides="themeOverrides"
    />
  </div>
</template>

<script>
import { h, ref } from "vue";
import { NMenu } from "naive-ui";
import { useRouter } from "vue-router";

export default {
  name: "SideBarMenu",
  components: {
    NMenu,
  },
  props: {
    isSidebarOpen: {
      type: Boolean,
      required: true,
    },
  },
  setup() {
    const router = useRouter();

    const renderArrow = (expanded) => {
      return h("i", {
        class: expanded ? "fa fa-angle-down" : "fa fa-angle-right",
        style: { marginRight: "8px", color: "white", },
      });
    };

    const renderDot = () => {
      return h("i", {
        class: "fa fa-circle",
        style: { fontSize: "8px", marginRight: "8px", color: "white", },
      });
    };

    const menuOptions = ref([
      {
        label: () =>
          h("span", {}, [
            h("i", { class: "fa fa-home", style: "margin-right: 8px;" }),
            "Dashboard",
          ]),
        key: "dashboard",
      },

      {
        label: () =>
          h("span", {}, [
            h("i", { class: "fa fa-user", style: "margin-right: 8px;" }),
            "Chủ cửa hàng",
          ]),
        key: "owner",
      },
// Quản lý nhân viên
      {
        label: () =>
          h("div", [
            h("i", { class: "fa fa-users", style: { marginRight: "8px" } }),
            "Quản lý nhân viên",
          ]),
        key: "staff",
        children: [
          {
            label: "Danh sách nhân viên",
            key: "staff-list",
            icon: () =>
              h("i", {
                class: "fa fa-circle",
                style: { fontSize: "8px", marginRight: "8px" },
              }),
          },
          {
            label: "Thêm nhân viên",
            key: "staff-add",
            icon: () =>
              h("i", {
                class: "fa fa-circle",
                style: { fontSize: "8px", marginRight: "8px" },
              }),
          },
        ],
      },
// Quản lí khách hàng
      {
        label: () =>
          h("div", {}, [
            h("i", {
              class: "fa fa-address-book",
              style: "margin-right: 8px;",
            }),
            "Quản lý khách hàng",
          ]),
        key: "customers",
        children: [
          {
            label: "Danh sách khách hàng",
            key: "customers-list",
            icon: () =>
              h("i", {
                class: "fa fa-circle",
                style: { fontSize: "8px", marginRight: "8px" },
              }),
          },
          {
            label: "Thêm khách hàng",
            key: "customers-add",
            icon: () =>
              h("i", {
                class: "fa fa-circle",
                style: { fontSize: "8px", marginRight: "8px" },
              }),
          },
        ]
      },
// Quản lý lịch hẹn
      {
        label: () =>
          h("div", {}, [
            h("i", {
              class: "fa fa-calendar-alt",
              style: "margin-right: 8px;",
            }),
            "Quản lý lịch hẹn",
          ]),
        key: "appointments",
        children: [
          {
            label: "Danh sách lịch hẹn",
            key: "appointments-list",
            icon: () =>
              h("i", {
                class: "fa fa-circle",
                style: { fontSize: "8px", marginRight: "8px" },
              }),
          },
          {
            label: "Thêm lịch hẹn",
            key: "appointments-add",
            icon: () =>
              h("i", {
                class: "fa fa-circle",
                style: { fontSize: "8px", marginRight: "8px" },
              }),
          },
        ],
      },
// Quản lí tồn kho
      {
        label: () =>
          h("span", {}, [
            h("i", { class: "fa fa-boxes", style: "margin-right: 8px;" }),
            "Quản lý tồn kho",
          ]),
        key: "inventory",
        children: [
          {
            label: "Danh sách sản phẩm",
            key: "inventory-list",
            icon: () =>
              h("i", {
                class: "fa fa-circle",
                style: { fontSize: "8px", marginRight: "8px" },
              }),
          },
          {
            label: "Thêm sản phẩm",
            key: "inventory-add",
            icon: () =>
              h("i", {
                class: "fa fa-circle",
                style: { fontSize: "8px", marginRight: "8px" },
              }),
          },
        ],
      },


      {
        label: () =>
          h("span", {}, [
            h("i", { class: "fa fa-credit-card", style: "margin-right: 8px;" }),
            "Quản lý thanh toán",
          ]),
        key: "payments",
      },
    ]);

    const handleMenuSelect = (key) => {
      router.push({ name: key });
    };

    const themeOverrides = {
      itemTextColor: "#fff",
      itemTextColorHover: "#0073e6",
      arrowColor: "white",
      dotColor: "white",
    };

    return {
      menuOptions,
      handleMenuSelect,
      themeOverrides,
    };
  },
};
</script>

<style scoped>
.sidebar-menu {
  height: 100%;
  background-color: #1f2937;
  color: white;
  overflow-y: auto;
}

.n-menu-item {
  padding: 12px 15px;
  font-size: 16px;
}

.n-menu-item:hover {
  background-color: #0073e6;
}

.fa {
  color: white;
}

.fa-circle {
  font-size: 8px;
  background-color: white;
}
</style>
