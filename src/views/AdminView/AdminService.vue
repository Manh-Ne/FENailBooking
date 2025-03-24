<template>
  <div class="service-container">
    <h2>Quản lí dịch vụ</h2>

    <n-form ref="formRef" :model="form" :rules="rules">
      <div class="form-group">
        <n-select v-model:value="form.name" :options="serviceOptions" placeholder="Tên dịch vụ" class="large-input" />
        <n-input-number v-model:value="form.price" placeholder="Giá" class="large-input" />
        <n-date-picker v-model:value="form.time" type="datetime" placeholder="Thời gian" class="medium-input" />
        <n-button type="primary" @click="addService">Thêm dịch vụ</n-button>
      </div>
    </n-form>

    <n-data-table :columns="columns" :data="serviceData" />
  </div>
</template>

<script>
import { ref, reactive } from "vue";
import { useMessage } from "naive-ui";

export default {
  setup() {
    const message = useMessage();
    const form = reactive({
      name: "",
      price: null,
      time: null,
    });

    const rules = {
      name: [{ required: true, message: "Tên dịch vụ không được để trống", trigger: "blur" }],
      price: [{ required: true, message: "Nhập giá dịch vụ", trigger: "blur" }],
      time: [{ required: true, message: "Thời gian không được để trống", trigger: "blur" }],
    };
    const serviceOptions =[
      { label: "Làm nail", value: "nail" },
      { label: "Gội đầu", value: "headwashing" },
    ]
    const serviceData = ref([]);

    const addService = () => {
      if (!form.name || !form.price || !form.description) {
        message.error("Vui lòng nhập đầy đủ thông tin!");
        return;
      }

      serviceData.value.push({
        id: Date.now(),
        name: form.name,
        price: form.price,
        time: form.time,
      });

      message.success("Thêm dịch vụ thành công!");

      Object.assign(form, { name: "", price: null, description: "" });
    };

    const columns = [
      { title: "Tên dịch vụ", key: "name", width: 250 },
      { title: "Giá", key: "price", width: 150 },
      { title: "Thời gian", key: "time", width: 200 },
    ];

    return {
      form,
      rules,
      serviceData,
      addService,
      columns,
      serviceOptions
    };
  },
};
</script>

<style scoped>
.service-container {
  max-width: 1200px;
  margin: auto;
}

.form-group {
  display: flex;
  gap: 15px;
  margin-bottom: 20px;
}

.large-input {
  width: 250px;
}
</style>
