import {Route,BrowserRouter,Routes,Navigate} from "react-router-dom";
import NavBar from "./components/navBar";
import Home from "./components/home";
import Task from "./components/task";
import Tasks from "./components/tasks";
import CreateTask from "./components/createTask";
import EditTask from "./components/editTask";
import {useContext} from "react";
import Image from "./images/BG-Image.jpg"
const App = ()=>{
    return <>
        <BrowserRouter>
            <NavBar/>
            <Routes>
                <Route path='/home' element={<Home/>}/>,
                <Route path='/' element={<Navigate replace to="/home" />}/>,
                <Route path='/tasks' element={<Tasks/>}>
                    <Route path='edit-task/:taskId' element={<EditTask/>}/>,
                </Route>,
                <Route path='/create-task' element={<CreateTask/>}/>,
            </Routes>
        </BrowserRouter>

    </>
}

export default App;

