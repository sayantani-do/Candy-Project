<template>
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="logo_block">
                <div class="logo">
                  <img src="https://cdn.clipartsfree.net/vector/medium/17906-candy-icon-art-design.png" />
                </div>
            </div>
        </div>
        <ul class="list-unstyled components mt-5">
          <!-- <li><router-link exact-active-class="active"><span class="">Dashboard</span></router-link></li> -->
          <Menu v-for="menu in sideMenus" :key="menu.id" :menu="menu" />
          <!-- <li><a class="dropdown-item" href="javascript:void(0)" @click="logout"><span class="">Logout</span></a></li> -->
        </ul>
    </nav>
</template>

<script>
  import Menu from './Menu.vue';
  export default {
    name:'sidebar',
    components: { Menu },
    data(){
      return {
        sideMenus: [
          { id: 1, name: 'Candies', path: '/candies' },
          { id: 2, name: 'Cart', path: '/'},
        ]
      }
    }
  }
  </script>
  <style lang="">
      
  </style>