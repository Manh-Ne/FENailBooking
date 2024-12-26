<template>
  <div>
    <h2>Quản Lý Lịch Hẹn</h2>
    <n-card title="Danh Sách Lịch Hẹn" style="margin-top: 20px;">
      <n-space vertical>
        <n-button type="primary" @click="onAddAppointment">Thêm Lịch Hẹn</n-button>
        <n-data-table
          :columns="columns"
          :data="appointments"
          :bordered="true"
          :pagination="pagination"
        />
      </n-space>
    </n-card>
  </div>
</template>

<script>
import { h } from "vue";

export default {
  name: "AdminAppointments",
  data() {
    return {
      appointments: [
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
      ],
      columns: [
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
          title: "Tác Vụ",
          key: "actions",
          render: (row) =>
            [
            h(
            "button",
            {
              class: "btn btn-warning",
              style: {
                backgroundColor: "#ffc107",
                color: "white",
                padding: "8px 12px",
                border: "none",
                borderRadius: "4px",
                cursor: "pointer",
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
                marginLeft: "8px",
                border: "none",
                borderRadius: "4px",
                cursor: "pointer",
              },
            },
            "Delete"
          ),
            ],
        },
      ],


      pagination: {
        pageSize: 5,

      },
    };
  },
  methods: {
    onAddAppointment() {

    },
    onEditAppointment(row) {

    },
    onDeleteAppointment(row) {

    },
  },
};
</script>

<style scoped>
h2 {
  margin-top: 20px;
}
</style>
