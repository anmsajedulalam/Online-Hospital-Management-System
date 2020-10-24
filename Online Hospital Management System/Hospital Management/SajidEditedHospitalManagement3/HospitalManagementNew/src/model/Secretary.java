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
public class Secretary extends User implements Serializable {
   
    @Override
    public Role getUserType() {
        return Role.SECRETARY;
    }
         
    @Override
    public String toString() {
        return "Secretary{"  + super.toString()+ '}';
    }
    
}
