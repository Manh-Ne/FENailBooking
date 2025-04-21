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
import { defineComponent, ref, h, onMounted } from "vue";
import { useRouter } from "vue-router";
import CustomerAPI from "@/Models/customer";
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
    const data = ref([]);
    const columns = createColumns(router);
    const fetchCustomer = async () =>{
      try {
        const response = await CustomerAPI.getAllCustomer();
        data.value = response.data;
      } catch (error) {
        console.error("Error fetching customers:", error);
      }
    };
    const handleDelete = async (id) => {
      if (confirm("Bạn có chắc chắn muốn xóa khách hàng này?")){
        try {
          await CustomerAPI.deleteCustomer(id);
          data.value = data.value.filter(customer => customer.id !== id);
          alert("Xóa khách hàng thành công!");
          await fetchCustomer();
        } catch (error) {
          console.error("Error deleting customer:", error);
          alert("Xóa khách hàng thất bại!");
        }
      }
    };
    const onAddCustomer = () => {
      router.push({ name: 'customers-add' });
    };
    onMounted(() => {
      fetchCustomer();
    });
    return{
      data,
      onAddCustomer,
      columns,
      fetchCustomer,
      handleDelete,
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
