<template>
  <div class="product-container">
    <h2>Quản lí sản phẩm</h2>

    <n-form ref="formRef" :model="form" :rules="rules">
      <div class="form-group">
        <n-input v-model:value="form.name" placeholder="Tên sản phẩm" class="large-input" />
        <n-input-number v-model:value="form.price" placeholder="Giá sản phẩm" class="large-input" />
        <n-input-number v-model:value="form.quantity" placeholder="Số lượng" class="medium-input" />
        <n-button type="primary" @click="addProduct">{{ isEditing ? "Cập nhật" : "Thêm sản phẩm" }}</n-button>
        <n-button @click="resetForm()">Hủy</n-button>
      </div>
    </n-form>

    <n-data-table :columns="columns" :data="productData" :loading="loading" />
  </div>
</template>

<script>
import { ref, reactive, h } from "vue";
import { useMessage, NButton } from "naive-ui";
import product from "@/Models/product"; 

export default {
  setup() {
    const message = useMessage();
    const loading = ref(false);
    const form = reactive({
      name: "",
      price: null,
      quantity: null,
    });
    const isEditing = ref(false);
    const rules = {
      name: [{ required: true, message: "Tên sản phẩm không được để trống", trigger: "blur" }],
      price: [{ required: true, message: "Nhập giá sản phẩm", trigger: "blur" }],
      quantity: [{ required: true, message: "Số lượng không được để trống", trigger: "blur" }],
    };

    const productData = ref([]);

    const getAllProducts = async () => {
      loading.value = true;
      productData.value = await product.getAllProducts();
      loading.value = false;
    };

    getAllProducts();

    const addProduct = async () => {
      if (!form.name || !form.price || !form.quantity) {
        message.error("Vui lòng nhập đầy đủ thông tin!");
        return;
      }

      if (isEditing.value) {
        const index = productData.value.findIndex((p) => p.id === form.id);
        if (index !== -1) {
          await product.updateProduct(form);
          message.success("Cập nhật sản phẩm thành công!");
        }
      } else {
        await product.createProduct(form);
        message.success("Thêm sản phẩm thành công!");
      }

      getAllProducts();
      resetForm();
    };

    const editProduct = (id) => {
      const p = productData.value.find((p) => p.id === id);
      if (p) {
        form.id = p.id;
        form.name = p.name;
        form.price = Number(p.price);
        form.quantity = Number(p.quantity);
        isEditing.value = true;
      }
    };

    const deleteProduct = async (id) => {
      await product.deleteProduct(id);
      getAllProducts();
      message.success("Xóa sản phẩm thành công!");
    };

    const resetForm = () => {
      Object.assign(form, { id: null, name: "", price: null, quantity: null });
      isEditing.value = false;
    };

    const columns = [
      { title: "Tên sản phẩm", key: "name", width: 250 },
      { title: "Giá", key: "price", width: 150 },
      {
        title: "Số lượng",
        key: "quantity",
        width: 150
      },
      {
        title: "Ngày tạo",
        key: "created_at",
        width: 200,
        render(row) {
          return new Date(row.created_at).toLocaleDateString();
        },
      },
      {
        title: "Ngày cập nhật",
        key: "updated_at",
        width: 200,
        render(row) {
          return new Date(row.updated_at).toLocaleDateString();
        },
      },
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
      productData,
      addProduct,
      editProduct,
      deleteProduct,
      columns,
      isEditing,
      resetForm
    };
  },
};
</script>

<style scoped>
.product-container {
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
