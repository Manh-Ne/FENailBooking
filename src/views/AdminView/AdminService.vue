<template>
  <div class="service-container">
    <h2>Quản lí dịch vụ</h2>

    <n-form ref="formRef" :model="form" :rules="rules">
      <div class="form-group">
        <n-input v-model:value="form.name" placeholder="Tên dịch vụ" class="large-input" />
        <n-input-number v-model:value="form.price" placeholder="Giá" class="large-input" />
        <n-input-number v-model:value="form.duration" placeholder="Thời gian thực hiện (phút)" class="medium-input" />
        <n-button type="primary" @click="addService">{{ isEditing ? "Cập nhật" : "Thêm dịch vụ" }}</n-button>
        <n-button @click="resetForm()">Hủy</n-button>
      </div>
    </n-form>

    <n-data-table :columns="columns" :data="serviceData" :loading="loading" />
  </div>
</template>

<script>
import { ref, reactive, h } from "vue";
import { useMessage, NButton } from "naive-ui";
import service from "@/Models/service";

export default {
  setup() {
    const message = useMessage();
    const loading = ref(false);
    const form = reactive({
      name: "",
      price: null,
      duration: null,
    });
    const isEditing = ref(false);
    const rules = {
      name: [{ required: true, message: "Tên dịch vụ không được để trống", trigger: "blur" }],
      price: [{ required: true, message: "Nhập giá dịch vụ", trigger: "blur" }],
      duration: [{ required: true, message: "Thời gian không được để trống", trigger: "blur" }],
    };

    var serviceData = ref([]);

    const getAllServices = async () => {
      loading.value = true;
      serviceData.value = await service.getAllServices()
      loading.value = false;
    };

    getAllServices();

    const addService = async () => {
      if (!form.name || !form.price || !form.duration) {
        message.error("Vui lòng nhập đầy đủ thông tin!");
        return;
      }

      if (isEditing.value) {
        // Cập nhật dữ liệu
        const index = serviceData.value.findIndex((s) => s.id === form.id);
        if (index !== -1) {
          await service.updateService(form);
          message.success("Cập nhật dịch vụ thành công!");
        }
      } else {
        // Thêm mới dịch vụ
        await service.createService(form);
        message.success("Thêm dịch vụ thành công!");
      }
      getAllServices();
      resetForm();
    };

    const editService = (id) => {
      const service = serviceData.value.find((s) => s.id === id);
      console.log(service.price.replace(".", ""), "djadksahdka");
      if (service) {
        form.id = service.id;
        form.name = service.name;
        form.price = Number(service.price);
        form.duration = Number(service.duration);
        isEditing.value = true;
      }
    };

    const deleteService = async (id) => {
      await service.deleteService(id);
      getAllServices();
      message.success("Xóa dịch vụ thành công!");
    };

    const resetForm = () => {
      Object.assign(form, { id: null, name: "", price: null, duration: null });
      isEditing.value = false;
    };

    const columns = [
      { title: "Tên dịch vụ", key: "name", width: 250 },
      { title: "Giá", key: "price", width: 150 },
      {
        title: "Thời gian thực hiện",
        key: "duration",
        width: 200
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
        }
      },
      {
        title: "Hành động",
        key: "actions",
        width: 200,
        render(row) {
          return h("div", { style: "display: flex; gap: 10px" }, [
            h(
              NButton,
              { type: "warning", size: "small", onClick: () => editService(row.id) },
              { default: () => "Sửa" }
            ),
            h(
              NButton,
              { type: "error", size: "small", onClick: () => deleteService(row.id) },
              { default: () => "Xóa" }
            ),
          ]);
        },
      },
    ];

    return {
      form,
      rules,
      serviceData,
      addService,
      editService,
      deleteService,
      columns,
      isEditing,
      resetForm
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
