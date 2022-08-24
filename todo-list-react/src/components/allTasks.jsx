import {useContext, useState} from "react";
import TasksContext from "../context/tasks";
import Task from "./task"
import moment from "moment";
const AllTasks = ()=>{
    const tasksContext = useContext(TasksContext);
    const [label,setLabel] = useState('All Task');
    const [doneTasks,setDoneTasks] = useState([])
    const [DoneChecked,setDoneChecked] = useState(true);
    return(
        <>
            <h1 className="text-center">{label}</h1>
            <div className="text-center">
                <div>
                    <label htmlFor="checkBox">Show Done Tasks</label>
                    <input checked={!DoneChecked} onChange={DoneCheckBoxChange}  id="checkBox" type="checkbox" className="form-check-input"/>
                </div>
            </div>
            {
                !DoneChecked ?
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
    function DoneCheckBoxChange(){
        setDoneChecked(!DoneChecked)
        if (DoneChecked){
            setLabel('Done Tasks')
            let filteredTasks = tasksContext.Tasks.filter((task)=>{
                return task.status === "Done"
            })
            setDoneTasks(filteredTasks)
        }else{
            setLabel('All Tasks')
            setDoneTasks([])
        }
    }
}

export default AllTasks;
