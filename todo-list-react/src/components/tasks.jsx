import TasksContext from "../context/tasks";
import {useContext, useState, useRef, useEffect} from "react";
import Task from "./task"


const Tasks = ()=>{
    const tasksContext = useContext(TasksContext);
    const [label,setLabel] = useState('All Task');
    const [doneTasks,setDoneTasks] = useState([])
    const [checked,setChecked] = useState(true);
    return(
        <>
            <h1 className="text-center">{label}</h1>
            <div className="text-center">
                <label htmlFor="checkBox">Show Done Tasks</label>
                <input checked={!checked} onChange={checkBoxChange}  id="checkBox" type="checkbox" className="form-check-input"/>
            </div>
            {
                !checked ?
                    (
                        <div className="tasks">
                            {doneTasks.map((task,index)=>(
                                <Task task={task} key={index}/>
                            ))}
                        </div>
                    )
                    :
                    (
                        <div className="tasks">
                            {tasksContext.Tasks.map((task,index)=>(
                                <Task task={task} key={index}/>
                            ))}
                        </div>
                    )
            }
        </>
    )

    function checkBoxChange(){
        setChecked(!checked)
        if (checked){
            setLabel('Done Tasks')
            let filteredTasks = tasksContext.Tasks.filter((task)=>{
                return task.status === "Done"
            })
            setDoneTasks(filteredTasks)
        }
        console.log(checked)
    }
}

export default Tasks;