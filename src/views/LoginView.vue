<template>
  <div class="login-container">
    <n-card title="Login" size="small" class="login-card">
      <n-form ref="formRef" :model="form" :rules="rules">

        <n-form-item label="Email" path="email">
          <n-input v-model:value="form.email" placeholder="Enter your email" />
        </n-form-item>

        <n-form-item label="Password" path="password">
          <n-input v-model:value="form.password" type="password" show-password-on="click" placeholder="Enter your password" />
        </n-form-item>

        <n-button type="primary" block :loading="loading" @click="handleLogin">
          {{ loading ? "Logging in..." : "Login" }}
        </n-button>

        <div class="forgot-password">
          <n-text @click="forgotPassword" class="forgot-link">Forgot password?</n-text>
        </div>

        <div class="register-section">
          <span>Don't have an account?</span>
          <n-button text type="primary" @click="goToRegister">Register now</n-button>
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
      email: "",
      password: "",
    });

    const rules = {
      email: [
        { required: true, message: "Email is required", trigger: "blur" },
        { type: "email", message: "Invalid email format", trigger: ["blur", "change"] },
      ],
      password: [{ required: true, message: "Password is required", trigger: "blur" }],
    };

    const loading = ref(false);

    const handleLogin = () => {
      formRef.value?.validate((errors) => {
        if (!errors) {
          loading.value = true;
          setTimeout(() => {
            if (form.value.email === "admin@gmail.com" && form.value.password === "1") {
              message.success("Login successful!");
            } else {
              message.error("Invalid email or password.");
            }
            loading.value = false;
          }, 1000);
        }
      });
    };

    const forgotPassword = () => {
      message.info("Redirecting to forgot password...");
    };

    const goToRegister = () => {
      router.push("/register"); 
    };

    return {
      formRef,
      form,
      rules,
      loading,
      handleLogin,
      forgotPassword,
      goToRegister,
    };
  },
};
</script>

<style scoped>
.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: #f4f4f4;
}

.login-card {
  width: 100%;
  max-width: 350px;
}

.forgot-password {
  text-align: center;
  margin-top: 10px;
}

.forgot-link {
  cursor: pointer;
  color: #007bff;
}

.forgot-link:hover {
  text-decoration: underline;
}

.register-section {
  text-align: center;
  margin-top: 15px;
}

.register-section span {
  margin-right: 5px;
  color: #333;
}
</style>
