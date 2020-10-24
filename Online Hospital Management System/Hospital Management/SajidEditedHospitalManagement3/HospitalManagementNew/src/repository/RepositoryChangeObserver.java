/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package repository;

import java.io.Serializable;
import model.HospitalState;
import model.IObservable;
import model.IObserver;


/**
 *
 * @author sajid
 */
public class RepositoryChangeObserver implements IObserver<HospitalState>, Serializable{

    private HospitalManagementRepository repository;
    public RepositoryChangeObserver(HospitalManagementRepository repository) {
        this.repository = repository;
    }

    
    @Override
    public void update(IObservable o, HospitalState arg) {
        System.out.println("arg:"+ arg);
        repository.saveState(arg);
    }

   
    
}
