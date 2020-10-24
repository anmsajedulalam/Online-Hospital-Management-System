/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Objects;
import java.util.Set;

/**
 *
 * @author sajid
 */
public class HospitalState implements Serializable, IObservable<HospitalState> {
   

    private static HospitalState hospitalState;

    // Patients pending for approval
    private List<Patient> patientsPendingForApproval = new ArrayList<Patient>();
    // Approved Patients
    private List<Patient> patients = new ArrayList<Patient>();
    private List<Doctor> doctors = new ArrayList<Doctor>();
    private List<Appointment> appointments = new ArrayList<Appointment>();
    private List<Admin> users = new ArrayList<Admin>();
    private List<Secretary> secretaries = new ArrayList<Secretary>();
    private List<Stock> stocks = new ArrayList<Stock>();
    transient private Set<IObserver<HospitalState>> observerList= new HashSet<IObserver<HospitalState>>();
    public List<Patient> getPatientsPendingForApproval() {
        return patientsPendingForApproval;
    }

    public void setPatientsPendingForApproval(List<Patient> patientsPendingForApproval) {
        this.patientsPendingForApproval = patientsPendingForApproval;
    }

    public List<Stock> getStocks() {
        return stocks;
    }

    public void setStocks(List<Stock> stocks) {
        this.stocks = stocks;
    }

    private boolean changed = false;

    

    private HospitalState() {
        System.out.println("HospitalState constructor");
    }

    public static HospitalState getInstance() {
        if (hospitalState == null) {
            System.out.println("****************** HospitalState constructor");
            hospitalState = new HospitalState();
        }
        return hospitalState;
    }

    public List<Admin> getUsers() {
        return users;
    }

    public void setUsers(List<Admin> users) {
        this.users = users;
    }

    public List<Secretary> getSecretaries() {
        return secretaries;
    }

    public void setSecretaries(List<Secretary> secretaries) {
        this.secretaries = secretaries;
    }

    public boolean isChanged() {
        return changed;
    }

    public void setChanged(boolean changed) {
        this.changed = changed;
    }

    public Set<IObserver<HospitalState>> getObserverList() {
        return observerList;
    }

    public void setObserverList(Set<IObserver<HospitalState>> observerList) {
        this.observerList = observerList;
    }

    public static HospitalState getHospitalState() {
        return hospitalState;
    }

    public List<Patient> getPatients() {
        return patients;
    }
   

    public void addPatient(Patient patient) {
        this.patients.add(patient);
        notifyObservers();
    }

    public List<Doctor> getDoctors() {
        return doctors;
    }

    public void addDoctor(Doctor doctor) {
        this.doctors.add(doctor);
        notifyObservers();
    }

    public List<Appointment> getAppointments() {
        return appointments;
    }

    public void addAppointment(Appointment appointment) {
        this.appointments.add(appointment);
        notifyObservers();
    }

    @Override
    public synchronized void addObserver(IObserver observer) {
        
        if(observerList == null){
            observerList= new HashSet<IObserver<HospitalState>>();
             observerList.add(observer);
        }
        else if (!observerList.contains(observer)) {
            observerList.add(observer);
        }
    }

    @Override
    public synchronized void deleteObserver(IObserver observer) {
        observerList.remove(observer);
    }

    @Override
    public void notifyObservers() {
        notifyObservers(hospitalState);
    }

    @Override
    public void notifyObservers(HospitalState hospitalState) {
System.out.println("*********** observers list : "+ observerList.size());
        for (IObserver<HospitalState> observer : observerList) {
            observer.update(this, hospitalState);
        }

    }

    @Override
    public void deleteObservers() {
        observerList.clear();
    }

    @Override
    public void setChanged() {
        changed = true;
    }

    @Override
    public void clearChanged() {
        changed = false;
    }

    @Override
    public boolean hasChanged() {
        return changed;
    }

    @Override
    public synchronized int countObservers() {
        return observerList.size();
    }
    
    @Override
    public int hashCode() {
        int hash = 7;
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final HospitalState other = (HospitalState) obj;
        if (this.changed != other.changed) {
            return false;
        }
        if (!Objects.equals(this.patientsPendingForApproval, other.patientsPendingForApproval)) {
            return false;
        }
        if (!Objects.equals(this.patients, other.patients)) {
            return false;
        }
        if (!Objects.equals(this.doctors, other.doctors)) {
            return false;
        }
        if (!Objects.equals(this.appointments, other.appointments)) {
            return false;
        }
        if (!Objects.equals(this.users, other.users)) {
            return false;
        }
        if (!Objects.equals(this.secretaries, other.secretaries)) {
            return false;
        }
        if (!Objects.equals(this.stocks, other.stocks)) {
            return false;
        }
        if (!Objects.equals(this.observerList, other.observerList)) {
            return false;
        }
        return true;
    }
}
