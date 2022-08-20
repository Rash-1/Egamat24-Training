import { createRouter, createWebHistory } from 'vue-router'
import HomeView          from '../views/HomeView.vue'
import CreateNewTask     from '../views/CreateNewTask'
import TasksListView     from "@/views/TasksListView";
import DoneTasks         from "@/views/DoneTasks";
import NotDoneTasks      from "@/views/NotDoneTasks";
import TasksFilterByDate from "@/views/TasksFilterByDate";
import TaskDetail        from "@/views/TaskDetail";
import AllTasks          from "@/views/AllTasks"
const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/tasks-list',
    name: 'tasks-list',
    component: TasksListView,
    children:[
      {
        path: 'done-tasks',
        name: 'done-tasks',
        component: DoneTasks,
      },
      {
        path: 'not-done-tasks',
        name: 'not-done-tasks',
        component: NotDoneTasks,
      },
      {
        path: 'tasks-filter-by-date/:date',
        name: 'tasks-filter-by-date',
        component: TasksFilterByDate,
      },
      {
        path: 'all-tasks',
        name: 'all-tasks',
        component: AllTasks,
      },
    ],
  },
  {
    path: '/task-detail/:slug',
    name: 'task-detail',
    component: TaskDetail,
  },
  {
    path: '/create-new-task',
    name: 'create-new-task',
    component: CreateNewTask,
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
