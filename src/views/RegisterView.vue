<template>
  <div class="register-container">
    <n-card title="Register" size="small" class="register-card">
      <n-form ref="formRef" :model="form" :rules="rules">

        <n-form-item label="Name" path="name">
          <n-input v-model="form.name" placeholder="Enter your name" />
        </n-form-item>

        <n-form-item label="Email" path="email">
          <n-input v-model="form.email" placeholder="Enter your email" />
        </n-form-item>

        <n-form-item label="Password" path="password">
          <n-input v-model="form.password" type="password" placeholder="Enter your password" />
        </n-form-item>

        <n-form-item label="Confirm Password" path="confirmPassword">
          <n-input v-model="form.confirmPassword" type="password" placeholder="Confirm your password" />
        </n-form-item>

        <n-button type="primary" :loading="loading" block @click="handleRegister">
          {{ loading ? "Registering..." : "Register" }}
        </n-button>

        <div class="login-link">
          <n-text @click="goToLogin" class="login-link-text">Already have an account? Login</n-text>
        </div>
      </n-form>
    </n-card>
  </div>
</template>

<script>
import { ref } from "vue";
import { useMessage } from "naive-ui";
import { useRouter } from "vue-router";

export default {
  setup() {
    const formRef = ref(null);
    const message = useMessage();
    const router = useRouter();

    const form = ref({
      name: "",
      email: "",
      password: "",
      confirmPassword: "",
    });

    const rules = {
      name: [
        {
          required: true,
          message: "Name is required",
          trigger: "blur",
        },
      ],
      email: [
        {
          required: true,
          message: "Email is required",
          trigger: "blur",
        },
        {
          type: "email",
          message: "Invalid email format",
          trigger: ["blur", "change"],
        },
      ],
      password: [
        {
          required: true,
          message: "Password is required",
          trigger: "blur",
        },
        {
          min: 6,
          message: "Password must be at least 6 characters",
          trigger: "blur",
        },
      ],
      confirmPassword: [
        {
          required: true,
          message: "Please confirm your password",
          trigger: "blur",
        },
        {
          validator: (rule, value) => value === form.value.password,
          message: "Mật khẩu không đúng",
          trigger: "blur",
        },
      ],
    };

    const loading = ref(false);

    const handleRegister = () => {
      formRef.value?.validate((errors) => {
        if (!errors) {
          loading.value = true;
          setTimeout(() => {
            loading.value = false;
            message.success("Đăng kí thành công");
            router.push("/login");
          }, 1000);
        } else {
          message.error("Vui lòng kiểm tra lại thông tin đăng kí");
        }
      });
    };

    const goToLogin = () => {
      router.push("/login");
    };

    return {
      formRef,
      form,
      rules,
      loading,
      handleRegister,
      goToLogin,
    };
  },
};
</script>

<style scoped>
.register-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: #f4f4f4;
}

.register-card {
  width: 100%;
  max-width: 350px;
}

.login-link {
  text-align: center;
  margin-top: 10px;
}

.login-link-text {
  cursor: pointer;
  color: #007bff;
}

.login-link-text:hover {
  text-decoration: underline;
}
</style>
