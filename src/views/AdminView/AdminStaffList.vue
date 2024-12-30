<template>
  <div>
    <h1>Danh sách nhân viên</h1>
    <n-button type="primary" style="margin-bottom: 8px;" @click="onAddStaff">Thêm nhân viên</n-button>
    <n-data-table
      :columns="columns"
      :data="data"
      :bordered="true"
      :pagination="true"
    />
  </div>
</template>

<script>

import { useDialog } from "naive-ui";
import { defineComponent, ref, h } from "vue";
import { useRouter } from "vue-router";

function createColumns(router, dialog) {
  return [
    {
      title: "ID",
      key: "id",
      align: "center",
    },
    {
      title: "Họ Và Tên",
      key: "name",

    },
    {
      title: "Tuổi",
      key: "age",

    },
    {
      title: "Giới tính",
      key: "gender",
    },
    {
      title: "Địa chỉ",
      key: "address",

    },
    {
      title: "Email",
      key: "email",
    },
    {
      title: "Chức vụ",
      key: "position",

    },
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


            },
            "Edit"
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
                  onPositiveClick: () => {
                    console.log("Đã xóa");
                  },
                  onNegativeClick: () => {
                    console.log("Hủy xóa");
                  },
                });
              },

            },
            "Delete"
          ),
        ];
      },
    },
  ];
}

export default defineComponent({
  setup() {
    const router = useRouter();
    const dialog = useDialog();
    const data = ref([
      { id: 1, name: "Nguyễn Quang Mạnh", age: 22, gender: "Nam", address: "Hà Nội", email: "a@gmail.com", position: "Quản lý" },
      { id: 2, name: "Trần Thị B", age: 25, gender: "Nữ", address: "Hồ Chí Minh", email: "b@gmail.com", position: "Nhân viên" },
      { id: 3, name: "Phạm Văn C", age: 35, gender: "Nam", address: "Đà Nẵng", email: "c@gmail.com", position: "Nhân viên" },
      { id: 4, name: "Lê Thị D", age: 28, gender: "Nữ", address: "Huế", email: "d@gmail.com", position: "Nhân viên" },
      { id: 5, name: "Vũ Văn E", age: 22, gender: "Nam", address: "Hải Phòng", email: "e@gmail.com", position: "Nhân viên" },
    ]);

    const columns = createColumns(router, dialog);
    const onAddStaff = () => {
      router.push({ name: 'staff-add' });
    };
    return {
      data,
      columns,
      onAddStaff,
    };
  },
});
</script>

<style scoped>
h1 {
  margin-bottom: 16px;
  color: #333;
}
/* .btn {
  padding: 5px 10px;
  font-size: 14px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.btn-primary {
  background-color: #007bff;
  margin-right: 8px;
  color: white;
}
.btn-warning {
  background-color: #ffc107;
  color: white;
} */
</style>
