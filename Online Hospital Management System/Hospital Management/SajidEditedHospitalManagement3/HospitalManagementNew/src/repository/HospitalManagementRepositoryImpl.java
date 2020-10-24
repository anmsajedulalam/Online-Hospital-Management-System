/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package repository;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.HospitalState;

/**
 *
 * @author sajid
 */
public class HospitalManagementRepositoryImpl implements HospitalManagementRepository<HospitalState>, Serializable {

    private File dbFile;

    public HospitalManagementRepositoryImpl(String dbFilePath) {
        System.out.println("************ DBFilePath " + dbFilePath);
        dbFile = new File(dbFilePath);
        if (!dbFile.exists()) {
            try {
                dbFile.createNewFile();
            } catch (IOException ex) {
                Logger.getLogger(HospitalManagementRepositoryImpl.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }

    @Override
    public void saveState(HospitalState hospitalState) {
        try {
            ObjectOutputStream out = new ObjectOutputStream(new FileOutputStream(dbFile));
            out.writeObject(hospitalState);
        } catch (Exception ex) {
            Logger.getLogger(HospitalManagementRepositoryImpl.class.getName()).log(Level.SEVERE, null, ex);
            throw new RuntimeException(ex);
        }

    }

    @Override
    public HospitalState getState() {
        ObjectInputStream in = null;
        try {
            if (dbFile.isFile()) {
                in = new ObjectInputStream(new FileInputStream(dbFile));
                HospitalState hospitalState = (HospitalState) in.readObject();
                if (hospitalState != null) {
                    return hospitalState;
                } else {
                    return HospitalState.getInstance();
                }

            }

        } catch (Exception ex) {
            //Logger.getLogger(HospitalManagementRepositoryImpl.class.getName()).log(Level.SEVERE, null, ex);
            //throw new RuntimeException(ex);
        } finally {
            try {
                if(in!=null){
                    in.close();
                }
                
            } catch (IOException ex) {
                Logger.getLogger(HospitalManagementRepositoryImpl.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        return HospitalState.getInstance();

    }

}
