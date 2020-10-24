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
 * @param <T>
 */
public interface IObservable<T> extends Serializable{

    void addObserver(IObserver<T> o);

    void deleteObserver(IObserver<T> o);

    void notifyObservers();

    void notifyObservers(T arg);

    void deleteObservers();

    void setChanged();

    void clearChanged();

    boolean hasChanged();

    int countObservers();
}
