<template>
  <v-app id="inspire">
    <v-app-bar app shrink-on-scroll>

      <v-toolbar-title>Weather based on user coordinates</v-toolbar-title>

    </v-app-bar>

    <v-main>
      <v-container>
        <v-simple-table class="pa-6">
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">
                  ID
                </th>
                <th class="text-left">
                  Name
                </th>
                <th class="text-left">
                  Email
                </th>
                <th class="text-left">
                  Weather Detail
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">

                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>
                  <div class="text-center">
                    <v-dialog :key="user.id" v-model="dialog" width="500">
                      <template v-slot:activator="{ on, attrs }">
                        <v-btn color="red lighten-2" dark v-bind="attrs" v-on="on">
                          Show
                        </v-btn>
                      </template>

                      <v-card>
                        <v-card-title class="text-h5 grey lighten-2">
                          {{ user.weather.name ? user.weather.name : 'unknown' }} - {{ user.weather.weather_main }}
                        </v-card-title>

                        <v-card-text>
                          {{ user.weather.weather_description }}
                        </v-card-text>

                        <v-simple-table fixed-header height="300px">
                          <template v-slot:default>
                            <thead>
                              <tr>
                                <th class="text-left">
                                  Title
                                </th>
                                <th class="text-left">
                                  Value
                                </th>
                              </tr>
                            </thead>
            <tbody>
              <tr>
                <td>Current Temp</td>
                <td>{{ user.weather.temp + ' C' }}</td>
              </tr>
              <tr>
                <td>Real Feel</td>
                <td>{{ user.weather.feel_temp + ' C' }}</td>
              </tr>
              <tr>
                <td>Minimum Temp</td>
                <td>{{ user.weather.min_temp + ' C' }}</td>
              </tr>
              <tr>
                <td>Max Temp</td>
                <td>{{ user.weather.max_temp + ' C' }}</td>
              </tr>
              <tr>
                <td>Pressure</td>
                <td>{{ user.weather.pressure + ' pha' }}</td>
              </tr>
              <tr>
                <td>Humidity</td>
                <td>{{ user.weather.humidity + ' %' }}</td>
              </tr>
              <tr>
                <td>Visibility</td>
                <td>{{ user.weather.visibility + ' M' }}</td>
              </tr>

              <tr>
                <td>Wind Speed</td>
                <td>{{ user.weather.speed_wind + ' KM' }}</td>
              </tr>
              <tr>
                <td>Last Update</td>
                <td>{{ moment(user.weather.updated_at).format("DD-MM-YYYY H:m:s") }}</td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>

        <v-divider></v-divider>

        </v-card>
        </v-dialog>
        </div>
        </td>

        </tr>
        </tbody>
        </template>
        </v-simple-table>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import moment from "moment";

export default {
  data() {
    return {
      users: [],
      moment: moment
    }
  },
  created() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      axios.get('http://127.0.0.1:8000/')
        .then(response => {
          if (response.data.users) {
            this.users = response.data.users
          }
        })
        .catch(error => {
          alert('sorry something went wrong :(')
        }
        );
    }
  }

}
</script>