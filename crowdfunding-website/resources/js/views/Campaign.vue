<template>
  <div>
    <v-card v-if="campaign.id">
      <v-img :src="campaign.image" class="white--text" height="200px">
        <v-card-title
          class="fill-height align-end"
          v-text="campaign.title"
        ></v-card-title>
      </v-img>
      <v-card-text>
        <v-simple-table dense>
          <tbody>
            <tr>
              <td><v-icon>mdi-home-city</v-icon> Alamat</td>
              <td>{{ campaign.address }}</td>
            </tr>
            <tr>
              <td><v-icon>mdi-hand-heart</v-icon> Terkumpul</td>
              <td class="blue--text">
                {{
                  collected
                    ? `Rp ${collected.toLocaleString()}`
                    : "belum ada donasi"
                }}
              </td>
            </tr>
            <tr>
              <td><v-icon>mdi-cash</v-icon> Dibutuhkan</td>
              <td class="orange--text">
                {{
                  required
                    ? `Rp ${required.toLocaleString()}`
                    : "belum ada donasi"
                }}
              </td>
            </tr>
          </tbody>
        </v-simple-table>
        Description: <br />
        {{ campaign.description }}
      </v-card-text>
      <v-card-actions>
        <v-btn
          elevation="0"
          block
          color="primary"
          @click="donate"
          :disable="campaign.collected >= campaign.required"
        >
          <v-icon>mdi-money</v-icon> &nbsp; DONATE
        </v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
export default {
  data: () => ({
    campaign: {},
    required: null,
    collected: null,
  }),
  created() {
    this.go();
  },
  methods: {
    go() {
      let { id } = this.$route.params;
      let url = "/api/campaign/" + id;
      axios
        .get(url)
        .then((response) => {
          let { data } = response.data;
          this.campaign = data.campaign;
          this.required = data.campaign.required;
          this.collected = data.campaign.collected;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    donate() {
      this.$store.commit("insert");
    },
  },
};
</script>