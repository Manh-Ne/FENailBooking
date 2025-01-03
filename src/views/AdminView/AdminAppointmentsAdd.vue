<template>
  <div>
    <h1>Thêm Lịch Hẹn</h1>

    <n-form @submit.prevent="onSubmit" :model="appointment" :rules="rules" ref="appointmentForm" label-width="120px">
      <n-form-item label="Tên Khách Hàng" path="name">
        <n-input v-model="appointment.name" placeholder="Nhập tên khách hàng" required />
      </n-form-item>

      <n-form-item label="Số Điện Thoại" path="phone">
        <n-input v-model="appointment.phone" placeholder="Nhập số điện thoại" required />
      </n-form-item>

      <n-form-item label="Email" path="email">
        <n-input v-model="appointment.email" type="email" placeholder="Nhập email" required />
      </n-form-item>

      <n-form-item label="Ngày Hẹn" path="date">
        <n-date-picker v-model="appointment.date" type="date" placeholder="Chọn ngày hẹn" required />
      </n-form-item>

      <n-form-item label="Giờ Hẹn" path="time">
        <n-time-picker v-model="appointment.time" placeholder="Chọn giờ hẹn" required />
      </n-form-item>

      <n-form-item label="Dịch Vụ" path="service">
        <n-select v-model="appointment.service" :options="serviceOptions" placeholder="Chọn dịch vụ" required />
      </n-form-item>

      <n-form-item label="Trạng Thái" path="status">
        <n-select v-model="appointment.status" :options="statusOptions" placeholder="Chọn trạng thái" required />
      </n-form-item>

      <n-form-item>
        <n-button type="primary" html-type="submit" style="margin-right: 8px;">Lưu</n-button>
        <n-button @click="onCancel">Hủy</n-button>
      </n-form-item>
    </n-form>
  </div>
</template>

<script>
export default {
  name: "AdminAppointmentsAdd",
  data() {
    return {
      appointment: {
        name: "",
        phone: "",
        email: "",
        date: null,
        time: null,
        service: null,
        status: null,
      },
      serviceOptions: [
        { label: "Làm nail", value: "Làm nail" },
        { label: "Tư vấn", value: "Tư vấn" },
      ],
      statusOptions: [
        { label: "Đã đặt", value: "Đã đặt" },
        { label: "Đã xác nhận", value: "Đã xác nhận" },
        { label: "Đã hủy", value: "Đã hủy" },
      ],
      rules: {
        name: [{ required: true, message: "Vui lòng nhập tên khách hàng" }],
        phone: [{ required: true, message: "Vui lòng nhập số điện thoại" }],
        email: [{ required: true, message: "Vui lòng nhập email" }],
        date: [{ required: true, message: "Vui lòng chọn ngày hẹn" }],
        time: [{ required: true, message: "Vui lòng chọn giờ hẹn" }],
        service: [{ required: true, message: "Vui lòng chọn dịch vụ" }],
        status: [{ required: true, message: "Vui lòng chọn trạng thái" }],
      },
    };
  },
  methods: {
    onSubmit() {
      this.$refs.appointmentForm.validate((valid) => {
        if (valid) {
          console.log("Lịch hẹn mới:", this.appointment);
          alert("Lịch hẹn đã được thêm thành công!");
          this.$router.push({ name: "appointments-list" });
        }
      });
    },
    onCancel() {
      this.$router.push({ name: "appointments-list" });
    },
  },
};
</script>

<style scoped>
h1 {
  margin-bottom: 20px;
  color: #333;
}

n-form {
  max-width: 400px;
  margin: 0 auto;
}

n-form-item {
  margin-bottom: 16px;
}
</style>
