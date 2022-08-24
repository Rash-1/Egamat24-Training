import {useParams} from "react-router-dom";

const EditTask = ()=>{
   const {taskId} = useParams();
    return <>
        <h1>{taskId}</h1>
    </>
}

export default EditTask;