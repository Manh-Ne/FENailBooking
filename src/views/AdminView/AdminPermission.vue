<template>
  <n-card title="Role Permissions Manager">

    <div class="filter-section">
      <n-select v-model:value="selectedDocument" :options="documentOptions" placeholder="Leave Application" />
      <n-select v-model:value="selectedRole" :options="roleOptions" placeholder="Select Role..." />
    </div>


    <div class="table-wrapper">
      <n-table striped bordered class="custom-table">
        <thead>
          <tr>
            <th>Document Type</th>
            <th>Role</th>
            <th>Level</th>
            <th>Permissions</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(entry, index) in permissions" :key="index">
            <td>{{ entry.document }}</td>
            <td>{{ entry.role }}</td>
            <td>{{ entry.level }}</td>
            <td>
              <div class="permissions-grid">
                <n-checkbox
                  v-for="perm in permissionList"
                  :key="perm.value"
                  v-model:checked="entry.permissions[perm.value]"
                  class="custom-checkbox"
                >
                  {{ perm.label }}
                </n-checkbox>
              </div>
            </td>
            <td>
              <n-button  style="color: black; background: gainsboro; border-color: white; font-weight: bold;" >
                X
              </n-button>
            </td>
          </tr>
        </tbody>
      </n-table>
    </div>
  </n-card>
</template>

<script setup>
import { ref } from "vue";
import { NCard, NSelect, NTable, NCheckbox } from "naive-ui";


const documentOptions = ref([{ label: "Leave Application", value: "Leave Application" }]);
const roleOptions = ref([{ label: "Employee", value: "Employee" }, { label: "HR User", value: "HR User" }]);


const permissionList = ref([
  { label: "Select", value: "select" },
  { label: "Read", value: "read" },
  { label: "Write", value: "write" },
  { label: "Create", value: "create" },
  { label: "Delete", value: "delete" },
  { label: "Cancel", value: "cancel" },
  { label: "Amend", value: "amend" },
  { label: "Submit", value: "submit" },
  { label: "Email", value: "email" },
  { label: "Print", value: "print" },
  { label: "Report", value: "report" },
  { label: "Export", value: "export" },
  { label: "Import", value: "import" },
  { label: "Set User Permissions", value: "set_permissions" },
  { label: "Share", value: "share" },
]);


const permissions = ref([
  {
    document: "Leave Application",
    role: "Employee",
    level: 0,
    permissions: Object.fromEntries(permissionList.value.map((perm) => [perm.value, false])),
  },
  {
    document: "Leave Application",
    role: "HR User",
    level: 0,
    permissions: Object.fromEntries(permissionList.value.map((perm) => [perm.value, false])),
  },
]);
</script>

<style scoped>

.filter-section {
  display: flex;
  gap: 10px;
  margin-bottom: 15px;
}

.table-wrapper {
  border: 1px solid #ccc;
  padding: 10px;
  overflow: hidden;
}

.custom-table {

  width: 100%;
}

.custom-table th,
.custom-table td {
  border: 1px solid #ccc;
  padding: 8px;
  text-align: center;
}


.permissions-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  padding: 10px 0;
}

:deep(.n-checkbox-box) {
  width: 13px;
  height: 13px;
  border: 2px solid #ccc;
  background-color: white;
  transition: all 0.2s ease-in-out;
}

:deep(.n-checkbox--checked) .n-checkbox-box {
  background-color: #409EFF !important;
  border-color: #409EFF !important;
}

:deep(.n-checkbox--checked) .n-checkbox-box::after {
  font-size: 12px;
  font-weight: bold;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
</style>
