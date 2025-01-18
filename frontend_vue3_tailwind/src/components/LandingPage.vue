<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <div class="">
      <div
        class="w-96 p-2 mx-auto bg-white flex flex-row mb-4 rounded-md justify-between shadow-[0px_0px_15px_rgba(0,0,0,0.09)]">

        <!-- Options -->
        <label for="login" class="selection-option" @click="selection = 0">
          <div class="fill-blue-500"></div>
          Ingresar
          <input checked type="radio" name="status" class="radio-input peer" id="login" />
        </label>
        <label for="register" class="selection-option" @click="selection = 1">
          <div></div>
          Registrarse
          <input type="radio" name="status" class="radio-input peer" id="register" />
        </label>
      </div>



      <!-- Login -->
      <div id="login-form" class="w-96 h-80 p-4 mx-auto bg-indigo-50 rounded shadow flex flex-col justify-between"
        v-show="selection === 0">
        <form class="form-container" @submit.prevent="login">
          <fieldset class="form-fieldset">
            <legend class="form-legend">¡Bienvenido a la página!</legend>

            <label class="form-label" for="email">Email</label>
            <input class="form-input" type="email" v-model="loginemail" name="email" autocomplete="email" required />

            <label class="form-label" for="password">Contraseña</label>
            <input class="form-input" type="password" v-model="loginpassword" name="password"
              autocomplete="current-password" required />

            <button class="form-button" type="submit">Ingresar</button>
            <p v-if="errorMessagelogin" style="color: red;">{{ errorMessagelogin }}</p>
          </fieldset>
        </form>
      </div>



      <!-- Register -->
      <div id="register-form" class="w-96 h-auto p-4 mx-auto bg-indigo-50 rounded shadow flex flex-col justify-between"
        v-show="selection === 1">
        <form @submit.prevent="register">
          <fieldset class="form-fieldset">
            <legend class="form-legend">¡Bienvenido a la página!</legend>

            <label class="form-label" for="name">Nombre</label>
            <input class="form-input" type="text" v-model="registername" name="name" autocomplete="given-name"
              required />

            <label class="form-label" for="lastname">Apellido</label>
            <input class="form-input" type="text" v-model="registerlastname" name="lastname" autocomplete="family-name"
              required />

            <label class="form-label" for="tel">Número de Teléfono</label>
            <input class="form-input" type="text" v-model="registertel" name="tel" autocomplete="tel" required
              @input="errorMessageregister = ''" />

            <label class="form-label" for="email">Email</label>
            <input class="form-input" type="email" v-model="registeremail" name="email" autocomplete="email" required
              @input="errorMessageregister = ''" />

            <label class="form-label" for="password">Contraseña</label>
            <input class="form-input" type="password" v-model="registerpassword" name="password"
              autocomplete="new-password" required @input="errorMessageregister = ''" />

            <label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
            <input class="form-input" type="password" v-model="registerpassword_confirmation"
              name="password_confirmation" autocomplete="new-password" required />

            <button class="form-button" type="submit">Registrarse</button>
            <p v-if="errorMessageregister" style="color: red;">{{ errorMessageregister }}</p>
            <p v-if="successMessage" class="text-green-500 font-medium mb-2">
              {{ successMessage }}</p>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import api from '../services/api'

const registername = ref('')
const registerlastname = ref('')
const registertel = ref('')
const registeremail = ref('')
const registerpassword = ref('')
const loginemail = ref('')
const loginpassword = ref('')
const errorMessagelogin = ref('')
const errorMessageregister = ref('')
const successMessage = ref('');
const message = ref('')
const registerpassword_confirmation = ref('')
const router = useRouter();
let selection = ref(0);



const register = async () => {
  if (!validatePhoneNumber(registertel.value)) {
    errorMessageregister.value = 'Número de teléfono inválido';
    return;
  }
  try {
    const response = await api.post('/register', {
      name: registername.value,
      lastname: registerlastname.value,
      tel: registertel.value,
      email: registeremail.value,
      password: registerpassword.value,
      password_confirmation: registerpassword_confirmation.value,
    });
    message.value = response.data.message;
    successMessage.value = '¡Usuario registrado exitosamente!';
  }
  catch (error) {
    if (error.response && error.response.status === 422) {
      const errors = error.response.data.errors;

      if (errors.email) {
        errorMessageregister.value = 'El correo ya está registrado.';
      }

      else if (errors.password) {
        errorMessageregister.value = 'La contraseña debe ser de al menos 8 caracteres.';
      }

      else {
        errorMessageregister.value = 'Error en el registro. Revisa los campos ingresados.';
      }
    } else {
      errorMessageregister.value = 'Error en el servidor. Intenta nuevamente más tarde.';
      console.error(error);
    }
  }

}

const login = async () => {
  try {
    console.log(loginemail.value, loginpassword.value)

    const response = await api.post('/login', {
      email: loginemail.value,
      password: loginpassword.value,
    });
    localStorage.setItem('user', JSON.stringify(response.data.user));
    router.push({ name: 'Profile' });
  }
  catch (error) {
    errorMessagelogin.value = 'Email o contraseña incorrectos';
    console.error(error);
  }
}

const validatePhoneNumber = (phone) => {
  const regex = /^\+?\d{1,3}[- ]?\d{8,15}$/;
  return regex.test(phone);
};


</script>

<script>
export default {
  name: 'LandingPage',
  props: {
    msg: String
  }
}

</script>
