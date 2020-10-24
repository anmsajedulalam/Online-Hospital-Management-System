/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 *
 * @author smtajwar
 */
public class Patient extends User implements Serializable {

    @Override
    public String toString() {
        return "Patient{ Id:" +this.getId()+ "dob=" + dob + ", bloodGroup=" + bloodGroup + ", nationalId=" + nationalId + ", email=" + email + ", gender=" + gender + ", contact=" + contact + ", address=" + address + ", remarks=" + remarks + ", prescriptions=" + prescriptions + '}';
    }

   

    private Date dob;

    private BloodGroup bloodGroup;
    private String nationalId;
    private String email;
    private Gender gender;
    private String contact;
    private String address;
    private String remarks;

    private List<Prescription> prescriptions = new ArrayList<Prescription>();

    private Patient(PatientBuilder builder) {
        this.dob = builder.dob;
        this.bloodGroup = builder.bloodGroup;
        this.nationalId = builder.nationalId;
        this.email = builder.email;
        this.gender = builder.gender;
        this.contact = builder.contact;
        this.address = builder.address;
        this.remarks = builder.remarks;
        setFirstName(builder.firstName);
        setLastName(builder.lastName);
        setInitials(builder.initials);
    }

    public Date getDob() {
        return dob;
    }

    public void setDob(Date dob) {
        this.dob = dob;
    }

    public BloodGroup getBloodGroup() {
        return bloodGroup;
    }

    public void setBloodGroup(BloodGroup bloodGroup) {
        this.bloodGroup = bloodGroup;
    }

    public String getNationalId() {
        return nationalId;
    }

    public void setNationalId(String nationalId) {
        this.nationalId = nationalId;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public Gender getGender() {
        return gender;
    }

    public void setGender(Gender gender) {
        this.gender = gender;
    }

    public String getContact() {
        return contact;
    }

    public void setContact(String contact) {
        this.contact = contact;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getRemarks() {
        return remarks;
    }

    public void setRemarks(String remarks) {
        this.remarks = remarks;
    }

    public List<Prescription> getPrescriptions() {
        return prescriptions;
    }

    public void setPrescriptions(List<Prescription> prescriptions) {
        this.prescriptions = prescriptions;
    }

    @Override
    public Role getUserType() {
        return Role.PATIENT;
    }

    public static class PatientBuilder {

        private Date dob;
        private Role role;
        private BloodGroup bloodGroup;
        private String nationalId;
        private String email;
        private Gender gender;
        private String contact;
        private String address;
        private String remarks;

        private String initials;
        private String firstName;
        private String lastName;

        public PatientBuilder() {
        }

        public PatientBuilder initials(String initials) {
            this.initials = initials;
            return this;
        }

        public PatientBuilder firstName(String firstName) {
            this.firstName = firstName;
            return this;
        }

        public PatientBuilder lastName(String lastName) {
            this.lastName = lastName;
            return this;
        }

        public PatientBuilder dob(Date dob) {
            this.dob = dob;
            return this;
        }

        public PatientBuilder bloodGroup(BloodGroup bloodGroup) {
            this.bloodGroup = bloodGroup;
            return this;
        }

        public PatientBuilder nationalId(String nationalId) {
            this.nationalId = nationalId;
            return this;
        }

        public PatientBuilder email(String email) {
            this.email = email;
            return this;
        }

        public PatientBuilder gender(Gender gender) {
            this.gender = gender;
            return this;
        }

        public PatientBuilder contact(String contact) {
            this.contact = contact;
            return this;
        }

        public PatientBuilder remarks(String remarks) {
            this.remarks = remarks;
            return this;
        }

        public PatientBuilder address(String address) {
            this.address = address;
            return this;
        }

        public Patient build() {
            return new Patient(this);
        }

    }
}
