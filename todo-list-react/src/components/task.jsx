import doneLogo from "../images/done.png"
import notDoneLogo from "../images/notDone.png"
import {useContext} from "react";
import TasksContext from "../context/tasks"

const Task = ({task})=>{
    const tasksContext = useContext(TasksContext)
    return <>
        <div className="task">
            <label className="form-label" htmlFor="title">Title</label>
            <input readOnly id="title" value={task.title} className="form-control"/>
            <hr/>
            <label className="form-label" htmlFor="description">Description</label>
            <textarea readOnly id="description" value={task.description} className="form-control"/>
            <hr/>
            <label className="form-label" htmlFor="date">Date</label>
            <input readOnly id="date" value={task.date} className="form-control"/>
            <button onClick={()=>{
            deleteTask(task.id)}
            } className="btn btn-danger btn-sm mt-1">Delete</button>
            <button onClick={()=>{
            editTask(task.id)}
            } className="btn btn-info mx-1 btn-sm mt-1">Edit</button>
            <img onClick={()=>{
            taskStatusChanger(task.id)}
            } src={task.status === "Not Done" ? notDoneLogo:doneLogo} alt="statusLogo"/>
        </div>
    </>

    function editTask(id){
        tasksContext.OnEditTask(id);
    }
    function taskStatusChanger(id){
        tasksContext.OnTaskStatusChanger(id);
    }
    function deleteTask(id){
        tasksContext.OnDeleteTask(id);
    }
}

export default Task;