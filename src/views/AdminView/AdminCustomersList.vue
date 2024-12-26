<template>
  <div>
    <h1>Danh sách khách hàng</h1>
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
      title: "Tên",
      key: "name",
    },
    {
      title: "Tuổi",
      key: "age",
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
              onClick: () => router.push({ name: "customers-add" }),
            },
            "Add"
          ),
          h(
            "button",
            {
              class: "btn btn-warning",
              style: {
                backgroundColor: "#ffc107",
                color: "white",
                padding: "8px 12px",
                border: "none",
                borderRadius: "4px",
                cursor: "pointer",
              },
            },
            "Edit"
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
      { id: 1, name: "Nguyễn Quang Mạnh", age: 22, address: "Hà Nội"},
      { id: 2, name: "Trần Thị B", age: 25, address: "Hồ Chí Minh"},
      { id: 3, name: "Phạm Văn C", age: 35, address: "Đà Nẵng"},
      { id: 4, name: "Lê Thị D", age: 28, address: "Huế"},
      { id: 5, name: "Vũ Văn E", age: 22, address: "Hải Phòng"},
    ]);
    const columns = createColumns(router);
    return{
      data,
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
