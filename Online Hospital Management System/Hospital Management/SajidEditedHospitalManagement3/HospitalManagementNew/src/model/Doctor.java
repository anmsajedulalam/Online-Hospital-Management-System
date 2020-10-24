/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.io.Serializable;

/**
 *
 * @author sajid
 */
public class Doctor extends User implements Serializable {

    private Feedback feedback;
    
    public Feedback getFeedback() {
        return feedback;
    }

    public void setFeedback(Feedback feedback) {
        this.feedback = feedback;
    }

  
    @Override
    public Role getUserType() {
        return Role.DOCTOR;
    }

    @Override
    public String toString() {
        return "Doctor{" + "feedback=" + feedback + super.toString()+ '}';
    }

    
     
     
}
