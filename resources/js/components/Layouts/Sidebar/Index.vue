<template>
    <nav id="sidebar">
        <div class="sidebar-header px-3">
            <div class="logo_block pt-4 pb-5">
                <div class="logo">
                  <img src="https://cdn.clipartsfree.net/vector/medium/17906-candy-icon-art-design.png" />
                </div>
            </div>
        </div>

        <ul class="nav flex-column">
            <Menu v-for="menu in sideMenus" :key="menu.id" :menu="menu" />
        </ul>
        <!-- <ul class="list-unstyled components mt-5">
          <Menu v-for="menu in sideMenus" :key="menu.id" :menu="menu" />
        </ul> -->
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
          { id: 1, name: 'Candies', path: '/candies' }
        ]
      }
    }
  }
  </script>
  <style lang="">
      
  </style>