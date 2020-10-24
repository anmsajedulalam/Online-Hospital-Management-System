/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package hospitalmanagement;

import java.util.List;
import model.Admin;
import model.Doctor;
import model.HospitalState;
import model.Patient;
import model.Secretary;

/**
 *
 * @author smtajwar
 */
public class HospitalManagement {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        HospitalManagementController controller = HospitalManagementController.getInstance();
        controller.applicationPatientLaunch();
        HospitalState hospital = controller.getHostpital();

        // Just for logging .. delete it once done..
        List<Patient> patients = hospital.getPatientsPendingForApproval();
        for (Patient patient : patients) {
            System.out.println(patient.toString());
        }
        
        for(Doctor doctor : hospital.getDoctors()){
            System.out.println("**************** Doctor:"+ doctor.toString());
        }
         for(Secretary sec : hospital.getSecretaries()){
            System.out.println("**************** sec:"+ sec.toString());
        }
          for( Admin admin : hospital.getUsers()){
            System.out.println("**************** admin:"+ admin.toString());
        }
    }

}
