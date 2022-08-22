<template>
  <NavBar/>
  <router-view />
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  text-align: center;
  min-height: 100vh;
  background-image: url("./assets/images/mainbackground.jpg");
  z-index: 1;
  background-repeat: no-repeat;
  background-size: cover;
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
  },
  data(){
    return{
    }
  }
}
</script>