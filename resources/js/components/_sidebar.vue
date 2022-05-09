<template>
  <v-list dense>
    <v-list-tile exact to="/admin">
      <v-list-tile-action>
        <v-icon>dashboard</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>Dashboard</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>

    <v-list-group no-action>
      <v-list-tile slot="activator">
          <v-list-tile-action>
              <v-icon>account_circle</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Common</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>

      <v-list-tile to="/admin/common">
          <v-list-tile-action>
              <v-icon>settings</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Common</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>
    </v-list-group>

    <v-list-group no-action>
      <v-list-tile slot="activator">
        <v-list-tile-action>
          <v-icon>account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>User Management</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

      <v-list-tile to="/admin/users">
        <v-list-tile-action>
          <v-icon>account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Users</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list-group>

    <v-list-group no-action>
      <v-list-tile slot="activator">
          <v-list-tile-action>
              <v-icon>settings</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Main page</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>

      <v-list-tile to="/admin/main/slider">
          <v-list-tile-action>
              <v-icon>settings</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Main slider</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>

      <v-list-tile to="/admin/about">
          <v-list-tile-action>
              <v-icon>settings</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>About fond</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>

      <v-list-tile to="/admin/news">
          <v-list-tile-action>
              <v-icon>settings</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>News</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>

      <v-list-tile to="/admin/projects">
          <v-list-tile-action>
              <v-icon>settings</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Project</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>
      <v-list-tile to="/admin/reports">
          <v-list-tile-action>
              <v-icon>settings</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Reports</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>
    </v-list-group>
    <v-list-group no-action>
          <v-list-tile slot="activator">
              <v-list-tile-action>
                  <v-icon>settings</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>About page</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/about">
              <v-list-tile-action>
                  <v-icon>settings</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>About fond</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
        <v-list-tile to="/admin/about-service">
            <v-list-tile-action>
                <v-icon>settings</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title>About service</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
        <v-list-tile to="/admin/team">
            <v-list-tile-action>
                <v-icon>settings</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title>Команда</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
      </v-list-group>
  </v-list>
</template>


<script>
export default {

}

</script>


