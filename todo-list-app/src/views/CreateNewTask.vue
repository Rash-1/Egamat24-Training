<template>
  <div class="container mt-5 rounded-5" :key="counter">
    <h1 class="mb-5">
      Let's Create New Task
    </h1>
   <div class="massage text-info" v-if="massage !== ''">
     <h2>
       {{clearMassage()}}
       {{massage}}
     </h2>
   </div>
    <form>
      <div class="form-group">
        <label  for="title">Title</label>
        <input v-model="task.title"  ref="title" type="text" class="form-control" id="title"  placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
       <textarea v-model="task.description" ref="description" class="form-control" id="description" rows="3" cols="10" placeholder="Enter description"></textarea>
      </div>
      <div class="form-group">
        <label for="deadLine">DeadLine</label>
        <input v-model="task.deadLine" ref="deadline" type="date" class="form-control" id="deadLine" placeholder="Deadline">
      </div>
      <div class="form-group">
        <label for="date">Date</label>
        <input v-model="task.date" ref="date" type="datetime-local" class="form-control" id="date" placeholder="Enter Date">
      </div>
      <p @click="createTask" class="btn btn-primary mt-3">Create Task</p>
    </form>
  </div>
</template>
<script>
import moment from "moment";
export default {
  name: "CreateNewTask",
  data(){
    return{
      task:{
          title:'',
          description:'',
          deadLine:'',
          date:'',
          status:false,
          slug:'',
        },
      massage:'',
      counter:0,
    }
  },
  methods:{
    createTask(){
      if (this.task.title !==''){
        if (this.$refs.date.value === '') {
          this.task.date = moment().format('YYYY-MM-DDTHH:mm')
        }
          if (this.$store.state.tasks !== null && this.$store.state.tasks !== [] ){
            if (this.uniqueChecker(this.task.title)) {
              this.task.slug = this.slugCreator(this.task.title)
              let tasks = this.$store.state.tasks;
              tasks.push(this.task);
              tasks = JSON.stringify(tasks)
              localStorage.setItem('tasks', tasks);
              this.massage = 'Task Created SuccessFully'
              this.clearForm();
            }else {
              this.massage = 'You Have tasks With Same Title'
            }
          }else {
            let tasks =[];
            this.task.slug = this.slugCreator(this.task.title)
            tasks.push(this.task);
            tasks = JSON.stringify(tasks);
            localStorage.setItem('tasks',tasks);
            this.massage = 'Task Created SuccessFully'
            this.clearForm();
          }
      }else {
        this.massage = 'Please Enter A Title';
      }
      console.log('from Create')
      this.counter +=1;
      },
    uniqueChecker(title){
      let tasks = JSON.parse(localStorage.getItem('tasks'))
      let result = true;
      tasks.forEach(task =>{
        if (task.title === title){
          result = false
        }
      })
      return result;
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
    clearForm(){
      this.$refs.title.value = '';
      this.$refs.description.value = '';
      this.$refs.deadline.value = '';
      this.$refs.date.value = '';
      this.task.title = '';
      this.task.description = '';
      this.task.deadLine = '';
      this.task.date = '';
      this.task.slug = '';
    },
    clearMassage(){
      setTimeout(()=>{
        this.massage = ''
      },700);
    },
    },
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