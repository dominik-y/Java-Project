package edu.rit.croatia.companydataserver.servicelayer;

import companydata.Department;
import edu.rit.croatia.companydataserver.businesslayer.Company;
import java.sql.Date;
import java.sql.Timestamp;
import javax.ws.rs.core.*;
import javax.ws.rs.*;


@Path("CompanyServices")
public class CompanyServices {
    
    private Company company = null;

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of CompanyServices
     */
    public CompanyServices() {
        this.company = new Company();
    }
   
    
    
                                        // DEPARTMENTS
    @Path("departments")
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Response getDepartments(@QueryParam("company") String companyName){
        return Response.ok(company.getDepartments(companyName)).build();
    }

    @Path("department")
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Response getDepartment(@QueryParam("company") String companyName, @QueryParam("dept_id") int deptId){
        return Response.ok(company.getDepartment(companyName, deptId)).build();
    }
    
    
    @Path("department")
    @DELETE
    @Produces(MediaType.APPLICATION_JSON)
    public Response deleteDepartment(@QueryParam("company") String companyName, @QueryParam("dept_id") int deptId){
        return Response.ok(company.deleteDepartment(companyName, deptId)).build();
    }
    
    
    @Path("department")
    @POST
    @Produces(MediaType.APPLICATION_JSON)
    public Response insertDepartment(@QueryParam("company")   String companyName, 
                                   @QueryParam  ("dept_name") String deptName, 
                                   @QueryParam  ("dept_no")   String deptNumb, 
                                   @QueryParam  ("location")  String location) {
        return Response.ok(company.insertDepartment (companyName, deptName, deptNumb, location)).build();
    }
   
    
    
                                        // EMPLOYEE
    
    @Path("employees")
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Response getAllEmployee(@QueryParam("company") String employees) {
        return Response.ok(company.getAllEmployee(employees)).build();
    }
    
    @Path("employee")
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Response getEmployee(@QueryParam("emp_id") int empId) {
        return Response.ok(company.getEmployee(empId)).build();
    }
    
     
    @Path("employee")
    @DELETE
    @Produces(MediaType.APPLICATION_JSON)
    public Response deleteEmployee(@QueryParam("emp_id") int empId) {
        return Response.ok(company.deleteEmployee (empId)).build();
    }
    
    @Path("employee")
    @POST
    @Produces(MediaType.APPLICATION_JSON)
    public Response insertEmployee(@QueryParam("emp_name") String emp_name,
                                   @QueryParam("emp_no") String emp_no,
                                   @QueryParam("hire_date") Date hire_date,
                                   @QueryParam("job") String job,
                                   @QueryParam("salary") double salary,
                                   @QueryParam("dept_id") int dept_id,
                                   @QueryParam("mng_id") int mng_id) {
        
        return Response.ok(company.insertEmployee (emp_name,emp_no,hire_date,job,salary,dept_id,mng_id)).build();
    }
    
    
    
    
                                        // TIMECARDS 
    @Path("timecards")
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Response getTimecards(@QueryParam("emp_id") int empId){
        return Response.ok(company.getTimecards(empId)).build();
    }
    
    @Path("timecard")
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public Response getTimecard(@QueryParam("timecard_id") int timecardId) {
        return Response.ok(company.getTimecard(timecardId)).build();
    }
    
    
    @Path("timecard")
    @DELETE
    @Produces(MediaType.APPLICATION_JSON)
    public Response deleteTimecard(@QueryParam("timecard_id") int timecardId) {
        return Response.ok(company.deleteTimecard (timecardId)).build();
    }
    
    @Path("timecard")
    @POST
    @Produces(MediaType.APPLICATION_JSON)
    public Response insertTimecard(@QueryParam("start_time") Timestamp start_time, 
                                   @QueryParam("end_time")   Timestamp end_time,
                                   @QueryParam("emp_id")     int emp_id ) {
        return Response.ok(company.insertTimecard(start_time, end_time, emp_id)).build();
    }
    
    
    
    
   /*   
    @Path("department")
    @PUT
    @Produces(MediaType.APPLICATION_JSON)
    public Response updateDepartment(@QueryParam("company") String companyName, 
                                   @QueryParam("dept_name") String deptName, 
                                   @QueryParam("dept_no")   String deptNumb, 
                                   @QueryParam("location")  String location) {
        return Response.ok(company.updateDepartment (companyName, deptName, deptNumb, location)).build();
    }

    @Path("employee")
    @PUT
    @Produces(MediaType.APPLICATION_JSON)
    public Response updateEmployee(@QueryParam("emp_id") int empId) {
        return Response.ok(company.updateEmployee (empId)).build();
    }

    @Path("timecard")
    @PUT
    @Produces(MediaType.APPLICATION_JSON)
    public Response updateTimecard(@QueryParam("emy_id") int empId) {
        return Response.ok(company.updateTimecard(empId)).build();
    }
    */
}
