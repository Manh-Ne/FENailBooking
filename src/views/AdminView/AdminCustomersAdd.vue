<template>
  <div>
    <h1>Thêm khách hàng</h1>
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

      <n-form-item label="Lịch hẹn" :label-placement="'top'">
        <n-space>
          <n-time-picker default-formatted-value="00:12:13" />
          <n-time-picker :default-value="1183135260000" />
        </n-space>
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
export default {
  name: 'AdminCustomersAdd',
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
    };
  },
  methods: {
    handleSubmit(){
      const newCustomer = {
        name: this.name,
        age: this.age,
        address: this.address,
        position: this.position,
      };
      console.log('Thêm khách hàng:', newCustomer);
      this.$router.push({ name: 'customers-list' });
      this.name = '';
      this.age = null;
      this.address = '';
      this.position = '';
    }
  }
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

</style>
