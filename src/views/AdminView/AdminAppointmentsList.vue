<template>
  <div>
    <h1>Danh Sách Lịch Hẹn</h1>
    <div class="employees-container">
      <div v-for="employee in employees" :key="employee.id" class="employee-info">
        <img
          class="employee-avatar"
          :src="employee.avatar"
          alt="Avatar"
          @click="openEmployeeModal(employee.id)"
        />
        <p class="employee-name">{{ employee.name }}</p>
      </div>
    </div>

    <vue-cal
      style="height: 600px;"
      :time-from="480"
      :time-to="1300"
      default-view="day"
      hide-view-selector
      :events="calendarEvents"
      :on-event-click="onEventClick"
    />

    <n-modal v-model:show="isModalVisible" preset="card" title="Lịch Làm Việc" size="small">
      <div v-if="selectedEmployee">
        <div class="modal-header">
          <img class="employee-avatar-large" :src="selectedEmployee.avatar" alt="Avatar" />
          <p class="employee-name-large">{{ selectedEmployee.name }}</p>
        </div>

        <div class="appointment-list">
          <div v-for="event in filteredAppointments" :key="event.id" class="appointment-item">
            <p class="appointment-time">
              {{ formatTime(event.start) }} - {{ formatTime(event.end) }}
            </p>
            <p class="appointment-title"><strong>{{ event.title }}</strong></p>
            <p class="appointment-service"><strong>Dịch vụ:</strong> {{ event.service }}</p>
          </div>
          <p v-if="filteredAppointments.length === 0" class="no-appointments">
            Không có lịch hẹn nào.
          </p>
        </div>
      </div>
    </n-modal>
  </div>
</template>

<script>
import { defineComponent, ref, computed } from "vue";
import { useRouter } from "vue-router";
import "vue-cal/dist/vuecal.css";
import VueCal from "vue-cal";
import { NModal } from "naive-ui";

export default defineComponent({
  name: "AdminAppointmentsList",
  components: {
    VueCal,
    NModal,
  },
  setup() {
    const router = useRouter();

    const employees = ref([
      { id: "1", name: "Mạnh", avatar: "https://i.pravatar.cc/80?img=1", color: "#42a5f5" },
      { id: "2", name: "A", avatar: "https://i.pravatar.cc/80?img=2", color: "#f54542" },
      { id: "3", name: "B", avatar: "https://i.pravatar.cc/80?img=3", color: "#ff9800" },
    ]);

    const calendarEvents = ref([
      { id: "1", title: "Khách: Nguyễn Văn A", start: "2025-03-24 17:00", end: "2025-03-24 17:30", employeeId: "1", service: "Làm nail" },
      { id: "2", title: "Khách: Trần Thị B", start: "2025-03-24 17:00", end: "2025-03-24 17:30", employeeId: "1", service: "Gội đầu" },
      { id: "3", title: "Khách: Hoàng Văn C", start: "2025-03-24 18:00", end: "2025-03-24 18:30", employeeId: "3", service: "Làm nail" },
      { id: "4", title: "Khách: Lê Văn D", start: "2025-03-24 19:30", end: "2025-03-24 19:30", employeeId: "4", service: "Massage" },
    ]);

    const isModalVisible = ref(false);
    const selectedEmployeeId = ref(null);

    const selectedEmployee = computed(() =>
      employees.value.find(e => e.id === selectedEmployeeId.value)
    );

    const filteredAppointments = computed(() =>
      calendarEvents.value.filter(event => event.employeeId === selectedEmployeeId.value)
    );

    const openEmployeeModal = (employeeId) => {
      selectedEmployeeId.value = employeeId;
      isModalVisible.value = true;
    };

    const onEventClick = (eventData) => {
      router.push({ name: "appointment-edit", params: { id: eventData.id } });
    };

    const formatTime = (dateTime) => {
      return new Date(dateTime).toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });
    };

    return {
      employees,
      calendarEvents,
      isModalVisible,
      selectedEmployee,
      filteredAppointments,
      openEmployeeModal,
      onEventClick,
      formatTime,
    };
  },
});
</script>

<style scoped>
h1 {
  margin-bottom: 16px;
  color: #333;
  text-align: center;
}

.employees-container {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-bottom: 10px;
}

.employee-info {
  display: flex;
  flex-direction: column;
  align-items: center;
  cursor: pointer;
}

.employee-avatar {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #ddd;
  transition: transform 0.2s ease;
}

.employee-avatar:hover {
  transform: scale(1.1);
}

.employee-name {
  margin-top: 5px;
  font-size: 14px;
  font-weight: bold;
  text-align: center;
}

.modal-header {
  text-align: center;
}

.employee-avatar-large {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #ddd;
  margin-bottom: 8px;
}

.employee-name-large {
  font-size: 18px;
  font-weight: bold;
}

.appointment-list {
  margin-top: 10px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.appointment-item {
  padding: 8px;
  background: #f0f0f0;
  border-radius: 8px;
}

.appointment-time {
  font-weight: bold;
  color: #555;
}

.appointment-title {
  color: #333;
}

.appointment-service {
  color: #007bff;
  font-weight: bold;
}

.no-appointments {
  text-align: center;
  color: #888;
  margin-top: 10px;
}
</style>
