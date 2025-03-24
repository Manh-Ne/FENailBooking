<template>
  <div class="service-container">
    <h2>Quản lí dịch vụ</h2>

    <n-form ref="formRef" :model="form" :rules="rules">
      <div class="form-group">
        <n-select v-model:value="form.name" :options="serviceOptions" placeholder="Tên dịch vụ" class="large-input" />
        <n-input-number v-model:value="form.price" placeholder="Giá" class="large-input" />
        <n-date-picker v-model:value="form.time" type="datetime" placeholder="Thời gian" class="medium-input" />
        <n-button type="primary" @click="addService">{{ isEditing ? "Cập nhật" : "Thêm dịch vụ" }}</n-button>
      </div>
    </n-form>

    <n-data-table :columns="columns" :data="serviceData" />
  </div>
</template>

<script>
import { ref, reactive, h } from "vue";
import { useMessage, NButton } from "naive-ui";

export default {
  setup() {
    const message = useMessage();
    const form = reactive({
      id: null,
      name: "",
      price: null,
      time: null,
    });
    const isEditing = ref(false);
    const rules = {
      name: [{ required: true, message: "Tên dịch vụ không được để trống", trigger: "blur" }],
      price: [{ required: true, message: "Nhập giá dịch vụ", trigger: "blur" }],
      time: [{ required: true, message: "Thời gian không được để trống", trigger: "blur" }],
    };

    const serviceOptions = [
      { label: "Làm nail", value: "Nail" },
      { label: "Gội đầu", value: "Headwashing" },
    ];

    const serviceData = ref([]);

    const addService = () => {
      if (!form.name || !form.price || !form.time) {
        message.error("Vui lòng nhập đầy đủ thông tin!");
        return;
      }

      if (isEditing.value) {
        // Cập nhật dữ liệu
        const index = serviceData.value.findIndex((s) => s.id === form.id);
        if (index !== -1) {
          serviceData.value[index] = { ...form, time: new Date(form.time).toISOString() };
          message.success("Cập nhật dịch vụ thành công!");
        }
      } else {
        // Thêm mới dịch vụ
        serviceData.value.push({
          id: Date.now(),
          name: form.name,
          price: form.price,
          time: new Date(form.time).toISOString(),
        });
        message.success("Thêm dịch vụ thành công!");
      }

      resetForm();
    };

    const editService = (id) => {
      const service = serviceData.value.find((s) => s.id === id);
      if (service) {
        form.id = service.id;
        form.name = service.name;
        form.price = service.price;
        form.time = new Date(service.time);
        isEditing.value = true;
      }
    };

    const deleteService = (id) => {
      serviceData.value = serviceData.value.filter((s) => s.id !== id);
      message.success("Xóa dịch vụ thành công!");
    };

    const resetForm = () => {
      Object.assign(form, { id: null, name: "", price: null, time: null });
      isEditing.value = false;
    };

    const columns = [
      { title: "Tên dịch vụ", key: "name", width: 250 },
      { title: "Giá", key: "price", width: 150 },
      {
        title: "Thời gian",
        key: "time",
        width: 200,
        render(row) {
          return row.time ? new Date(row.time).toLocaleString("vi-VN", { hour12: false }) : "Không xác định";
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
      serviceOptions,
      isEditing,
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
