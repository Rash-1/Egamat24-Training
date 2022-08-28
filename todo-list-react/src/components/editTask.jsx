import {useParams} from "react-router-dom";
import {useContext} from "react";
import TasksContext from "../context/tasks"

const EditTask = ()=>{
    const {taskId} = useParams()
    const tasksContext = useContext(TasksContext);
    return(
        <>
            <h1>{taskId}</h1>
            <h1 onClick={handleEdit} >edit</h1>
        </>
    )
function handleEdit(){
console.log(tasksContext.Tasks)
    tasksContext.OnEditTask(1,)
}
}

export default EditTask