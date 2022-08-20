<template>
  <nav class="navbar p-2 bg-dark text-white justify-content-lg-between justify-content-sm-start mb-1 ">
    <img class="navbar-brand" width="80" :src="logo" alt="Logo">
    <div class="d-flex mx-4">
      <router-link :class="linksClass" to="/">Home</router-link>
      <router-link :class="linksClass" to="/tasks-list">Tasks List</router-link>
      <router-link :class='linksClass' to="/create-new-task">CreateNewTask</router-link>
    </div>
  </nav>
</template>

<script>
export default {
  name: "NavBar",
  data(){
    return{
      linksClass:'nav-link mx-3 ',
      logo:require('../assets/images/todo logo.png')
    }
  }
}
</script>

<style scoped>
.router-link-exact-active{
  color: #4263c1;
}
.navbar-brand{
  border-radius: 70%;
}
@media(max-width: 1024px) {
}
</style>