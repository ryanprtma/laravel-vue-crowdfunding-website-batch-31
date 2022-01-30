<template>
  <div id="app">
    <v-app>
      <alert></alert>

      <!-- <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      transition="scale-transition"
    >
      <search @close="closeDialog"></search>
    </v-dialog> -->

      <keep-alive>
        <v-dialog
          v-model="dialog"
          fullscreen
          hide-overlay
          persistent
          transition="dialog-bottom"
        >
          <component
            :is="currentComponent"
            @close="setDialogStatus"
          ></component>
        </v-dialog>
      </keep-alive>

      <!-- sidebar -->
      <v-navigation-drawer app v-model="drawer">
        <v-list>
          <v-list-item v-if="!guest">
            <v-list-item-avatar>
              <v-img
                src="https://randomuser.me/api/portraits/men/78.jpg"
              ></v-img>
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title>{{ user.user.name }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <div class="pa-2" v-if="guest">
            <v-btn
              elevation="0"
              block
              color="primary"
              class="mb-1"
              @click="setDialogComponent('login')"
            >
              <v-icon left>mdi-lock</v-icon>
              Login
            </v-btn>
            <v-btn elevation="0" block color="succes">
              <v-icon left>mdi-account</v-icon>
              Register
            </v-btn>
          </div>

          <v-divider></v-divider>

          <v-list-item
            v-for="(item, index) in menus"
            :key="`menu-` + index"
            :to="item.route"
          >
            <v-list-item-icon>
              <v-icon left>{{ item.icon }}</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>

        <template v-slot:append v-if="!guest">
          <div class="pa-2">
            <v-btn block color="red" dark @click="logout">
              <v-icon left>mdi-lock</v-icon>
              Logout
            </v-btn>
          </div>
        </template>
      </v-navigation-drawer>

      <v-app-bar app color="success" dark v-if="isHome">
        <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Crowdfunding App</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
          <v-badge color="orange" overlap v-if="transaction > 0">
            <template v-slot:badge>
              <span>{{ transaction }}</span>
            </template>
            <v-icon>mdi-cash-multiple</v-icon>
          </v-badge>
          <v-icon v-else>mdi-cash-multiple</v-icon>
        </v-btn>

        <v-text-field
          slot="extension"
          hide-details
          append-icon="mdi-microphone"
          flat
          label="Search"
          prepend-inner-icon="mdi-magnify"
          solo-inverted
          @click="setDialogComponent('search')"
          @input="setDialogComponent('search')"
        >
        </v-text-field>
      </v-app-bar>

      <v-app-bar app color="success" dark v-else>
        <v-btn icon @click.stop="$router.go(-1)">
          <v-icon>mdi-arrow-left-circle</v-icon>
        </v-btn>
        <!--pemisah konten-->
        <v-spacer></v-spacer>

        <v-btn icon>
          <v-badge color="orange" overlap v-if="transaction > 0">
            <template v-slot:badge>
              <span>{{ transaction }}</span>
            </template>
            <v-icon>mdi-cash-multiple</v-icon>
          </v-badge>
          <v-icon v-else>mdi-cash-multiple</v-icon>
        </v-btn>
      </v-app-bar>

      <v-main>
        <v-container fluid>
          <v-slide-y-transition>
            <router-view></router-view>
          </v-slide-y-transition>
        </v-container>
      </v-main>

      <v-card>
        <v-footer absolute app>
          <v-card-text class="text-center">
            &copy; {{ new Date().getFullYear() }} - <strong>ryan</strong>
          </v-card-text>
        </v-footer>
      </v-card>
    </v-app>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import Search from "./components/Search.vue";

export default {
  name: "App",
  components: {
    Alert: () => import("./components/Alert.vue"),
    Search: () => import("./components/Search.vue"),
    Login: () => import("./components/Login.vue"),
  },
  data: () => ({
    drawer: true,
    menus: [
      { title: "Home", icon: "mdi-home", route: "/" },
      { title: "Campaigns", icon: "mdi-hand-heart", route: "/campaigns" },
    ],
  }),
  computed: {
    isHome() {
      console.log(this.$route.path);
      return this.$route.path === "/" || this.$route.path === "/home";
    },
    ...mapGetters({
      transaction: "transaction/transactions",
      guest: "auth/guest",
      user: "auth/user",
      dialogStatus: "dialog/status",
      currentComponent: "dialog/component",
    }),
    // transaction() {
    //   return this.$store.getters.transaction;
    // },
    dialog: {
      get() {
        return this.dialogStatus;
      },
      set(value) {
        this.setDialogStatus(value);
      },
    },
  },
  methods: {
    // openSearch() {
    //   this.dialog = true;
    // },
    // closeDialog(value) {
    //   this.dialog = value;
    // },
    ...mapActions({
      setDialogStatus: "dialog/setStatus",
      setDialogComponent: "dialog/setComponent",
      setAuth: "auth/set",
      setAlert: "alert/set",
      checkToken: "auth/checkToken",
    }),
    logout() {
      let config = {
        headers: {
          Authorization: "Bearer" + this.user.token,
        },
      };
      axios.post("/api/auth/logout", {}, config).then((response) => {
        this.setAuth({}); //kosongkan auth
        this.setAlert({
          status: true,
          color: "success",
          text: "Berhasil Keluar",
        });
      });
    },
  },
  mounted() {
    if (this.user) {
      this.checkToken(this.user);
    }
  },
};
</script>