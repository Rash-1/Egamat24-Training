<script>
import VueEasyLightbox from 'vue-easy-lightbox'

export default {
  components: {
    VueEasyLightbox
  },
  name:'gallery',
  data() {
    return {
      imgs:[
        require('../assets/images/1.jpg')  ,
        require('../assets/images/2.jpg')  ,
        require('../assets/images/3.jpg')  ,
        require('../assets/images/4.jpg')  ,
        require('../assets/images/5.jpg')  ,
      ],
      visible: false,
      index: 0
    }
  },
  methods: {
    showSingle() {
      this.show()
    },
    showMultiple() {
      this.imgs = [
        require('../assets/images/1.jpg')  ,
        require('../assets/images/2.jpg')  ,
        require('../assets/images/3.jpg')  ,
        require('../assets/images/4.jpg')  ,
        require('../assets/images/5.jpg')  ,
      ]
      this.index = 0
      this.show()
    },
    show() {
      this.visible = true
    },
    handleHide() {
      this.visible = false
    }
  }
}
</script>
<template>
    <button class="btn btn-dark mb-2" @click="showSingle">Show single picture.</button>
    <button class="btn btn-dark mb-2" @click="showMultiple">Show a group of pictures.</button>

    <!-- all props & events -->
    <vue-easy-lightbox
          escDisabled
          moveDisabled
          :visible="visible"
          :imgs="imgs"
          :index="index"
          @hide="handleHide"
    >
    </vue-easy-lightbox>
</template>
<style scoped>

</style>