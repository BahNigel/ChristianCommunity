<template>
  <div>
    <h2>Register</h2>
    <form @submit.prevent="register">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" v-model="registerForm.name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" v-model="registerForm.email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" v-model="registerForm.password">
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <h2>Login</h2>
    <form @submit.prevent="login">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" v-model="loginForm.email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" v-model="loginForm.password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <button @click="logout" v-if="loggedIn" class="btn btn-danger">Logout</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      registerForm: {
        name: '',
        email: '',
        password: '',
      },
      loginForm: {
        email: '',
        password: '',
      },
      loggedIn: false,
    };
  },
  methods: {
    register() {
      axios.post('/register', this.registerForm)
        .then(response => {
          alert('Registration successful!');
          this.registerForm = {
            name: '',
            email: '',
            password: '',
          };
        })
        .catch(error => {
          alert('Registration failed!');
          console.error(error.response);
        });
    },
    login() {
      axios.post('/login', this.loginForm)
        .then(response => {
          alert('Login successful!');
          this.loginForm = {
            email: '',
            password: '',
          };
          this.loggedIn = true;
          window.localStorage.setItem('access_token', response.data.access_token);
        })
        .catch(error => {
          alert('Login failed!');
          console.error(error.response);
        });
    },
    logout() {
      axios.post('/logout', {}, {
        headers: { 'Authorization': 'Bearer ' + window.localStorage.getItem('access_token') }
      }).then(response => {
        alert('Logout successful!');
        this.loggedIn = false;
        window.localStorage.removeItem('access_token');
      }).catch(error => {
        console.error(error.response);
      });
    },
  },
  mounted() {
    if (window.localStorage.getItem('access_token')) {
      this.loggedIn = true;
    }
  },
};
</script>