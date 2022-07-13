<template>
  <v-row justify="center">
    <v-dialog v-model="login" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="text-h5">Login</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field label="Email*" v-model="data.username" required></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field type="password" label="password*" v-model="data.password" required></v-text-field>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-btn color="blue darken-1" text @click="register = true, login = false">
            Register
          </v-btn>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="login = false">
            Close
          </v-btn>
          <v-btn color="blue darken-1" text @click="loginUser()">
            Login
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-dialog v-model="register" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="text-h5">User Profile</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="6" md="6">
                <v-text-field label="First name*" v-model="data.firstname" required></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field label="Last name*" v-model="data.lastname" required></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field label="Email*" required v-model="data.email"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field label="Password*" type="password" v-model="data.password" required></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field label="Phone Number*" v-model="data.phone" required></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-text-field label="Adress*" v-model="data.address" required></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-btn color="blue darken-1" text @click="login = true, register = false">Login</v-btn>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="register = false">
            Close
          </v-btn>
          <v-btn color="blue darken-1" text @click="registerUser()">
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>
<script>
import axios from 'axios';
import { bus } from '../../app';
export default {
  data: () => ({
    login: false,
    register: false,
    data: {}
  }),
  created() {
    bus.$on('openLogin', () => {
      this.login = true
    })
  },
  methods: {
    loginUser() {
      axios.post('/login', this.data).then((response) => {
        bus.$emit('getUser', response.data);
        this.login = false

      });
    },
    registerUser() {
      axios.post('/register', this.data).then((response) => {
        bus.$emit('getUser', response.data);
        this.register = false
      }

      );
    }
  }
};
</script>