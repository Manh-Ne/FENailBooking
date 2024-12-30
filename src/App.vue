<script>
import { computed } from 'vue';
import { useRoute } from 'vue-router';

export default {
  setup() {
    const route = useRoute()
    return {
      layout : computed( () => route.meta.layout || "default")
    }
  }
}
</script>

<template>
  <n-config-provider>
    <n-dialog-provider>
      <router-view />
    </n-dialog-provider>
  </n-config-provider>
</template>

