<template>
  <div>
    <v-card :to="`/campaign/` + campaign.id">
      <v-img :src="campaign.image" class="white--text fill-height" height="200">
        <v-card-title class="fill-height align-end" v-text="campaign.title">
        </v-card-title>
      </v-img>

      <v-card-actions>
        <v-progress-linear v-model="progress" color="blue-grey" height="7">
        </v-progress-linear>
      </v-card-actions>

      <v-card-actions>
        <v-icon>mdi-cash</v-icon>
        <span>Rp {{ campaign.required }}</span>
        <v-spacer></v-spacer>
        <span>{{ progress }}%</span>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "campaign-item",
  props: ["campaign", "index"],
  computed: {
    progress() {
      return (this.campaign.collected / this.campaign.required) * 100;
    },
  },
};
</script>