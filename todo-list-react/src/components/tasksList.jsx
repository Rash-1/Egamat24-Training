import {NavLink, Outlet, useNavigate} from "react-router-dom";
const TasksList = ()=>{
    const navigate = useNavigate();
        return(
            <>
                <div className="tasks-list">
                    <NavLink style={({isActive})=>{
                return{
                    color:isActive ? '#1565c0' : 'black'
                }
            }}to="/tasks/tasks-filtered-by-date">Tasks Filter By Date</NavLink>
                    <h1 onClick={()=>{
                        navigate('/tasks')
                    }} className="Tasks-list-title">Tasks List</h1>
                    <NavLink style={({isActive})=>{
                return{
                    color:isActive ? '#1976d2' : 'black'
                }
            }} to="/tasks/all-tasks">All Tasks</NavLink>
                </div>
                <Outlet/>
            </>
        )
}

export default TasksList;