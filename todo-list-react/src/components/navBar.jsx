import {NavLink, Link } from "react-router-dom";

const NavBar = ()=>{
    return (<>
    <nav className="navbar px-2 d-flex justify-content-start border-bottom border-secondary border-opacity-50 ">
        <div className="me-3">
            <p className="navbar-brand">Todo App</p>
        </div>
        <div className="flex-row d-flex justify-content-between ms-2">
            <NavLink style={({isActive})=>{
                return{
                    color:isActive ? '#1565c0' : 'black'
                }
            }} className="nav-link mx-3" to="/home">Home</NavLink>
            <NavLink style={({isActive})=>{
                return{
                    color:isActive ? '#1565c0' : 'black'
                }
            }} className="nav-link mx-3" to="/tasks">Tasks List</NavLink>
            <NavLink style={({isActive})=>{
                return{
                    color:isActive ? '#1565c0' : 'black'
                }
            }} className="nav-link mx-3" to="/create-task">Create New Task</NavLink>
        </div>
    </nav>


    </>)
}

export default NavBar;