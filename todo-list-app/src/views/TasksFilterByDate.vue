<template>
  <div class="table">
    <div class="header-all d-flex flex-row justify-content-between ">
      <h1 class="arrows" @click="previousDay()">&lt</h1>
      <h1  class="table-title">
        {{ massage }}
      </h1>
      <h1 class="arrows" @click="nextDay()">&gt</h1>
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
        <tbody v-for="task  in filteredTasks" :key="counter">
        <tr >
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
import moment from "moment";
export default {
  name: "TasksFilteredByDate",
  data(){
    return{
      massage:'Today',
      counter:0,
      tasks:this.$store.state.tasks,
      checkLogo:require('../assets/images/check.png'),
      uncheckLogo:require('../assets/images/uncheck.png'),
      taskDate:'',
      filteredTasks:'',
      currentDate:moment().format('YYYY-MM-DDTHH:mm'),
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
    DateSeparator(date){
      let separatedDate = date.split('T');
      let Date = separatedDate[0].split('-');
      let year = Date[0];
      let month = Date[1];
      let day = Date[2];
      return[
          year,
          month,
          day,
      ]
    },
    nextDay(){
      this.filteredTasks = this.tasks.filter(T=>{
        let CurrentD = this.DateSeparator(this.currentDate);
        let TaskDate = this.DateSeparator(T.date)
        return TaskDate[0] === CurrentD[0] && TaskDate[1] === CurrentD[1] && TaskDate[2] === CurrentD[2]+1;

      })
      this.massage ='tomorrow'
    },
    previousDay(){
      this.filteredTasks = this.tasks.filter(T=>{
        let CurrentD = this.DateSeparator(this.currentDate);
        let TaskDate = this.DateSeparator(T.date)
        return TaskDate[0] === CurrentD[0] && TaskDate[1] === CurrentD[1] && TaskDate[2] === CurrentD[2]-1;
      })
      this.massage ='yesterday'
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
      this.filteredTasks = this.tasks.filter(T=>{
        let CurrentD = this.DateSeparator(this.currentDate);
        let TaskDate = this.DateSeparator(T.date)
        return TaskDate[0] === CurrentD[0] && TaskDate[1] === CurrentD[1] && TaskDate[2] === CurrentD[2];
      })
    }else {
      this.massage = 'You Have No Task To Do'
    }
  },
}
</script>

<style scoped>
h1{
  color: #e0e0e0;
}
.arrows{
  cursor:pointer;
}
</style>