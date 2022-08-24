const Input = ({formik,type,name,Title})=>{
    return(
        <>
            <div className="inputD">
                <label className="form-label" htmlFor={name}>{Title}</label>
                <input
                    className="form-control inputC"
                    id={name}
                    type={type}
                    {...formik.getFieldProps(name)}
                />
            </div>
        </>
    )
}
export default Input;