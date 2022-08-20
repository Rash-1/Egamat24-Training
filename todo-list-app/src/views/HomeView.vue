<template>
  <div class=" homed-flex flex-column align-items-center justify-content-center">
   <h1 class="mt-5 msg1">{{massage1}}</h1>
   <h1 class="mt-5 msg2">{{massage2}}</h1>
  </div>
</template>

<script>

export default {
  name: 'HomeView',
  components: {
  },
  data(){
    return{
      massage1:'Welcome To Your',
      massage2:'TODO App',
    }
  },
  methods:{

  }

}
</script>

<style scoped>
@media(max-width: 1024px) {
  .msg1{
    font-size: 4rem;
  }
}
h1{
  font-size: 5rem;
  color: #1f8de8;
}

</style>
