<template>
  <div>
    <h1>Thêm nhân viên</h1>

    <n-form @submit.prevent="handleSubmit">
      <n-form-item label="Tên" :label-placement="'top'">
        <n-input v-model="name" placeholder="Nhập tên" required />
      </n-form-item>

      <n-form-item label="Tuổi" :label-placement="'top'">
        <n-input-number v-model="age" placeholder="Nhập tuổi" :min="18" required />
      </n-form-item>

      
      <n-form-item label="Địa chỉ" :label-placement="'top'">
        <n-input v-model="address" placeholder="Nhập địa chỉ" required />
      </n-form-item>

      <n-form-item label="Chức vụ" :label-placement="'top'">
        <n-input v-model="position" placeholder="Nhập chức vụ" required />
      </n-form-item>

      <n-form-item label="Email" :label-placement="'top'">
        <n-input v-model="email" placeholder="Nhập email" required />
      </n-form-item>

      <n-form-item>
        <n-button type="Info" html-type="submit">Thêm nhân viên</n-button>
      </n-form-item>


    </n-form>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue';
import { NForm, NFormItem, NInput, NInputNumber, NButton } from 'naive-ui';

export default defineComponent({
  name: 'AdminStaffAdd',
  components: {
    NForm,
    NFormItem,
    NInput,
    NInputNumber,
    NButton,
  },
  data() {
    return {
      name: '',
      age: null,
      address: '',
      position: '',
      email: '',
    };
  },
  methods: {
    handleSubmit() {
      const newStaff = {
        name: this.name,
        age: this.age,
        address: this.address,
        position: this.position,
        email: this.email,
      };

      console.log('Thêm nhân viên:', newStaff);
      this.$router.push({ name: 'staff-list' });

    },
  },
});
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
