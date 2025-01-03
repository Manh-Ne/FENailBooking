<template>
  <div class="edit-container">
    <h1>Chỉnh sửa Lịch Hẹn</h1>
    <n-form :model="formData" ref="formRef" :rules="rules" label-width="120px">
      <n-form-item label="ID" path="id">
        <n-input v-model:value="formData.id" placeholder="Nhập ID" disabled />
      </n-form-item>

      <n-form-item label="Tên Khách Hàng" path="name">
        <n-input v-model:value="formData.name" placeholder="Nhập tên khách hàng" />
      </n-form-item>

      <n-form-item label="Số Điện Thoại" path="phone">
        <n-input v-model:value="formData.phone" placeholder="Nhập số điện thoại" />
      </n-form-item>

      <n-form-item label="Email" path="email">
        <n-input v-model:value="formData.email" placeholder="Nhập email" type="email" />
      </n-form-item>

      <n-form-item label="Ngày Hẹn" path="date">
        <n-date-picker v-model:value="formData.date" type="date" placeholder="Chọn ngày hẹn" />
      </n-form-item>

      <n-form-item label="Giờ Hẹn" path="time">
        <n-time-picker v-model:value="formData.time" placeholder="Chọn giờ hẹn" format="HH:mm" />
      </n-form-item>

      <n-form-item label="Dịch Vụ" path="service">
        <n-select v-model:value="formData.service" :options="serviceOptions" placeholder="Chọn dịch vụ" />
      </n-form-item>

      <n-form-item label="Trạng Thái" path="status">
        <n-select v-model:value="formData.status" :options="statusOptions" placeholder="Chọn trạng thái" />
      </n-form-item>

      <div class="form-actions">
        <n-button type="primary" style="margin-right: 15px;" @click="onSave">Lưu</n-button>
        <n-button type="default" @click="onCancel">Hủy</n-button>
      </div>
    </n-form>
  </div>
</template>

<script>
import { defineComponent, ref, watch } from "vue";
import { useRouter, useRoute } from "vue-router";

export default defineComponent({
  setup() {
    const router = useRouter();
    const route = useRoute();

    const formData = ref({
      id: route.params.id || "",
      name: "Nguyễn Văn A",
      phone: "0123456789",
      email: "nguyenvana@gmail.com",
      date: "2024-12-01",
      time: "14:30", 
      service: "Làm nail",
      status: "Đã đặt",
    });

    const serviceOptions = [
      { label: "Làm nail", value: "Làm nail" },
      { label: "Tư vấn", value: "Tư vấn" },
      { label: "Cắt tóc", value: "Cắt tóc" },
    ];

    const statusOptions = [
      { label: "Đã đặt", value: "Đã đặt" },
      { label: "Đã xác nhận", value: "Đã xác nhận" },
      { label: "Hoàn thành", value: "Hoàn thành" },
    ];

    const rules = {
      name: { required: true, message: "Vui lòng nhập tên khách hàng", trigger: "blur" },
      phone: { required: true, message: "Vui lòng nhập số điện thoại", trigger: "blur" },
      email: { required: true, message: "Vui lòng nhập email", trigger: "blur" },
      date: { required: true, message: "Vui lòng chọn ngày hẹn", trigger: "change" },
      time: { required: true, message: "Vui lòng chọn giờ hẹn", trigger: "change" },
      service: { required: true, message: "Vui lòng chọn dịch vụ", trigger: "change" },
      status: { required: true, message: "Vui lòng chọn trạng thái", trigger: "change" },
    };





    const onSave = () => {
      if (!formData.value.time || !/^\d{2}:\d{2}$/.test(formData.value.time)) {
        alert("Giờ hẹn không hợp lệ");
        return;
      }
      router.push({ name: "appointments-list" });
    };


    const onCancel = () => {
      router.push({ name: "appointments-list" });
    };

    return {
      formData,
      serviceOptions,
      statusOptions,
      rules,
      onSave,
      onCancel,
    };
  },
});
</script>

<style scoped>
.edit-container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

.form-actions {
  display: flex;
  justify-content: flex-end;
  margin-top: 20px;
}
</style>
