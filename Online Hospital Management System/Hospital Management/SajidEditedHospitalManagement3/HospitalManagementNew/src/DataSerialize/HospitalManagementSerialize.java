/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DataSerialize;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.HospitalState;


/**
 *
 * @author sajid
 */
public class HospitalManagementSerialize implements IHospitalManagementSerialize<HospitalState>  {
        private File dbFile;
    public HospitalManagementSerialize(String dbFilePath) {
        dbFile = new File(dbFilePath);
    }

    
    @Override
    public void saveState(HospitalState hospitalState)  {
        try {
            ObjectOutputStream out = new ObjectOutputStream(new FileOutputStream(dbFile));
            out.writeObject(hospitalState);
        } catch (Exception ex) {
            Logger.getLogger(HospitalManagementSerialize.class.getName()).log(Level.SEVERE, null, ex);
            throw new RuntimeException(ex);
        }
       
    }

    @Override
    public HospitalState getState() {
        
        try {
            ObjectInputStream in = new ObjectInputStream(new FileInputStream(dbFile));
            HospitalState hospitalState = (HospitalState)in.readObject();
            return hospitalState;
        } catch (Exception ex) {
            Logger.getLogger(HospitalManagementSerialize.class.getName()).log(Level.SEVERE, null, ex);
            throw new RuntimeException(ex);
        }
    }
}
