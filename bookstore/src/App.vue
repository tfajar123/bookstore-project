<template>
  <v-app>
    <c-header />

    <c-side-bar />
    
    <v-content>
      <v-slide-y-transition mode="out-in">
        <router-view></router-view>
      </v-slide-y-transition>
    </v-content>

    <c-footer />

    <c-alert />
    <!--<v-dialog v-model="dialog" fullscreen hide-overlay transition="dialogbottom-transition">
      <search />
    </v-dialog>-->

    <keep-alive>
      <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialogbottom-transition">
        <component :is="currentComponent"></component>
      </v-dialog>
    </keep-alive>

  </v-app>
</template>

<script>
  /* eslint-disable */
  import CHeader from '@/components/CHeader.vue'
  import CFooter from '@/components/CFooter.vue'
  import CSideBar from '@/components/CSideBar.vue'
  import CAlert from '@/components/CAlert.vue'
  import Search from '@/views/Search.vue'
  import Login from '@/views/Login.vue'
  import Register from '@/views/Register.vue'
  import Cart from '@/views/Cart.vue'
  import { mapActions, mapGetters } from 'vuex'

  export default {
    name: 'App',
    components: {
      CHeader,
      CFooter,
      CSideBar,
      CAlert,
      Search,
      Login,
      Register,
      Cart,
    },
    methods: {
      ...mapActions({
        setStatusDialog : 'dialog/setStatus',
      }),
    },
    computed: {
      ...mapGetters({
          statusDialog : 'dialog/status',
          currentComponent : 'dialog/component'
      }),
      dialog: {
        get() {
          return this.statusDialog
        },
        set(value) {
          this.setStatusDialog(value)
        }
      },
    },
    }



</script>

<style type="text/css">
  .v-toolbar {
    flex: 0 !important;
  }
  .v-application .py-3 {
    text-align: center !important;
  }
  .v-card__text {
    text-align: center !important;
  }
</style>