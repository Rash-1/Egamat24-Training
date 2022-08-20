<template>
  <div class="container mt-5 rounded-5" :key="counter">
    <div class="massage text-info" >
      <h2>
        Task Details
      </h2>
    </div>
    <form>
      <div class="form-group">
        <label  for="title">Title</label>
        <input :value="this.task.title"   ref="title" type="text" class="form-control" id="title"  placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea :value="this.task.description"  ref="description" class="form-control" id="description" rows="3" cols="10" placeholder="Enter Description"></textarea>
      </div>
      <div class="form-group">
        <label for="deadLine">DeadLine</label>
        <input :value="this.task.deadLine"   ref="deadline" type="text" class="form-control" id="deadLine" placeholder="Deadline">
      </div>
      <div class="form-group">
        <label for="date">Date</label>
        <input readonly :value="this.task.date"   ref="date" type="text" class="form-control" id="date" >
      </div>
      <div class="form-group">
        <label for="date">Change Date</label>
        <input ref="date" type="datetime-local"  class="form-control" id="changeDate" placeholder="Enter New Date">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <input readonly :value="this.task.status ? 'Done':'Not Done'"  ref="date" type="text" class="form-control" id="status" >
      </div>
      <p @click="removeTask()" class="btn btn-danger mx-2 mt-3">Remove Task</p>
      <p @click="editTask()" class="btn btn-warning mt-3">Edit Task</p>
    </form>
  </div>
</template>

<script>
export default {
  name: "TaskDetail",
  data(){
    return{
      counter:0,
      tasks:'',
      task:'',
      taskTitle:'',
      taskDescription:'',
      taskDeadLine:'',
      taskChangeDate:'',
    }
  },
  mounted() {
    this.tasks = this.$store.state.tasks;
    this.task = this.taskFinder(this.$route.params.slug)
  },
  methods:{
    // timeSeparator(time){
    //   let myTimeArray = time.split('T')
    //   let inputTime = myTimeArray[1];
    //   let inputDate = myTimeArray[0]
    //   let hour = inputTime.split(':')[0]
    //   let minute = inputTime.split(':')[1]
    //   let year = inputDate.split('-')[0]
    //   let month = inputDate.split('-')[1]
    //   let day = inputDate.split('-')[2]
    //   return[
    //     year,
    //     month,
    //     day,
    //     hour,
    //     minute,
    //   ]
    // },
    taskFinder(slug){
      return  this.tasks.find(T => {return T.slug === slug;})
    },
    removeTask(){
      let index = this.tasks.findIndex(task=>{
        return task.slug === this.task.slug
      } )
      this.tasks.splice(index,1)
      let data = JSON.stringify(this.tasks)
      localStorage.setItem('tasks',data)
      this.counter += 1;
      this.$router.push({name:'all-tasks'});
    },
    editTask(){

    },
  }
}
</script>

<style scoped>
.container{
  min-width: 50%;
  max-width: 70%;
  background-color: #607d8b;
  padding: 1.5rem;
}
@media(max-width: 1024px)   {
  h1{
    font-size: 1.9rem;
  }
}
h1{
  color:#c3fdff;
}
</style>