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
public enum BloodGroup implements Serializable {

    A_POSITIVE("A+"), A_NEGATIVE("A-"), B_POSITIVE("B+"), B_NEGATIVE("B-"), O_POSITIVE("O+"), O_NEGATIVBE("O-");
    String group;

    BloodGroup(String group1) {
        group = group1;
    }

    public String getGroup() {
        return group;
    }

}
