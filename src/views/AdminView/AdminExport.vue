<template>
  <div class="admin-container">
    <h2>Quản lí hàng xuất nhập kho</h2>

    <n-form ref="formRef" :model="form" :rules="rules">
      <div class="form-group">
        <n-input v-model:value="form.name" placeholder="Tên sản phẩm" class="large-input" />
        <n-input-number v-model:value="form.quantity" placeholder="Số lượng" class="large-input" />
        <n-input-number v-model:value="form.price" placeholder="Giá" class="large-input" />
        <n-select v-model:value="form.type" :options="typeOptions" placeholder="Loại" class="medium-input" />
        <n-date-picker v-model:value="form.time" type="datetime" placeholder="Thời gian" class="medium-input" />
        <n-button type="primary" @click="addProduct">Thêm</n-button>
      </div>
    </n-form>

    <n-data-table :columns="columns" :data="inventoryData" />
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
      quantity: null,
      price: null,
      type: "",
    });

    const rules = {
      name: [{ required: true, message: "Tên sản phẩm không được để trống", trigger: "blur" }],
      quantity: [{ required: true, message: "Nhập số lượng", trigger: "blur" }],
      price: [{ required: true, message: "Nhập giá", trigger: "blur" }],
      type: [{ required: true, message: "Chọn loại", trigger: "change" }],
      time: [{ required: true, message: "Thời gian không được để trống", trigger: "blur" }],
    };

    const typeOptions = [
      { label: "Nhập kho", value: "import" },
      { label: "Xuất kho", value: "export" },
    ];

    const inventoryData = ref([]);

    const addProduct = () => {
      if (!form.name || !form.quantity || !form.price || !form.type) {
        message.error("Vui lòng nhập đầy đủ thông tin!");
        return;
      }

      inventoryData.value.push({
        id: Date.now(),
        name: form.name,
        quantity: form.quantity,
        price: form.price,
        type: form.type === "import" ? "Nhập kho" : "Xuất kho",
      });

      message.success("Thêm sản phẩm thành công!");

      Object.assign(form, { name: "", quantity: null, price: null, type: "" });
    };

    const columns = [
      { title: "Tên sản phẩm", key: "name", width: 250 },
      { title: "Số lượng", key: "quantity", width: 150 },
      { title: "Giá", key: "price", width: 200 },
      { title: "Loại", key: "type", width: 150 },
      { title: "Thời gian", key: "time", width: 200 },

    ];

    return {
      form,
      rules,
      typeOptions,
      inventoryData,
      addProduct,
      columns,
    };
  },
};
</script>

<style scoped>
.admin-container {
  max-width: 1200px;
  margin: auto;
}

.form-group {
  display: flex;
  gap: 15px;
  margin-bottom: 20px;
}

.large-input {
  width: 200px;
}

.medium-input {
  width: 150px;
}
</style>
