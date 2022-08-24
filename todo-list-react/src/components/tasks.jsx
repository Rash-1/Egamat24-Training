import TasksContext from "../context/tasks";
import {useContext,useState} from "react";
import Task from "./task"


const Tasks = ()=>{
    const tasksContext = useContext(TasksContext)
    const [label,setLabel] = useState('Task')
    return( <>
        <h1 className="text-center">{label}</h1>
        <div className="tasks">
            {tasksContext.Tasks.map((task,index)=>(
                <Task task={task} key={index}/>
            ))}
        </div>
    </>)

}

export default Tasks;