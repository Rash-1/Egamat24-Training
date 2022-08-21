<template>
  <div class="table">
    <div class="header-all">
      <h1  class="table-title">
        {{ massage }}
      </h1>
    </div>
    <div  v-if="tasks != null && tasks.length > 0">
      <table class="table-striped-columns table table-dark">
        <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Create Time</th>
          <th scope="col">DeadLine</th>
          <th scope="col">Detail</th>
          <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody v-for="task  in tasks" :key="counter">
        <tr v-if="task.status === false">
          <td>{{ task.title }}</td>
          <td>{{ task.description }}</td>
          <td>{{task.date}}</td>
          <td>{{ task.deadLine }}</td>
          <td>
            <router-link :to=" `/task-detail/${task.slug}` ">
              Detail
            </router-link>
          </td>
          <td class="status">
            <img alt="check" @click="statusChanger(task)"  width="40" v-if="task.status" :src="checkLogo">
            <img alt="uncheck"  @click="statusChanger(task)" width="40" v-else :src="uncheckLogo">
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "NotDoneTasks",
  data(){
    return{
      massage:'Not Done Tasks',
      counter:0,
      tasks:this.$store.state.tasks,
      checkLogo:require('../assets/images/check.png'),
      uncheckLogo:require('../assets/images/uncheck.png'),
    }
  },
  methods:{
    statusChanger(task){
      let tasks = this.tasks;
      let result = '';
      let index = tasks.findIndex(T=>{
        return T.title === task.title;
      })
      task.status =!task.status;
      this.tasks[index].status = task.status;
      let data =JSON.stringify(this.tasks)
      localStorage.setItem('tasks',data);
      this.counter += 1;
    },
  },
  computed:{

  },
  beforeUpdate() {
    this.tasks = JSON.parse(localStorage.getItem('tasks'))
  },
  mounted() {
    if (localStorage.getItem('tasks') != null && localStorage.getItem('tasks') !== '[]'){
      this.tasks = JSON.parse(localStorage.getItem('tasks'));
    }else {
      this.massage = 'You Have No Task To Do'
    }
  },
}
</script>

<style scoped>

</style>