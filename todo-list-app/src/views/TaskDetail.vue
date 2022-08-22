<template>
  <div class="container mt-5 rounded-5 " :key="counter">
    <div class="massage text-info" >
      <h2>
        Task Details
      </h2>
      <h2 v-if="massage !== ''">
        {{massage}}
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
        <input :value="this.task.deadLine"   ref="deadline" type="datetime-local" class="form-control" id="deadLine" placeholder="Deadline">
      </div>
      <div class="form-group">
        <label for="date">Date</label>
        <input readonly :value="this.task.date"   ref="date" type="text" class="form-control" id="date" >
      </div>
      <div class="form-group">
        <label for="date">Change Date</label>
        <input ref="changeDate" type="datetime-local"  class="form-control" id="changeDate" placeholder="Enter New Date">
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <input readonly :value="this.task.status ? 'Done':'Not Done'"  ref="status" type="text" class="form-control" id="status" >
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
      massage:'',
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
  beforeUpdate() {
    this.task = this.taskFinder(this.$route.params.slug)
    this.counter += 1;
  },
  methods:{
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
     let index = this.tasks.findIndex(myTask =>{
       return myTask.slug === this.task.slug;
     });
      this.tasks[index] = {
        title: this.$refs.title.value,
        description: this.$refs.description.value,
        deadLine: this.$refs.deadline.value,
        date: this.taskChangeDate === '' ? this.$refs.date.value : this.taskChangeDate,
        status: this.$refs.status.value === 'Done',
        slug:this.slugCreator(this.$refs.title.value)
      };
      this.task = this.tasks[index];
      localStorage.setItem('tasks',JSON.stringify(this.tasks));
      this.massage = 'Task Edited Successfully'
      setTimeout(()=>{
        this.$router.push({name:'all-tasks'})
      },3000)
      this.counter +=1;
    },
    slugCreator(str){
      str = str.replace(/^\s+|\s+$/g, ''); // trim
      str = str.toLowerCase();

      // remove accents, swap ñ for n, etc
      const from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
      const to   = "aaaaeeeeiiiioooouuuunc------";
      for (let i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
      }

      str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
          .replace(/\s+/g, '-') // collapse whitespace and replace by -
          .replace(/-+/g, '-'); // collapse dashes

      return str;
    },
  }
}
</script>

<style scoped>
.container{
  min-width: 50%;
  max-width: 70%;
  background-color: #494949;
  padding: 1.5rem;
}
@media(max-width: 1024px)   {
  h1{
    font-size: 1.9rem;
  }
}
h2{
  color:#819ca9;
}
label{
  color: #e0e0e0;
}
</style>