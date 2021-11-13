/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package edu.rit.croatia.companydataserver.businesslayer;

import com.google.gson.Gson;
import companydata.*;
import java.sql.Date;
import java.sql.Timestamp;
import java.text.SimpleDateFormat;
import java.util.Calendar;

import java.util.List;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

public class Company {

    private DataLayer dl = null;
    private Gson gson = null;
    private Validator validator = null;

    public Company() {
        try {
            this.dl = new DataLayer("dxm8969");
            gson = new Gson();
            validator = new Validator();
        } catch (Exception ex) {
            System.out.println("Problem with query: " + ex.getMessage());
        } finally {
            dl.close();
        }
    }

    // DEPARTMENTS 
    //radi error
    public String getDepartments(String companyName) {
        List<Department> departments = dl.getAllDepartment(companyName);
        if (departments.isEmpty()) {
            return "{\"error:\": \"No department found for department " + companyName + ".\"}";
        }
        return gson.toJson(departments);
    }

    //ne radi error
    public String getDepartment(String companyName, int deptId) {
        Department department = dl.getDepartment(companyName, deptId);
        if (deptId != department.getId()) {
            return "{\"error:\": \"No department found for department " + companyName + ".\"}";
        }

        return gson.toJson(department);
    }

    //ne radi error message
    public String getTimecard(int timecardId) {
        Timecard timecard = dl.getTimecard(timecardId);
        if (timecardId != timecard.getId()) {
            return "{\"error:\": \"No department found for department " + timecardId + ".\"}";
        }
        return gson.toJson(timecard);
    }

    //radi error
    public String getTimecards(int emp_id) {
        List<Timecard> timecards = dl.getAllTimecard(emp_id);
        if (timecards.isEmpty()) {
            return "{\"error:\": \"No timecard found for employer " + emp_id + ".\"}";
        }
        return gson.toJson(timecards);
    }

    //ne radi error
    public String getEmployee(int empId) {
        Employee employee = dl.getEmployee(empId);
        return gson.toJson(employee);
    }

    //radi error
    public String getAllEmployee(String company) {
        List<Employee> employees = dl.getAllEmployee(company);
        if (employees.isEmpty()) {
            return "{\"error:\": \"No employee found for company " + company + ".\"}";
        }
        return gson.toJson(employees);
    }

    //radi error
    public String deleteDepartment(String companyName, int deptId) {
        Department department = dl.getDepartment(companyName, deptId);
        if (department == null) {
            return "{\"error:\": \"No department found for " + companyName + " " + deptId + ".\"}";
        } else {
            dl.deleteDepartment(companyName, deptId);
            return ("Deleting sucessful " + deptId);
        }
    }

    //radi error
    public String deleteTimecard(int timecardId) {
        Timecard timecard = dl.getTimecard(timecardId);
        if (timecard == null) {
            return "{\"error:\": \"No department found for " + timecardId + " " + ".\"}";
        } else {
            dl.deleteTimecard(timecardId);
            return ("Deleting sucessful " + timecardId);
        }
    }

    //radi error
    public String deleteEmployee(int empId) {
        Employee employee = dl.getEmployee(empId);
        if (employee == null) {
            return "{\"error:\": \"No department found for " + empId + " " + ".\"}";
        } else {
            dl.deleteEmployee(empId);
        }
        return gson.toJson(employee);
    }
    
    
    
    

    public String insertDepartment(String companyName, String departmentName, String departmentNumber, String location) {
        Department department = new Department(companyName, departmentName, departmentNumber, location);
        Department d = dl.insertDepartment(department);
        return gson.toJson(department);
    }

    //ne radi error za inserte, popraviti logiku
    public String insertTimecard(Timestamp start_time, Timestamp end_time, Integer emp_id) {

        Timecard timecard = new Timecard(start_time, end_time, emp_id);
        Calendar calendar = Calendar.getInstance();
        calendar.setTime(start_time);
        Calendar cal = Calendar.getInstance();
        calendar.setTime(end_time);
        Calendar now = Calendar.getInstance();

        Timecard timecard2 = dl.insertTimecard(timecard);
        if (emp_id == emp_id) {
            return "{\"error:\": \"Department for " + emp_id + " can't be implemented " + ".\"}";

        }
        return gson.toJson(timecard2);
    }

    //ne prompta error
    public String insertEmployee(String emp_name, String emp_no, Date hire_date,
            String job, double salary, int dept_id, int mng_id) {

        Department department = new Department();
        Calendar hire = Calendar.getInstance();
        hire.setTime(hire_date);
        
        if(dept_id != department.getId()) {
            System.out.println("New employee needs to have valid department!");
            //System.exit(0);
        }
        
        if(mng_id != mng_id) {
            System.out.println("");
        }
        //manager id must be reference some employee or 0 if its first one or doesnt have manager (default 0)
        Employee employee = new Employee(emp_name, emp_no, hire_date, job, salary, dept_id, mng_id);
        Employee e = dl.insertEmployee(employee);
        return gson.toJson(employee);
    }

    /*
     
   
    
    public String updateDepartment(String companyName, String departmentName, String departmentNumber, String location) {
        Department department = new Department(companyName, departmentName, departmentNumber, location);
        Department _d = dl.updateDepartment(department);
        return gson.toJson(department);
    }

    
    public String updateTimecard() {
        Timecard timecards = new Timecard();
        Timecard t = dl.updateTimecard();
        return gson.toJson();
    }

    // EMPLOYEES
    
    

     public String updateEmployees() {
        Employee employee = new Employee();
        Employee e = dl.Employees();
        return gson.toJson(employee);
    }
    
    
    
     */
}
