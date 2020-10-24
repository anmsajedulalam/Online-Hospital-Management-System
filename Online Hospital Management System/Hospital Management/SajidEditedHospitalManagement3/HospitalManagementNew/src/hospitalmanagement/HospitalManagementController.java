/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package hospitalmanagement;
import java.util.Objects;
import java.util.ArrayList;
import java.util.List;
import View.Admin;
import View.Login;
import View.PatienSignUpForm;
import javax.swing.JPasswordField;
import javax.swing.JTextField;
import static model.Admin.ADMIN_CODE;
import model.Doctor;
import model.HospitalState;
import model.IDGenenerator;
import model.Patient;
import model.Role;
import model.Secretary;
import model.Stock;
import repository.HospitalManagementRepository;
import repository.HospitalManagementRepositoryImpl;
import repository.RepositoryChangeObserver;

/**
 *
 * @author sajid
 */
public class HospitalManagementController {

    private static HospitalManagementController hospitalManagementController = null;

    private String dbFilePath = "Test.repo";
    private final HospitalState hospitalState;

    private HospitalManagementController() {
        System.out.println("Controller called");
        HospitalManagementRepository<HospitalState> repo = new HospitalManagementRepositoryImpl(dbFilePath);
        this.hospitalState = repo.getState();
        hospitalState.addObserver(new RepositoryChangeObserver(repo));

    }

    public static HospitalManagementController getInstance() {
        if (hospitalManagementController == null) {
            hospitalManagementController = new HospitalManagementController();

        }
        return hospitalManagementController;
    }

    public static void applicationLaunch() {
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Login().setVisible(true);
            }
        });
    }

    public static void applicationPatientLaunch() {
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new PatienSignUpForm().setVisible(true);
            }
        });
    }

    public void savePatient(Patient patient) {
        String id = IDGenenerator.generateID(Role.PATIENT);
        patient.setId(id);

        hospitalState.getPatientsPendingForApproval().add(patient);
        hospitalState.notifyObservers(hospitalState);
    }

    public Patient findPatient(String id) {
        for (Patient patient : this.hospitalState.getPatients()) {
            if (patient.getId().equals(id)) {
                return patient;
            }
        }
        return null;
    }
    
    
    
    
    
    

    public HospitalState getHostpital() {
        return hospitalState;
    }

    public void saveAdmin(model.Admin admin) {
        String id = IDGenenerator.generateID(Role.ADMIN);
        admin.setId(id);

        hospitalState.getUsers().add(admin);
        hospitalState.notifyObservers(hospitalState);
    }

    public void saveDoctor(Doctor doctor) {
        String id = IDGenenerator.generateID(Role.DOCTOR);
        doctor.setId(id);

        hospitalState.getDoctors().add(doctor);
        hospitalState.notifyObservers(hospitalState);
    }
//Sajid's saveMedicine
    public void saveMedicine(Stock medicine) {
        hospitalState.getStocks().add(medicine);
        hospitalState.notifyObservers(hospitalState);
    }
    
    
    
    public void saveSecretary(Secretary secretary) {
        String id = IDGenenerator.generateID(Role.DOCTOR);
        secretary.setId(id);

        hospitalState.getSecretaries().add(secretary);
        hospitalState.notifyObservers(hospitalState);
    }

    
    //from here sajid starts:
    
    
    public Secretary findSecretary(String id) {
        for (Secretary secretary : this.hospitalState.getSecretaries()) {
            if (secretary.getId().equals(id)) {
                return secretary;
            }
        }
        return null;
    }
    
    public Doctor findDoctor(String id) {
        for (Doctor doctor : this.hospitalState.getDoctors()) {
            if (doctor.getId().equals(id)) {
                return doctor;
            }
        }
        return null;
    }
    //Sajid's findMedicine
    public Stock findMedicine(String medicineName) {
        for (Stock medicine : this.hospitalState.getStocks()) {
            if (medicine.getMedicineName().equals(medicineName)) {
                return medicine;
            }
        }
        return null;
    }
    //Sajid's removePatient
    public Patient removePatient(String id) {
        
        for (Patient patient : this.hospitalState.getPatients()) {
            if (patient.getId().equals(id)) {
                patient.remove(id); 
//                int ID=Integer.parseInt(id);
//                patient.remove(ID);  
//                int ID=intValue(id);
//                patient(id)=null;
//                patient.removeIf(id);
//                patient.remove(id);  
//                patient.remove(indexAt.get(id).intValue());
            }
        }
        return null;
    }
}
