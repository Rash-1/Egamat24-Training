import {useFormik} from "formik";
import * as yup from "yup";
import Input from "./input";
import {useContext} from "react";
import TasksContext from "../context/tasks";
import moment from "moment";

const CreateTask = (props)=>{
    const tasksContext = useContext(TasksContext)
    const CreateTaskFormik = useFormik({
        initialValues:{
            title:'',
            description:'',
            date:'',
            status:'Not Done',
            id:tasksContext.Tasks.length +1 ,
        },
        onSubmit:values => {
            const Task = {
                title:values.title,
                description:values.description,
                date:values.date ? values.date : moment().format("YYYY-MM-DD"),
                status:'Not Done',
                id:tasksContext.Tasks.length +1 ,
            };
            addTask(Task);
        },
        validationSchema:yup.object({
            title:yup.string()
                .min(3,'Title must be at least 3 character')
                .max(30,'Title must be up to 30 character')
                .required('Title required'),
            description:yup.string()
                .min(5,'Description must be at least 5 character')
                .max(100,'Description must be up to 100 character'),
            date:yup.date()
        })
    })
    return (
        <>
            <h1 className="text-center mt-1">Create New Task</h1>
            <div className="create-task ">
                <form onSubmit={CreateTaskFormik.handleSubmit}>
                   <Input name="title" type="text" Title="Title" formik={CreateTaskFormik}/>
                    {CreateTaskFormik.touched && CreateTaskFormik.errors.title ? (<div className="error">{CreateTaskFormik.errors.title}</div>):null}
                   <Input name="description" type="text" Title="Description" formik={CreateTaskFormik}/>
                    {CreateTaskFormik.touched && CreateTaskFormik.errors.description ? (<div className="error">{CreateTaskFormik.errors.description}</div>):null}
                   <Input name="date" type="date" Title="Date" formik={CreateTaskFormik}/>
                    {CreateTaskFormik.touched && CreateTaskFormik.errors.date ? (<div className="error">{CreateTaskFormik.errors.date}</div>):null}
                    <button type="submit" className="btn btn-info btn mt-2">Create</button>
                </form>
            </div>
        </>
    )
    function addTask(task){
        tasksContext.OnAddTasks(task);
    }
}

export default CreateTask;