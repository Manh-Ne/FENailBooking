<template>
  <div class="edit-container">
    <h1>Chỉnh sửa nhân viên</h1>
    <n-form :model="formData" ref="formRef" :rules="rules" label-width="120px">
        <n-form-item label="ID" path="id">
          <n-input v-model:value="formData.id" placeholder="Nhập ID" disabled />
        </n-form-item>

        <n-form-item label="Tên" path="name">
          <n-input v-model:value="formData.name" placeholder="Nhập tên" />
        </n-form-item>

        <n-form-item label="Tuổi" path="age">
          <n-input-number v-model:value="formData.age" placeholder="Nhập tuổi" :min="18" />
        </n-form-item>

        <n-form-item label="Giới tính" path="gender">
          <n-select v-model:value="formData.gender" :options="genderOptions" placeholder="Chọn giới tính" />
        </n-form-item>

        <n-form-item label="Địa chỉ" path="address">
          <n-input v-model:value="formData.address" placeholder="Nhập địa chỉ" />
        </n-form-item>

        <n-form-item label="Email" path="email">
          <n-input v-model:value="formData.email" placeholder="Nhập email" type="email" />
        </n-form-item>

        <n-form-item>
          <n-select v-model:value="formData.position" :options="positionOptions" placeholder="Chọn chức vụ"></n-select>
        </n-form-item>

        <div class="form-actions">
          <n-button type="primary" style="margin-right: 15px;" @click="onSave">Lưu</n-button>
          <n-button type="default" @click="onCancel">Hủy</n-button>
        </div>
    </n-form>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue';
import { useRouter, useRoute } from 'vue-router';
export default {
  setup () {
    const router = useRouter();
    const route = useRoute();
    const formData = ref({
      id: route.params.id || "",
      name: "Nguyen Quang Manh",
      age: 22,
      gender: "Nam",
      address: "Thai Binh",
      email: "a@gmail.com",
      position: "Quản lý",
    })

    const genderOptions = [
      { label: "Nam", value: "Nam" },
      { label: "Nữ", value: "Nữ" },
    ];

    const positionOptions = [
      { label: "Quản lý", value: "Quản lý" },
      { label: "Nhân viên", value: "Nhân viên" },
    ];

    const rules = {
      name: { required: true, message: "Vui lòng nhập tên", trigger: "blur" },
      age: { required: true, message: "Vui lòng nhập tuổi", trigger: "blur" },
      email: { required: true, message: "Vui lòng nhập email", trigger: "blur" },
      gender: { required: true, message: "Vui lòng chọn giới tính", trigger: "change" },
      position: { required: true, message: "Vui lòng chọn chức vụ", trigger: "change" },
    };

    const onSave = () => {
      router.push({ name: "staff-list" });
    }
    const onCancel = () => {
      router.push({ name: "staff-list" });
    }
    return {
      formData,
      genderOptions,
      positionOptions,
      rules,
      onSave,
      onCancel,
    }
  }
}
</script>
<style scoped>

</style>

