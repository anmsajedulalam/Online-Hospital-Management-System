/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author smtajwar
 */
public class IDGenenerator {
    
    public static String generateID(Role userType){
        
        

        
        
        
        
        if(userType == Role.PATIENT){
            return "P"+(int) Math.floor(1000 + Math.random() * 9000);
        }
        if(userType == Role.ADMIN){
            return "A"+(int) Math.floor(1000 + Math.random() * 9000);
        }
        if(userType == Role.DOCTOR){
            return "D"+(int) Math.floor(1000 + Math.random() * 9000);
        }
        if(userType == Role.SECRETARY){
            return "S"+ (int) Math.floor(1000 + Math.random() * 9000) ;
        }
       return null;
    }
    
    
  
    
}
