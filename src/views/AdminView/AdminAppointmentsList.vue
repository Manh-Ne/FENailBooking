<template>
  <div>
    <h1>Danh Sách Lịch Hẹn</h1>
    <n-button type="primary" style="margin-bottom: 8px;" @click="onAddAppointment">Thêm Lịch Hẹn</n-button>
    <n-data-table
      :columns="columns"
      :data="appointments"
      :bordered="true"
      :pagination="pagination"
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
      title: "Tên Khách Hàng",
      key: "name",
    },
    {
      title: "Số Điện Thoại",
      key: "phone",
    },
    {
      title: "Email",
      key: "email",
    },
    {
      title: "Ngày Hẹn",
      key: "date",
    },
    {
      title: "Giờ Hẹn",
      key: "time",
    },
    {
      title: "Dịch Vụ",
      key: "service",
    },
    {
      title: "Trạng Thái",
      key: "status",
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
              onClick: () => {
                router.push({ name: "appointments-edit", params: { id: row.id } });
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
                  content: `Bạn có chắc chắn muốn xóa lịch hẹn của ${row.name}?`,
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
    const appointments = ref([
      {
        id: 1,
        name: "Nguyễn Văn A",
        phone: "0123456789",
        email: "nguyenvana@gmail.com",
        date: "2024-12-01",
        time: "14:30",
        service: "Làm nail",
        status: "Đã đặt",
      },
      {
        id: 2,
        name: "Nguyễn Văn B",
        phone: "0987654321",
        email: "ngvanb@gmail.com",
        date: "2024-12-02",
        time: "10:00",
        service: "Tư vấn",
        status: "Đã xác nhận",
      },
    ]);

    const columns = createColumns(router, dialog);
    const onAddAppointment = () => {
      router.push({ name: "appointments-add" });
    };

    const pagination = ref({
      pageSize: 5,
    });

    return {
      appointments,
      columns,
      onAddAppointment,
      pagination,
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
  color: white;
}

.btn-warning {
  background-color: red;
  color: white;
} */
</style>
