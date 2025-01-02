<template>
  <div class="edit-container">
    <h1>Chỉnh sửa khách hàng</h1>
    <n-form :model="formData" ref="formRef" :rules="rules" label-width="120px">
      <n-form-item label="ID" path="id">
        <n-input v-model:value="formData.id" disabled />
      </n-form-item>

      <n-form-item label="Tên" path="name">
        <n-input v-model:value="formData.name" placeholder="Nhập tên" />
      </n-form-item>

      <n-form-item label="Tuổi" path="age">
        <n-input-number v-model:value="formData.age" placeholder="Nhập tuổi" />
      </n-form-item>

      <n-form-item label="Giới tính" path="gender">
        <n-select v-model:value="formData.gender" :options="genderOptions" placeholder="Chọn giới tính" />
      </n-form-item>

      <n-form-item label="Địa chỉ" path="address">
        <n-input v-model:value="formData.address" placeholder="Nhập địa chỉ" />
      </n-form-item>

      <n-form-item label="Lịch hẹn" path="appointment">
        <n-date-picker v-model:value="formData.appointment" placeholder="Chọn lịch hẹn" type="date" />
      </n-form-item>

      <div class="form-actions">
        <n-button type="primary" @click="onSave">Lưu</n-button>
        <n-button type="default" @click="onCancel">Hủy</n-button>
      </div>
    </n-form>
  </div>
</template>

<script>
import { defineComponent, ref } from "vue";
import { useRouter, useRoute } from "vue-router";

export default defineComponent({
  setup() {
    const router = useRouter();
    const route = useRoute();

    const formData = ref({
      id: route.params.id || "", // Lấy ID từ route hoặc để rỗng
      name: "Nguyễn Quang Mạnh",
      age: 22,
      gender: "Nam",
      address: "Hà Nội",
      appointment: null,
    });

    const genderOptions = [
      { label: "Nam", value: "Nam" },
      { label: "Nữ", value: "Nữ" },
    ];

    // Quy tắc xác thực
    const rules = {
      name: { required: true, message: "Tên không được để trống", trigger: "blur" },
      age: { required: true, message: "Tuổi không được để trống", trigger: "blur" },
      gender: { required: true, message: "Giới tính không được để trống", trigger: "change" },
      address: { required: true, message: "Địa chỉ không được để trống", trigger: "blur" },
      appointment: { required: true, message: "Lịch hẹn không được để trống", trigger: "blur" },
    };

    // Hành động khi nhấn lưu
    const onSave = () => {
      console.log("Dữ liệu đã lưu:", formData.value);
      router.push({ name: "customers-list" }); // Điều hướng về danh sách khách hàng
    };

    // Hành động khi nhấn hủy
    const onCancel = () => {
      router.push({ name: "customers-list" });
    };

    return {
      formData,
      genderOptions,
      rules,
      onSave,
      onCancel,
    };
  },
});
</script>

<style scoped>

</style>
