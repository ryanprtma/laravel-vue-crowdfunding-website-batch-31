<template>
  <div id="app">Halaman social vue</div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  data() {
    return {
      code: "",
      provider: "",
    };
  },
  computed: {
    ...mapGetters({
      user: "auth/user",
    }),
  },
  methods: {
    ...mapActions({
      setALert: "alert/set",
      setAuth: "auth/set",
      setDialogStatus: "dialog/setStatus",
    }),
    go(provider, code) {
      let url = "/api/auth/social/" + provider + "callback?code=" + code;
      axios
        .get(url)
        .then((response) => {
          let { data } = response.data;
          this.setAuth(data);
          if (this.user.user.length > 0) {
            this.setALert({
              status: true,
              color: "success",
              text: "Login Succes",
            });
            this.setDialogStatus(false);
            this.$router.push({ name: "home" });
          } else {
            this.setALert({
              status: true,
              color: "error",
              text: "Login Failed",
            });
          }
        })
        .catch((error) => {
          this.setALert({
            status: true,
            color: "error",
            text: "Login Failed",
          });
        });
    },
    mounted() {
      this.code = this.$route.query.code;
      this.provider = this.$route.path.split("/")[3];
      this.go(this.provider, this.code);
    },
  },
};
</script>
