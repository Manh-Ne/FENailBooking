<template>
  <div class="header-admin">
    <h1>Admin</h1>
  </div>
</template>

<script>
export default {
  name: "HeaderAdmin",
};
</script>

<style scoped>
.header-admin {
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 100%;
  color: black;
}

h1 {
  font-size: 24px;
  margin: 0;
  font-weight: bold;
}
</style>
