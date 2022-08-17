
<script>
import Main from './components/Main.vue';
export default {
  components:{
    Main
  },
}
</script>
<template>
  <Main/>
</template>

<style>
body {
  margin: 10px !important;
}
*{
  margin:0 ;
  padding: 0;
  box-sizing: border-box;
}
#app{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
}
</style>
