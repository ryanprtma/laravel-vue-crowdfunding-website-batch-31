<template>
  <div>
    <!-- template kategori campaign-->
    <v-container class="ma-0 pa-0" grid-list-sm>
      <div class="text-right">
        <v-btn small to="/campaigns" class="blue--text">
          All Campaign <v-icon>mdi-chevron-right</v-icon>
        </v-btn>
      </div>
      <v-layout wrap>
        <v-flex
          v-for="campaign in campaigns"
          :key="`campaign-` + campaign.id"
          xs6
        >
          <v-card :to="`/campaign/` + campaign.id">
            <v-img
              :src="campaign.image"
              class="white--text fill-height"
              height="125"
            >
              <v-card-title
                class="fill-height align-end"
                v-text="campaign.title"
              >
              </v-card-title>
            </v-img>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>

    <v-container class="ma-0 pa-0" grid-list-sm>
      <div class="text-right">
        <v-btn small to="/blogs" class="blue--text">
          All Blogs <v-icon>mdi-chevron-right</v-icon>
        </v-btn>
      </div>
      <v-layout wrap>
        <v-carousel hide-delimiters height="250px">
          <v-carousel-item v-for="blog in blogs" :key="`blog-` + blog.id">
            <v-img :src="blog.image" class="fill-height">
              <v-container fill-height fluid pa-0 ma-0>
                <v-layout fill-height align-end>
                  <v-flex xs12 mx-2>
                    <span
                      class="headline white--text"
                      v-text="blog.title"
                    ></span>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-img>
          </v-carousel-item>
        </v-carousel>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
export default {
  data: () => ({
    campaigns: [],
    blogs: [],
  }),
  created() {
    axios
      .get("api/campaign/random/2")
      .then((response) => {
        let { data } = response.data;
        console.log(data);
        this.campaigns = data.campaigns;
        console.log(this.campaigns);
      })
      .catch(() => {
        let { response } = error;
        console.log(response);
      });

    axios
      .get("api/blog/random/2")
      .then((response) => {
        let { data } = response.data;
        console.log(data);
        this.blogs = data.blogs;
        console.log(this.blogs);
      })
      .catch(() => {
        let { response } = error;
        console.log(response);
      });
  },
};
</script>

