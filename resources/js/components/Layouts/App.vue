<template>
    <wrapper class="d-flex h-100">
      <Sidebar />
      <div id="content" class="overflow-hidden w-100">
        <Header />
        <div class="container px-5 mt-5">
          <router-view></router-view>
        </div>
      </div>
    </wrapper>
  </template>
  
  <script>
  
  import Sidebar from './Sidebar/Index.vue';
  import Header from './Header.vue';
  export default {
      name:'app',
      components: {
        Sidebar,
        Header
      }
  }
  </script>