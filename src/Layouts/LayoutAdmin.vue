<template>
  <n-layout class="layout-admin">
    <!-- Header -->
    <n-layout-header class="header">
      <HeaderAdmin />
    </n-layout-header>

    <!-- Main Layout -->
    <n-layout has-sider>
      <!-- Sidebar -->
      <n-layout-sider :collapsed="collapsed" class="sidebar">
        <div class="toggle-icon" @click="toggleSidebar">
          <n-icon size="24">
            <i class="fa fa-bars"></i>
          </n-icon>
        </div>

        <!-- Sidebar Menu -->
        <div v-if="!collapsed" class="sidebar-menu">
          <SideBarMenu :isSidebarOpen="!collapsed" />
        </div>
      </n-layout-sider>

      <!-- Main Content -->
      <n-layout-content class="main-content">
        <router-view />
      </n-layout-content>
    </n-layout>
  </n-layout>
</template>

<script>
import { defineComponent, ref } from "vue";
import {
  NLayout,
  NLayoutSider,
  NLayoutHeader,
  NLayoutContent,
  NIcon,
} from "naive-ui";
import SideBarMenu from "@/components/Admin/SideBar.vue";
import HeaderAdmin from "@/components/Admin/Header.vue";

export default defineComponent({
  name: "LayoutAdmin",
  components: {
    NLayout,
    NLayoutSider,
    NLayoutHeader,
    NLayoutContent,
    NIcon,
    SideBarMenu,
    HeaderAdmin,
  },
  setup() {
    const collapsed = ref(true);

    const toggleSidebar = () => {
      collapsed.value = !collapsed.value;
    };

    return {
      collapsed,
      toggleSidebar,
    };
  },
});
</script>

<style scoped>
.layout-admin {
  height: 100vh;
  display: flex;
  flex-direction: column;
}

.header {
  height: 64px;
  background-color: #f4f4f4;
  color: white;
  display: flex;
  align-items: center;
  padding: 0 20px;
  border-bottom: 1px solid #ddd;
  z-index: 1000;
}

.sidebar {
  width: 240px;
  background-color: #1f2937;
  color: white;
  display: flex;
  flex-direction: column;
  position: relative;
  transition: all 0.3s ease;
  height: calc(100vh - 64px);
}

.sidebar.collapsed {
  width: 64px;
}

.toggle-icon {
  position: absolute;
  top: 16px;
  right: 16px;
  cursor: pointer;
  color: white;
  z-index: 10;
}

.toggle-icon:hover {
  color: #0073e6;
}

.sidebar-menu {
  flex: 1;
  padding-top: 20px;
  opacity: 1;
  transition: opacity 1s ease-in-out;
}

.main-content {
  flex-grow: 1;
  padding: 20px;
  background-color: #f9f9f9;
  overflow-y: auto;
  transition: margin-left 1s ease-in-out;
}
</style>
