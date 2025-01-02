<template>
  <div>
    <h1>Danh sách khách hàng</h1>
    <n-button type="primary" style="margin-bottom: 8px;" @click="onAddCustomer">Thêm khách hàng</n-button>
    <n-data-table
      :columns="columns"
      :data="data"
      :bordered="true"
      :pagination="true"
    />
  </div>
</template>

<script>
import { defineComponent, ref, h } from "vue";
import { useRouter } from "vue-router";

function createColumns(router){
  return [
    {
      title: "ID",
      key: "id",
      align: "center",
    },
  {
      title: "Tên",
      key: "name",
    },
    {
      title: "Tuổi",
      key: "age",
    },
    {
      title: "Giới tính",
      key: "gender",
    },
    {
      title: "Địa chỉ",
      key: "address",
    },
    {
      title: "Lịch hẹn",
      key: "appointment",
    },
    {
      title: "Chức năng",
      key: "actions",
      render(row){
        return [
          h(
            "button",
            {
              class: "btn btn-primary",
              style: {
                backgroundColor: "#007bff",
                color: "white",
                padding: "8px 12px",
                border: "none",
                borderRadius: "4px",
                cursor: "pointer",
                marginRight: "8px",
              },
              onClick: () => {
                router.push({ name: 'customers-edit', params: { id: row.id}});
              }
            },
            "Edit"
          ),
          h(
            "button",
            {
              class: "btn btn-warning",
              style: {
                backgroundColor: "red",
                color: "white",
                padding: "8px 12px",
                border: "none",
                borderRadius: "4px",
                cursor: "pointer",
              },
            },
            "Delete"
          ),
        ]
      }
    }
  ]
}
export default defineComponent({
  setup(){
    const router = useRouter();
    const data = ref([
      { id: 1, name: "Nguyễn Quang Mạnh", age: 22, gender: "Nam", address: "Hà Nội"},
      { id: 2, name: "Trần Thị B", age: 25, gender: "Nữ", address: "Hồ Chí Minh"},
      { id: 3, name: "Phạm Văn C", age: 35, gender: "Nam", address: "Đà Nẵng"},
      { id: 4, name: "Lê Thị D", age: 28, gender: "Nữ", address: "Huế"},
      { id: 5, name: "Vũ Văn E", age: 22, gender: "Nam", address: "Hải Phòng"},
    ]);
    const columns = createColumns(router);
    const onAddCustomer = () => {
      router.push({ name: 'customers-add' });
    }
    return{
      data,
      onAddCustomer,
      columns
    }
  }
})
</script>
<style scoped>
h1 {
  margin-bottom: 16px;
  color: #333;
}
/* .btn {
  padding: 5px 10px;
  font-size: 14px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.btn-primary {
  background-color: #007bff;
  margin-right: 8px;
  color: white;
}
.btn-warning {
  background-color: #ffc107;
  color: white;
} */
</style>
