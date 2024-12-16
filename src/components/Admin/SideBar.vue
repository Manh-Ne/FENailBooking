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
import { ref } from "vue";
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

    const menuOptions = ref([
      { label: "Dashboard", key: "dashboard" },
      { label: "Owner", key: "owner" },
      { label: "Staff", key: "staff" },
    ]);

    const handleMenuSelect = (key) => {
      router.push({ name: key });
    };

    const themeOverrides = {
      itemTextColor: "#fff",
      itemTextColorHover: "#0073e6",
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
</style>
