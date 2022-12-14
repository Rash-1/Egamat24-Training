import {Route,BrowserRouter,Routes,Navigate} from "react-router-dom";
import NavBar from "./components/navBar";
import Home from "./components/home";

import TasksList from "./components/tasksList";
import CreateTask from "./components/createTask";
import EditTask from "./components/editTask";
import AllTasks from "./components/allTasks";
import TasksFilterByDate from "./components/tasksFilteredByDate"
import TasksContext from "./context/tasks";
import {useState, useEffect} from "react";
const App = ()=>{
    const [tasksList, setTasksList] = useState([]);
    useEffect(() => {
        if (localStorage.getItem('Tasks') === null || localStorage.getItem('Tasks') === '[]'){
            let tasks = [...tasksList];
            localStorage.setItem('Tasks',JSON.stringify(tasks));
        }else{
            let oldTasks = JSON.parse(localStorage.getItem('Tasks'))
            setTasksList(oldTasks);

        }
    }, []);
    useEffect(()=>{
     let newTasks = [...tasksList];
     localStorage.setItem('Tasks',JSON.stringify(newTasks));
    })
    return <>
        <BrowserRouter>
            <TasksContext.Provider
                value={
               {
                   Tasks : tasksList,
                   OnAddTasks : AddTask,
                   OnDeleteTask : DeleteTask,
                   OnTaskStatusChanger : TaskStatusChanger,
                   OnEditTask : TaskEdit,
               }
            }>
            <NavBar/>
            <Routes>
                <Route path='/home' element={<Home/>}/>,
                <Route path='/' element={<Navigate replace to="/home" />}/>,
                <Route path='/tasks' element={<TasksList/>} >
                    <Route path='all-tasks' element={<AllTasks/>}/>,
                    <Route path='tasks-filtered-by-date' element={<TasksFilterByDate/>}/>,
                </Route>,
                <Route path='edit-task/:taskId' element={<EditTask/>}/>,
                <Route path='/create-task' element={<CreateTask/>}/>,
            </Routes>
            </TasksContext.Provider>
        </BrowserRouter>
    </>
    function AddTask(task){
       let newTasks = [...tasksList];
        newTasks = [...newTasks,task];
        setTasksList(newTasks);
    }
    function DeleteTask(id){
        let newTasks = tasksList.filter((task)=>{
            return task.id !== id
        })
        setTasksList(newTasks);
    }
    function TaskStatusChanger(id){
        let newTasks = [...tasksList]
        let index = tasksList.findIndex((task)=>{
            return task.id === id
        })
        newTasks[index].status = newTasks[index].status === 'Not Done'? newTasks[index].status = "Done" : newTasks[index].status = "Not Done"
        setTasksList(newTasks);
    }
    function TaskEdit(id){
        // let index =  tasksList.findIndex((task)=>{
        //     return task.id = id;
        // })
        // let newTasks = [...tasksList];
        // newTasks[index].title = newTaskValues.title;
        // newTasks[index].description = newTaskValues.description;
        // newTasks[index].date = newTaskValues.date;
        // setTasksList(newTasks);
        console.log(id);
        // console.log(newTaskValues);
    }
}

export default App;

