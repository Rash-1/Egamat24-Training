import {Route,BrowserRouter,Routes} from "react-router-dom";
import NavBar from "./components/navBar";
import Home from "./components/home";
import Task from "./components/task";
import Tasks from "./components/tasks";
import CreateTask from "./components/createTask";
import {useContext} from "react";
import Image from "./images/BG-Image.jpg"
const App = ()=>{
    return <>
        <img style={{backgroundRepeat:"no-repeat",backgroundSize:"cover",width:"100vw",height:"100vh"}} src={Image} alt="background"/>
    </>
}

export default App;

