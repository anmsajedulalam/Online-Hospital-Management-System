/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.io.Serializable;
import java.util.Date;
import java.util.List;

/**
 *
 * @author smtajwar
 */
public class Prescription implements Serializable{
    private Doctor doctor;
    private List<String> prescription;
    private Date dateTime;
    private Secretary secretary;

    public Doctor getDoctor() {
        return doctor;
    }

    public void setDoctor(Doctor doctor) {
        this.doctor = doctor;
    }

    public List getPrescription() {
        return prescription;
    }

    public void setPrescription(List prescription) {
        this.prescription = prescription;
    }
    
    public void setDateTime(Date dateTime){
        this.dateTime = dateTime;
    }
    
    public Date getDateTime(){
        return dateTime;
    }
    
    public void setSecretary(Secretary secretary){
        this.secretary = secretary;
    }
    
    public Secretary getSecretary(){
        return secretary;
    }
   
}
 