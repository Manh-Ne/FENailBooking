<template>
  <div>
    <h1>Danh sách nhân viên</h1>
    <n-button type="primary" style="margin-bottom: 8px;" @click="onAddStaff">Thêm nhân viên</n-button>
    <n-data-table
      :columns="columns"
      :data="staffData"
      :loading="loading"
      :pagination="true"
      :bordered="true"
    />
  </div>
</template>

<script>
import { useDialog, useMessage } from "naive-ui";
import { defineComponent, ref, reactive, h, onMounted } from "vue";
import { useRouter } from "vue-router";
import StaffAPI from "@/Models/staff"; // Import API

export default defineComponent({
  setup() {
    const router = useRouter();
    const dialog = useDialog();
    const message = useMessage();
    const loading = ref(false);
    const staffData = ref([]);
    const columns = [
      { title: "ID", key: "id", align: "center" },
      { title: "Họ Và Tên", key: "name" },
      { title: "Tuổi", key: "age" },
      { title: "Giới tính", key: "gender" },
      { title: "Địa chỉ", key: "address" },
      { title: "Email", key: "email" },
      { title: "Số điện thoại", key: "phone" },
      { title: "Chức vụ", key: "position" },
      {
        title: "Chức năng",
        key: "actions",
        render(row) {
          return [
            h(
              "button",
              {
                class: "btn btn-primary",
                style: {
                  backgroundColor: "#007bff",
                  color: "white",
                  padding: "8px 12px",
                  border: "none",
                  borderRadius: "4px",
                  cursor: "pointer",
                  marginRight: "8px",
                },
                onClick: () => {
                  router.push({ name: "staff-edit", params: { id: row.id } });
                },
              },
              "Sửa"
            ),
            h(
              "button",
              {
                class: "btn btn-warning",
                style: {
                  backgroundColor: "red",
                  color: "white",
                  padding: "8px 12px",
                  border: "none",
                  borderRadius: "4px",
                  cursor: "pointer",
                },
                onClick: () => {
                  dialog.warning({
                    title: "Xác nhận xóa",
                    content: `Bạn có chắc chắn muốn xóa nhân viên ${row.name}?`,
                    positiveText: "Đồng ý",
                    negativeText: "Hủy",
                    onPositiveClick: () => deleteStaff(row.id),
                    onNegativeClick: () => {
                      console.log("Hủy xóa");
                    },
                  });
                },
              },
              "Xóa"
            ),
          ];
        },
      },
    ];

    const getAllStaffs = async () => {
      loading.value = true;
      try {
        staffData.value = await StaffAPI.getAllStaffs();
      } catch (error) {
        message.error("Lỗi khi tải dữ liệu nhân viên");
      } finally {
        loading.value = false;
      }
    };

    const deleteStaff = async (id) => {
      try {
        await StaffAPI.deleteStaff(id);
        message.success("Xóa nhân viên thành công");
        getAllStaffs(); // Re-fetch the staff list after deletion
      } catch (error) {
        message.error("Lỗi khi xóa nhân viên");
      }
    };

    const onAddStaff = () => {
      router.push({ name: "staff-add" });
    };

    onMounted(() => {
      getAllStaffs();
    });

    return {
      staffData,
      columns,
      loading,
      onAddStaff,
      deleteStaff,
    };
  },
});
</script>

<style scoped>
h1 {
  margin-bottom: 16px;
  color: #333;
}
</style>
