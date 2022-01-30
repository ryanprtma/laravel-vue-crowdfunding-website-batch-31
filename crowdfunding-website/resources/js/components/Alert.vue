<template>
  <v-snackbar
    v-model="alert"
    color="success"
    button
    timeout="4000"
    multi-line
    outlined
  >
    {{ text }}
    <template v-slot:action="{ tombol }">
      <v-btn color="red" text v-bind="tombol" @click="close"> close </v-btn>
    </template>
  </v-snackbar>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "alert",
  computed: {
    ...mapGetters({
      status: "alert/status",
      color: "alert/color",
      text: "alert/text",
    }),
    alert: {
      get() {
        return this.status;
      },
      set(value) {
        this.setAlert({
          status: value,
        });
      },
    },
  },
  methods: {
    ...mapActions({
      setAlert: "alert/set",
    }),
    close() {
      this.setAlert({
        status: false,
      });
    },
  },
};
</script>

