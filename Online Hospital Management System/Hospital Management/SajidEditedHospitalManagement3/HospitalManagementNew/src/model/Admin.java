/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.io.Serializable;

/**
 *
 * @author smtajwar
 */
public class Admin extends User implements Serializable {
    
  
//check
     private Feedback feedback;

    
      public static final String ADMIN_CODE = "Agpr223";
     
       public String getAdminCode() {
        return ADMIN_CODE;
    }
       
       public Feedback getFeedback() {
        return feedback;
    }

    public void setFeedback(Feedback feedback) {
        this.feedback = feedback;
    }

    @Override
    public Role getUserType() {
        return Role.ADMIN;
    }
     
       
       

    
    
}
