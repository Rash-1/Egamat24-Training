<template>
  <NavBar/>
  <router-view />
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  text-align: center;
}
router-link.router-link-exact-active {
  color: #42b983;
}
</style>
<script>
import NavBar from "@/components/NavBar";
export default {
  components: {
    NavBar,
  }
}
</script>