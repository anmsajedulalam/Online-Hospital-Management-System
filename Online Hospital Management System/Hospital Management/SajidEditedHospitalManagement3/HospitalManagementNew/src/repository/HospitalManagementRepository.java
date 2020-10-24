/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package repository;

/**
 *
 * @author smtajwar
 */
public interface HospitalManagementRepository<T> {
    
    void saveState(T t);
    T getState();
}