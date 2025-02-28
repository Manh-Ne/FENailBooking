<template>
  <div>
    <h1>Danh Sách Lịch Hẹn</h1>
    <n-button type="primary" style="margin-bottom: 8px;" @click="onAddAppointment">Thêm Lịch Hẹn</n-button>
    <vue-cal
      style="height: 600px;"
      :time-from="480"
      :time-to="1300"
      default-view="day"
      :events="calendarEvents"
      :on-event-click="onEventClick"
      :on-event-create="onEventCreate"
      :on-event-drag-drop="onEventDragDrop"
    />
  </div>
</template>

<script>
import { useDialog } from "naive-ui";
import { defineComponent, ref, h } from "vue";
import { useRouter } from "vue-router";
import "vue-cal/dist/vuecal.css";
import VueCal from "vue-cal";

export default defineComponent({
  name: "AdminAppointmentsList",
  components: {
    VueCal
  },
  setup() {
    const router = useRouter();
    const dialog = useDialog();
    const calendarEvents = ref([
      {
        id: "1",
        title: "Làm nail - Nguyễn Quang Mạnh",
        start: "2025-02-28 14:30",
        end: "2025-02-28 15:30",
        color: "#f54542",
        employee: {
          name: "Mạnh",
          avatar: "",
        }
      },
      {
        id: "2",
        title: "Làm nail - Nguyễn Quang A",
        start: "2025-02-29 16:30",
        end: "2025-02-29 17:30",
        employee: {
          name: "A",
          avatar: "",
        },
      },
    ])
    const onEventClick = (eventData) => {
      router.push({ name: "appointment-edit", params: { id: eventData.id}});
    };
    const onEventCreate = (eventData) => {
      router.push({ name: "appointment-add"});
    };
    return {
      calendarEvents,
      onEventClick,
      onEventCreate
    };
  },
});
</script>

<style scoped>
h1 {
  margin-bottom: 16px;
  color: #333;
}
.vue-cal {
  --vuecal-primary: #007bff;
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
  color: white;
}

.btn-warning {
  background-color: red;
  color: white;
} */
</style>
