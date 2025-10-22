package com.example.despliegue_api_rest.controller;

import java.util.List;
import java.util.Optional;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import com.example.despliegue_api_rest.entity.Pet;
import com.example.despliegue_api_rest.repository.PetRepository;

@RestController
@RequestMapping("/pet")
@CrossOrigin(origins = "http://localhost:3000")
/**
 * En este controlador se exponen todos los endpoint referentes a Pets {@Link Pet}
 * @version 1.0
 * @author José García
 */

public class Controllerpets {
    private PetRepository petRepository;

    /**
     * Constructor del controlador
     * @param petRepository Repositorio para consultar en BBDD.
     */
    public Controllerpets(PetRepository petRepository){
        this.petRepository = petRepository;
    }

    /**
     * Este método devuelve el listado de pets
     * @return {@link Pet} información de cada mascota
     */
    @GetMapping ("/list")
    public List<Pet> ListadoPets(){
        return petRepository.findAll();
    }
    @PutMapping("/adopt/{id}")
public Pet adoptPet(@PathVariable Long id) {
    Optional<Pet> petOpt = petRepository.findById(id);
    if (petOpt.isPresent()) {
        Pet pet = petOpt.get();
        pet.setAdopt(true);
        return petRepository.save(pet);
    } else {
        throw new RuntimeException("Pet not found");
    }
}
}
