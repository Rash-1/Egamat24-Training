import {Route,BrowserRouter,Routes,Navigate} from "react-router-dom";
import NavBar from "./components/navBar";
import Home from "./components/home";
import Task from "./components/task";
import Tasks from "./components/tasks";
import CreateTask from "./components/createTask";
import EditTask from "./components/editTask";
import TasksContext from "./context/tasks";
import {useState, useEffect} from "react";
const App = ()=>{
    const [tasksList, setTasksList] = useState([]);
    useEffect(() => {
        if (localStorage.getItem('Tasks') === null || localStorage.getItem('Tasks') === '[]'){
            let tasks = [...tasksList];
            localStorage.setItem('Tasks',JSON.stringify(tasks));
            console.log('from - mount');
            console.log('local empty')
        }else{
            let oldTasks = JSON.parse(localStorage.getItem('Tasks'))
            setTasksList(oldTasks);
            console.log('local full')
        }
    }, []);
    useEffect(()=>{
     let newtasks = [...tasksList];
     localStorage.setItem('Tasks',JSON.stringify(newtasks));
     console.log(newtasks)
     console.log('taskList updated')
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
                <Route path='/tasks' element={<Tasks/>} />,
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
        console.log(newTasks[index])
        setTasksList(newTasks);
    }
    function TaskEdit(id){
     console.log(id)
    }
}

export default App;

