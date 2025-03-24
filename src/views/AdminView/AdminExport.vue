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

        <n-button type="primary" @click="handleSubmit">
          {{ editingId !== null ? "Cập nhật" : "Thêm" }}
        </n-button>
      </div>
    </n-form>

    <n-data-table :columns="columns" :data="inventoryData" />
  </div>
</template>

<script>
import { ref, reactive, h } from "vue";
import { useMessage, NButton } from "naive-ui";

export default {
  setup() {
    const message = useMessage();
    const inventoryData = ref([]);
    const editingId = ref(null);

    const form = reactive({
      name: "",
      quantity: null,
      price: null,
      type: "",
      time: null,
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

    const handleSubmit = () => {
      if (!form.name || !form.quantity || !form.price || !form.type || !form.time) {
        message.error("Vui lòng nhập đầy đủ thông tin!");
        return;
      }

      if (editingId.value !== null) {
        // Nếu đang chỉnh sửa, cập nhật lại sản phẩm
        const index = inventoryData.value.findIndex((p) => p.id === editingId.value);
        if (index !== -1) {
          inventoryData.value[index] = {
            id: editingId.value,
            name: form.name,
            quantity: form.quantity,
            price: form.price,
            type: form.type === "import" ? "Nhập kho" : "Xuất kho",
            time: new Date(form.time).toLocaleString(),
          };
          message.success("Cập nhật sản phẩm thành công!");
          editingId.value = null; // Reset trạng thái chỉnh sửa
        }
      } else {
        // Thêm sản phẩm mới
        inventoryData.value.push({
          id: Date.now(),
          name: form.name,
          quantity: form.quantity,
          price: form.price,
          type: form.type === "import" ? "Nhập kho" : "Xuất kho",
          time: new Date(form.time).toLocaleString(),
        });
        message.success("Thêm sản phẩm thành công!");
      }

      // Reset form
      Object.assign(form, { name: "", quantity: null, price: null, type: "", time: null });
    };

    const editProduct = (id) => {
      const product = inventoryData.value.find((p) => p.id === id);
      if (product) {
        form.name = product.name;
        form.quantity = product.quantity;
        form.price = product.price;
        form.type = product.type === "Nhập kho" ? "import" : "export";
        form.time = new Date(product.time);
        editingId.value = id; // Đánh dấu ID của sản phẩm đang chỉnh sửa
      }
    };

    const deleteProduct = (id) => {
      inventoryData.value = inventoryData.value.filter((p) => p.id !== id);
      message.success("Xóa sản phẩm thành công!");
    };

    const columns = [
      { title: "Tên sản phẩm", key: "name", width: 250 },
      { title: "Số lượng", key: "quantity", width: 150 },
      { title: "Giá", key: "price", width: 200 },
      { title: "Loại", key: "type", width: 150 },
      { title: "Thời gian", key: "time", width: 200 },
      {
        title: "Hành động",
        key: "actions",
        width: 200,
        render(row) {
          return h("div", { style: "display: flex; gap: 10px" }, [
            h(
              NButton,
              { type: "warning", size: "small", onClick: () => editProduct(row.id) },
              { default: () => "Sửa" }
            ),
            h(
              NButton,
              { type: "error", size: "small", onClick: () => deleteProduct(row.id) },
              { default: () => "Xóa" }
            ),
          ]);
        },
      },
    ];

    return {
      form,
      rules,
      typeOptions,
      inventoryData,
      handleSubmit,
      editProduct,
      deleteProduct,
      columns,
      editingId, // Biến này giúp kiểm tra trạng thái chỉnh sửa
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
