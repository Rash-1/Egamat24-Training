<template >
  <div class="text-center filtering">
    <div>
      <h1>
        (Filter Tasks)
      </h1>
    </div>
    <div>
      <router-link class="btn btn-dark mx-1" to="/tasks-list/all-tasks">All Tasks</router-link>
      <router-link class="btn btn-dark mx-1" to="/tasks-list/done-tasks">Done</router-link>
      <router-link class="btn btn-dark mx-1" to="/tasks-list/not-done-tasks">Not Done</router-link>
      <router-link class="btn btn-dark mx-1" :to="`/tasks-list/tasks-filter-by-date/${currentDate}`">Filter By Date</router-link>
    </div>
  </div>
<div class="container showBox text-center">
  <router-view></router-view>
</div>
</template>
<script>
import moment from "moment";
export default {
  name: "TasksListView",
  data(){
    return{
      counter:0,
      currentDate:moment().format('YYYY-MM-DDTHH:mm')
    }

  },
  computed:{},
}
</script>

<style scoped>
.container {
  border: 3px solid #ccc;
  border-radius:15px ;
  padding: .3rem;
  margin-top: 1.5rem;
  max-height:85vh;
  overflow: scroll;
  position: relative;
  width: 100%;
  min-width: 85%;
}
.showBox{
  max-height: 67vh;
}
.filtering{
  padding: .5rem;
  border: 3px solid #ccc;
  border-radius:15px ;
  max-width: 65%;
  margin: 5px auto;
}
h1{
  color:#e0e0e0 ;
}
.container::-webkit-scrollbar{
  display: none;
}
.table{
  margin: 1rem 0 0 0;
}
@media(min-width: 1024px) {
  .table{
    margin-top: 1.5rem;
  }
}
.header-all{
  display: flex;
  flex-direction: row;
  justify-content: center;
  background-color:transparent ;
  min-width: 50vw;
  padding: .5rem;
  color: cornsilk;
  border-radius: 15px;
}
</style>