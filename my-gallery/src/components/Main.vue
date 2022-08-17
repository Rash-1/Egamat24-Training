<template>
  <div class="main">
    <div class="gallery rounded-5 container bg-secondary mt-5 text-center">
      <Gallery/>
    </div>
  </div>
</template>

<script>
import Gallery from "@/components/Gallery";
export default {
  name: "main",
  components:{
    Gallery,
  },
}
</script>

<style scoped>
.main{
  background-color: #ccc;
  padding: 1rem;
  border-radius: 1rem;
  margin-top: 10rem;
}
.gallery{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-content: center;
  padding: 1rem;
}
</style>